<?php
require_once "../../db/config.php";
session_start();

require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'core/validations.php';

echo "<pre>";

if (checkRequestMethod($_SERVER['REQUEST_METHOD'])) {
    $errors = [];
    $data = [];
    $image = $_FILES['file'];

    var_dump($image);
    echo "post:";
    var_dump($_POST);
    echo "get:";
    var_dump($_GET);
    $this_email=$_GET['email'];
    $this_name=$_GET['name'];
    $this_image=$_GET['image'];
    
    foreach ($_POST as $key => $value) {
        $$key = senitizeInput($value);
    };

    // name
    if (requiredInput($name)) $errors['name'] = "Name is required";
    elseif (minInput($name, 3)) $errors['name'] = "Name is must be greater than 3 characters";
    elseif (maxInput($name, 20)) $errors['name'] = "Name is must be smaller than 20 characters";
    elseif($name==$this_name) $data['name'] = NULL;
    else $data['name'] = $name;
    // email 
    if (requiredInput($email)) $errors['email'] = "Email is required";
    elseif (emailValidate($email)) $errors['email'] = "Enter a valid email";
    elseif (getOneByEmail($email)&& $email!=$this_email) $errors['email'] = "Email is used before try another one";
    elseif($email==$this_email) $data['email'] = NULL;
    else $data['email'] = $email;
    //password
    if (requiredInput($password)) $data['password'] = NULL;
    elseif (minInput($password, 5)) $errors['password'] = "Password is must be greater than 5 characters";
    else $data['password'] = $password;

    //image 
    if($image['error'] && !empty($image['name'])){
        $errors['image'] = "Please choose a picture";

        var_dump($errors);
    } 
    else{
        if(!empty($image['name'])){
            echo "hello";
            unlink(ROOT_PATH."uploads".DS.$this_image);
            $_SESSION['image'] = $image;
            $f_tmp_name = $image['tmp_name'];
            $ext = pathinfo($image['name']);
            $original_name = $ext['filename'];
            $original_ext = $ext['extension'];
            $allowed = array("png","jpg","jpeg","gif");
            if(in_array($original_ext, $allowed)){
                $new_name = uniqid('',true).".".$original_ext;
                $destnotion = ROOT_PATH."uploads/".$new_name;
                move_uploaded_file($f_tmp_name, $destnotion);	
                $data['image'] = $new_name;
            }
            else{
                $errors['image'] = "Your File Not Allowed";
            } 
        }
        echo "data:";
        var_dump($data);

       
    }


    $_SESSION['updateUserData'] = $data;

    if (!empty($errors)) {
        $_SESSION['updateUserErrors'] = $errors;
        redirect(URL."pages/admin/edit.php?email=".$this_email);
    }
    elseif(!$data['name']&&!$data['email']&&!$data['password']&&!$data['image']){
        $errors['update'] = "No Updates Found!";
        $_SESSION['updateUserErrors'] = $errors;
        redirect(URL."pages/admin/edit.php?email=".$this_email);

    }
    else{
        $data['password'] =$data['password']? sha1($password):NULL;
        $_SESSION['updateUserData'] = $data;
        $new_user = $_SESSION['updateUserData'];
        var_dump($new_user);

        
        if ($new_user['name']){

            UpdateUserNameByEmail($this_email, $new_user['name']);
        }
        if ($new_user['email']){

            UpdateUserEmailByEmail($this_email, $new_user['email']);
        }
        if ($new_user['password']){

            UpdateUserPasswordByEmail($this_email, $new_user['password']);
        }
        if ($new_user['image']){

            UpdateUserImageByEmail($this_email, $new_user['image']);
        }

        
        redirect(URL."pages/admin/allUsers.php");  
    }
} else {
    echo "error";
}