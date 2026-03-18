<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '.intlchaplains.com', // 🔥 THIS IS THE FIX
    'secure' => true, // only if using HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
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