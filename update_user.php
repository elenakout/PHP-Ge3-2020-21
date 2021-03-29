<?php
  include('./model/database.php');
  include('./model/student_db.php');
  include('./model/teacher_db.php');
  include('./model/admin_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $avatar = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
    // Έλαγχος αν ο χρήστης είναι admin
    if($role != 'admin') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }

  // Ανάθεση μεταβλητών όταν υποβληθεί η φόρμα
  $username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
  $regNum = filter_input(INPUT_POST, 'regNum', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $roleuser = filter_input(INPUT_POST, 'roleuser', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);


  switch ($roleuser) {
    case 'teacher':
      update_teacher($username, $lastname, $regNum, $gender, $email, $userId);
      header('location: dashboard_admin.php');
      break;
    case 'admin':
      update_admin($username, $lastname, $regNum, $gender, $email, $userId);
      header('location: dashboard_admin.php');
      break;
    default:
      update_admin($username, $lastname, $regNum, $gender, $email, $userId);
      header('location: dashboard_admin.php');
      break;
  }
