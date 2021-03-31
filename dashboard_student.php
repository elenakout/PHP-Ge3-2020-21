<?php
  require('./model/database.php');
  require('./model/class_db.php');
  require('./model/student_db.php');


  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatar = $action = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $lastname = $_SESSION["lastName"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
    $userId = $_SESSION["userId"];
    // Έλαγχος αν ο χρήστης είναι admin
    if($role != 'student') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }

  switch ($action) {
    case 'value':
      # code...
      break;

    default:
      $semester = get_student_semester($userId);
      $semester1 = get_classes_by_semester(1);
      $semester2 = get_classes_by_semester(2);
      $semester3 = get_classes_by_semester(3);
      include('./view/student_class.php');
      break;
  }