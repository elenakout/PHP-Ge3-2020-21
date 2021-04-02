<?php
  require('./model/database.php');
  require('./model/user_db.php');
  require('./model/class_db.php');
  require('./model/student_db.php');


  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatar = $action = '';
  $count = 0;

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $lastname = $_SESSION["lastName"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
    $userId = $_SESSION["userId"];
    // Έλαγχος αν ο χρήστης είναι admin
    if($role != 'teacher') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $regid = filter_input(INPUT_POST, 'regId', FILTER_SANITIZE_NUMBER_INT);
    $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_NUMBER_INT);
  }


  switch ($action) {
    case 'update_info':
      # code...
      break;
    case 'submit_grade':
      update_student_grade($regid, $grade);
      header("location: dashboard_teacher.php");
      break;
    default:
      $students = get_teacher_students($userId);
      $classes = get_teacher_classes($userId);
      include('./view/teacher_class.php');
      break;
  }