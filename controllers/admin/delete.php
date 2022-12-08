<?php
require_once "../../db/config.php";
session_start();

require_once ROOT_PATH.'core/functions.php';



 if(!isset($_SESSION["admin"]))  redirect(URL.'index.php');  


if(checkRequestMethod($_SERVER['REQUEST_METHOD'])){
    echo "<Pre>";
    
    $email = explode('=',$_SERVER['QUERY_STRING'])[1] ;

    $image_name= getOneByEmail($email)['image'];
    var_dump($image_name);
    unlink(ROOT_PATH."uploads/".$image_name);
    if(deleteUserByEmail($email)){
        echo "deleted";
        redirect(URL.'pages/admin/allUsers.php');       
    }
    else{
        var_dump(deleteUserByEmail($email));
    }
   
    

}