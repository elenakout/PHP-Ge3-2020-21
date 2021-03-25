<?php
session_start();

$name = '';
$role = '';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION["name"];
  $role = $_SESSION['role'];
}else {
  header("location: index.php");
  exit;
}


include('./view/header.php');
include('./view/navbar.php');

if($role === 'teacher') {

}

include('./view/footer.php');