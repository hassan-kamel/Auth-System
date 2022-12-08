<?php 

define("URL","http://localhost/Commerce_ODC/");
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);


$servername = "localhost";
$username = "root";
$password = "";


$dsn = "mysql:host=$servername;dbname=ecommerce_odc";

try {
  $conn = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


function getAll($table):array{

    global $conn;
    $sql = "SELECT * FROM `$table`";
    $statment = $conn->prepare($sql);
    $statment->execute();
    $result = $statment->fetchAll();
    return $result;
}

function getOneByID($table,$id){

    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `id` = '$id'";
    $statment = $conn->prepare($sql);
    $statment->execute();
    $result = $statment->fetch();
    return $result;
}

function getOneByEmail($email){

    global $conn;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $statment = $conn->prepare($sql);
    // var_dump($statment);
    $statment->execute();
    // var_dump($statment);
    $result = $statment->fetch();
    // var_dump($result);
    return $result;    
}

function addNewUser($name , $email , $password , $image){
    global $conn;
    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `image`) VALUES ( '$name', '$email', '$password',  '$image')";
    $statment = $conn->prepare($sql);
    $statment->execute();
    $result = $statment->fetch();
    return $result;
}

function checkCorrectPassword($email,$password){
    global $conn;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $statment = $conn->prepare($sql);
    $statment->execute();
    $result = $statment->fetch();
    if($result['password']==$password) return $result;
    else return false;
}


function deleteUserByEmail($email){
  global $conn;
  $sql = "DELETE FROM `users` WHERE `email`='$email'";
  $statment = $conn->prepare($sql);
  $result =$statment->execute();
  return $result;
}
function UpdateUserNameByEmail($email,$name){
  global $conn;
  $sql = "UPDATE `users` SET name = '$name' WHERE `email` = '$email'";
  $statment = $conn->prepare($sql);
  $result =$statment->execute();
  return $result;
}
function UpdateUserEmailByEmail($email,$updatedEmail){
  global $conn;
  $sql = "UPDATE `users` SET email = '$updatedEmail' WHERE `email` = '$email'";
  $statment = $conn->prepare($sql);
  $result =$statment->execute();
  return $result;
}
function UpdateUserPasswordByEmail($email,$password){
  global $conn;
  $sql = "UPDATE `users` SET password = '$password' WHERE `email` = '$email'";
  $statment = $conn->prepare($sql);
  $result =$statment->execute();
  return $result;
}
function UpdateUserImageByEmail($email,$image){
  global $conn;
  $sql = "UPDATE `users` SET image = '$image' WHERE `email` = '$email'";
  $statment = $conn->prepare($sql);
  $result =$statment->execute();
  return $result;
}

// var_dump(getOneByID('users',1));