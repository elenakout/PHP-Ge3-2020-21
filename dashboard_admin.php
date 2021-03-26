<?php
  require('./model/database.php');
  require('./model/teacher_db.php');
  require('./model/student_db.php');
  require('./model/admin_db.php');
  require('./model/class_db.php');


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

  $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

  switch($page) {
    case 'teachers':
      $teachers = get_all_teachers();
      include('./view/admin_teachers.php');
      break;
    case 'admins':
      $admins = get_all_admins();
      include('./view/admin_stuff.php');
      break;
    case 'classes':
      $semester1 = get_classes_by_semester(1);
      include('./view/admin_classes.php');
      break;
    default:
      $students = get_all_students();
      include('./view/admin_students.php');
  }