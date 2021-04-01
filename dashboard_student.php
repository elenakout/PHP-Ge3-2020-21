<?php
  require('./model/database.php');
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
    if($role != 'student') {
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
  }

  switch ($action) {
    case 'register':
      $count = register_student_to_class($regid);
      // $reg = get_regclass($regid);
      header("location: dashboard_student.php");
      // include('./view/student_test.php');
      break;
    case 'unregister':
      $count = unregister_student_to_class($regid);
      // $reg = get_regclass($regid);
      header("location: dashboard_student.php");
      // include('./view/student_test.php');
      break;
    default:
      $classes = get_student_classes($userId);
      $stusemester = get_student_semester($userId);
      $manPass = mandatory_passed($classes);
      $regClass = register_classes($classes);
      $nomanPass = nomandatory_passed($classes);
      $semester1 = get_student_classes_by_semester($userId, 1);
      $semester2 = get_student_classes_by_semester($userId, 2);
      $semester3 = get_student_classes_by_semester($userId, 3);
      include('./view/student_class.php');
      break;
  }