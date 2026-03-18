<?php
session_start();
include("db_config.php");

/**
 * FILE UPLOAD HELPER
 */
function uploadFile($file, $folder, $allowed_types, $max_size)
{
    if ($file['error'] === 0) {

        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validate extension
        if (!in_array($file_ext, $allowed_types)) {
            return [false, "Invalid file type"];
        }

        // Validate size
        if ($file_size > $max_size) {
            return [false, "File too large"];
        }

        // Generate unique name
        $new_name = time() . "_" . uniqid() . "." . $file_ext;
        $destination = $folder . $new_name;

        // Move file
        if (move_uploaded_file($file_tmp, $destination)) {
            return [true, $new_name];
        } else {
            return [false, "Failed to upload file"];
        }
    }

    return [false, "No file uploaded"];
}


/**
 * PROCESS FORM
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // SANITIZE INPUTS
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $denomination = mysqli_real_escape_string($conn, $_POST['denomination']);
    $ministry_area = mysqli_real_escape_string($conn, $_POST['ministry_area']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $motivation = mysqli_real_escape_string($conn, $_POST['motivation']);
    $referees = mysqli_real_escape_string($conn, $_POST['references']);

    /**
     * ✅ CHECK IF EMAIL ALREADY EXISTS
     */
    $checkEmail = mysqli_query($conn, "
    SELECT id 
    FROM registered_chaplains 
    WHERE email = '$email' 
    AND status != 'deleted'
    LIMIT 1
");

    if (mysqli_num_rows($checkEmail) > 0) {
        $_SESSION['ErrorMessage'] = "This email has already submitted an application.";
        header("Location: ../apply.php");
        exit();
    }
    /**
     * FILE UPLOADS
     */
    $resume_name = null;
    $drivers_license_name = null;

    // Resume Upload
    if (!empty($_FILES['resume']['name'])) {

        list($success, $result) = uploadFile(
            $_FILES['resume'],
            "../uploads/resume/",
            ['pdf', 'doc', 'docx'],
            5 * 1024 * 1024
        );

        if ($success) {
            $resume_name = $result;
        } else {
            $_SESSION['ErrorMessage'] = "Resume Error: " . $result;
            header("Location: ../apply.php");
            exit();
        }
    }

    // Driver's License Upload
    if (!empty($_FILES['drivers_license']['name'])) {

        list($success, $result) = uploadFile(
            $_FILES['drivers_license'],
            "../uploads/license/",
            ['jpg', 'jpeg', 'png', 'pdf'],
            3 * 1024 * 1024
        );

        if ($success) {
            $drivers_license_name = $result;
        } else {
            $_SESSION['ErrorMessage'] = "License Error: " . $result;
            header("Location: ../apply.php");
            exit();
        }
    }

    /**
     * INSERT INTO DATABASE
     */
    $sql = "INSERT INTO registered_chaplains (
        first_name, last_name, email, phone, dob, gender,
        address, city, state, zip, country,
        denomination, ministry_area, experience, education,
        motivation, referees, resume, drivers_license
    ) VALUES (
        '$first_name', '$last_name', '$email', '$phone', '$dob', '$gender',
        '$address', '$city', '$state', '$zip', '$country',
        '$denomination', '$ministry_area', '$experience', '$education',
        '$motivation', '$referees', '$resume_name', '$drivers_license_name'
    )";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['SuccessMessage'] = "Application submitted successfully!";
        header("Location: ../apply.php");
        exit();
    } else {
        $_SESSION['ErrorMessage'] = "Database Error: " . mysqli_error($conn);
        header("Location: ../apply.php");
        exit();
    }
}
?>