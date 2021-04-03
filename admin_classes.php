<?php
require('./model/database.php');
require('./model/user_db.php');
require('./model/class_db.php');

session_start();

// Αρχικοποίηση μεταβλητών
$name = $role = $avatar = $action = $mandatory = '';

// Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $name = $_SESSION["name"];
  $lastname = $_SESSION["lastName"];
  $role = $_SESSION['role'];
  $avatar = $_SESSION['avatar'];
  // Έλαγχος αν ο χρήστης είναι admin
  if ($role != 'admin') {
    header("location: index.php");
    exit;
  }
} else {
  header("location: index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $points = filter_input(INPUT_POST, 'points', FILTER_SANITIZE_STRING);
  $mandatory = $_POST["mandatory"];
  $teacher = filter_input(INPUT_POST, 'teacher', FILTER_SANITIZE_STRING);
  $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
  $classId = filter_input(INPUT_POST, 'classId', FILTER_SANITIZE_STRING);
  if(!$mandatory) {
    $mandatory = 0;
  }
}


switch ($action) {
  case 'create':
    if($title && $description && $points && $teacher && $semester){
    create_class($title, $description, $points, $mandatory, $teacher, $semester);
    header("location: dashboard_admin.php?page=classes");
  } else {
    $error_message = 'Η δημιουργία του μαθήματος απέτυχε.';
    $link = "admin_classes.php";
    include('view/error.php');
  }
    break;
  case 'update':
    if($title && $description && $points && $mandatory && $teacher && $semester && $classId){
    update_class($title, $description, $points, $mandatory, $teacher, $semester, $classId);
    header("location: dashboard_admin.php?page=classes");
    } else {
      $error_message = 'Η επεξεργασία του μαθήματος απέτυχε.';
      $link = "admin_classes.php";
      include('view/error.php');
    }
    break;
  default:
    $teachers = get_users_by_role('teacher');
    include('./view/form_create_class.php');
    break;
}