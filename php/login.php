<?php
ini_set('session.use_strict_mode', 1);
session_set_cookie_params([
    'lifetime' => 0,           // until browser closes
    'path' => '/',
    'domain' => '.intlchaplains.com', // notice the leading dot
    'secure' => true,           // must be HTTPS
    'httponly' => true,         // can't be accessed by JS
    'samesite' => 'None'        // allows cross-subdomain
]);

session_start();
include "db_config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email' AND password = '$password'");

$num = mysqli_num_rows($query);
if ($num == 1) {
    $user = mysqli_fetch_assoc($query);
    $role = $user['role']; // Corrected role assignment
    $userId = $user['id'];

    if ($role == 'lead-team') {
        $_SESSION['admin-email'] = $email;
        $_SESSION['admin-id'] = $userId;
        header('location: https://chap.intlchaplains.com/admin');


    } elseif ($role == 'case-manager') {
        $_SESSION['case-manager-email'] = $email;
        $_SESSION['case-manager-id'] = $userId;
        header('location: https://chap.intlchaplains.com/case-manager');

    } elseif ($role == 'accountant') {
        $_SESSION['accountant-email'] = $email;
        $_SESSION['accountant-id'] = $userId;
        header('location: https://chap.intlchaplains.com/accountant');

    } else {
        $_SESSION['ErrorMessage'] = "Invalid Role Assigned to this user: $role";
        header('location:../login.php');
    }
} else {
    $_SESSION['ErrorMessage'] = "Invalid Login Information";
    header('location:../login.php');
}

?>