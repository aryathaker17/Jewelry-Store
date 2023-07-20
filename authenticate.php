<?php
require_once('jewelry_store.php');
//Arya Thaker IT202-004 04/05/23, Semester Project Phase 4  at54@njit.edu.


error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Validate and sanitize user input
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
echo $email;
echo $password;

if(is_valid_admin_login($email, $password))
{
 $_SESSION['is_valid'] = true;
 $_SESSION['email'] = $email;
 header('Location: home.php');
 exit;
 
}
else{
    
    if($email == NULL && $password == NULL){
        $login_message = 'You must login to view page.';
    }
    else{
        $login_message = 'Invalid credentials';
    }
    include('login.php');
}

    
?>