<?php
session_start();

$name = '';


if(isset($_SESSION["name"])){
  echo $_SESSION["name"];
  echo $_SESSION["loggedin"];
  echo $_SESSION["name"];
  echo $_SESSION["lastName"];
  echo $_SESSION["role"];
  echo $_SESSION["userId"];
  $name = $_SESSION["name"];
  $role = $_SESSION['role'];
}



include('./view/header.php');
include('./view/navbar.php');