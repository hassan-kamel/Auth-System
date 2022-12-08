<?php
require_once "../../db/config.php";
session_start();

require_once ROOT_PATH.'/core/functions.php';
require_once ROOT_PATH.'/core/validations.php';


if (checkRequestMethod($_SERVER['REQUEST_METHOD'])) {
    $errors = [];
    $data = [];
    
    foreach ($_POST as $key => $value) {
        $$key = senitizeInput($value);
    };


    // email 
    if (requiredInput($email)) $errors['email'] = "Email is required";
    elseif (emailValidate($email)) $errors['email'] = "Enter a valid email";
    elseif (!getOneByEmail($email)) $errors['email'] = "Invalid Email";
    else $data['email'] = $email;
    //password
    if (requiredInput($password)) $errors['password'] = "Password is required";
    elseif (minInput($password, 5)) $errors['password'] = "Password is must be greater than 5 characters";
    else $data['password'] = $password;


    $_SESSION['loginData'] = $data;

    if (!empty($errors)) {
        $_SESSION['loginErrors'] = $errors;
        redirect(URL."pages/user/login.php");
    }
    else{
        $passwordCheck = checkCorrectPassword($data['email'],sha1($data['password']));
        if($passwordCheck){
            $_SESSION['auth'] =  $passwordCheck;
            if($passwordCheck['role']==1){
                $_SESSION['admin'] = ['admin'];
                redirect(URL."pages/admin/admin.php");
            }else{
                redirect(URL."index.php");
            }
            
        }else{
            $errors['password'] = "Password Incorrect";
            $_SESSION['loginErrors'] = $errors;
            redirect(URL."pages/user/login.php");
        }        
    }

}else {
    echo "error";
}