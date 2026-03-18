<?php
include "db_config.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email' AND password = '$password'");

$num = mysqli_num_rows($query);
if ($num == 1) {
    $user = mysqli_fetch_assoc($query);
    $role = $user['role']; // Corrected role assignment
    $userId = $user['id'];

    if ($role == 'lead-team') {
        header('location: https://chap.intlchaplains.com/admin');
        $_SESSION['admin-email'] = $email;
        $_SESSION['admin-id'] = $userId;


    } elseif ($role == 'case-manager') {
        header('location: https://chap.intlchaplains.com/case-manager');
        $_SESSION['case-manager-email'] = $email;
        $_SESSION['case-manager-id'] = $userId;

    } elseif ($role == 'accountant') {
        header('location: https://chap.intlchaplains.com/accountant');
        $_SESSION['accountant-email'] = $email;
        $_SESSION['accountant-id'] = $userId;

    } else {
        $_SESSION['ErrorMessage'] = "Invalid Role Assigned to this user: $role";
        header('location:../login.php');
    }
} else {
    $_SESSION['ErrorMessage'] = "Invalid Login Information";
    header('location:../login.php');
}

?>