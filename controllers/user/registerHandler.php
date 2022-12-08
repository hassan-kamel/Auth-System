<?php
require_once "../../db/config.php";
session_start();

require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'core/validations.php';


if (checkRequestMethod($_SERVER['REQUEST_METHOD']) && checkPostInput('name')) {
    $errors = [];
    $data = [];
    $image = $_FILES['file'];
    
    foreach ($_POST as $key => $value) {
        $$key = senitizeInput($value);
    };

    // name
    if (requiredInput($name)) $errors['name'] = "Name is required";
    elseif (minInput($name, 3)) $errors['name'] = "Name is must be greater than 3 characters";
    elseif (maxInput($name, 20)) $errors['name'] = "Name is must be smaller than 20 characters";
    else $data['name'] = $name;
    // email 
    if (requiredInput($email)) $errors['email'] = "Email is required";
    elseif (emailValidate($email)) $errors['email'] = "Enter a valid email";
    elseif (getOneByEmail($email)) $errors['email'] = "Email is used before try another one";
    else $data['email'] = $email;
    //password
    if (requiredInput($password)) $errors['password'] = "Password is required";
    elseif (minInput($password, 5)) $errors['password'] = "Password is must be greater than 5 characters";
    else $data['password'] = $password;
    //image 
    if($image['error']){
        $errors['file'] = "Please choose a picture";
    } 
    else{
        $_SESSION['image'] = $image;
        $f_tmp_name = $image['tmp_name'];
	    $ext = pathinfo($image['name']);
		$original_name = $ext['filename'];
		$original_ext = $ext['extension'];
	    $allowed = array("png","jpg","jpeg","gif");
		if(in_array($original_ext, $allowed)){
            $new_name = uniqid('',true).".".$original_ext;
			$destnotion = ROOT_PATH."uploads/".$new_name;
            // echo $destnotion;
			move_uploaded_file($f_tmp_name, $destnotion);	
            $data['image'] = $new_name;
        }
        else{
            $errors['file'] = "Your File Not Allowed";
        } 
    }


    

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(URL."pages/user/register.php");
    }
    else{
        $data['password'] = sha1($password);
        $_SESSION['data'] = $data;
        $new_user = $_SESSION['data'];
        addNewUser($new_user['name'],$new_user['email'],$new_user['password'],$new_user['image']);
        $_SESSION['auth'] = $new_user;
        redirect(URL."index.php");  
    }

    
} else {
    echo "error";
}