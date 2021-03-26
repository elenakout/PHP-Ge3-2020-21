<?php
  include('./utils/generators.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatart = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];

    if($role != 'admin') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }

  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
  $regNum = filter_input(INPUT_POST, 'regNum', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $userrole = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
  $semester = '0';
  if($userrole === 'student') {
    $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
  }

  if($action === 'submit') {
    $email = email_generator( $regNum, $role );
    $password = random_password();
    include('./view/form_confirm_register.php');
  } else if($action === 'create') {
    include('./view/form_register.php');
  }else {
    include('./view/form_register.php');
  }
