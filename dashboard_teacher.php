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
    if($action === 'update'){
      $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
      $birthday = trim($_POST["birthday"]);
      $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
      $strnum = filter_input(INPUT_POST, 'strnum', FILTER_SANITIZE_STRING);
      $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
      $postalcode = filter_input(INPUT_POST, 'postalcode', FILTER_SANITIZE_STRING);
    }
  }

  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
  }

  switch ($action) {
    case 'update':
      update_user_info($userId, $phone, $birthday);
      update_user_address($userId, $street, $strnum, $city, $postalcode);
      header("location: dashboard_teacher.php");
      break;
    case 'profile':
      $teacher = get_user_by_id($userId);
      $address = get_user_address($userId);
      include('./view/teacher_profile.php');
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