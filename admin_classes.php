<?php
require('./model/database.php');
require('./model/user_db.php');
require('./model/class_db.php');
require('./model/student_db.php');

session_start();

// Αρχικοποίηση μεταβλητών
$name = $role = $avatar = $action =  '';
$mandatory = 0;

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

// Δημιουργία μεταβλητών μέτα την υποβολή φόρμας από το χρήστη
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $mandatory = filter_input(INPUT_POST, 'mandatory', FILTER_SANITIZE_NUMBER_INT);
  $teacher = filter_input(INPUT_POST, 'teacher', FILTER_SANITIZE_STRING);
  $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
  $classId = filter_input(INPUT_POST, 'classId', FILTER_SANITIZE_NUMBER_INT);
  if(!$mandatory) {
    $mandatory = 0;
  }
}

// Διαχείριση λειτουργίας ανάλογα με την εργασιά για την οποία δημιουργήθηκε η φόρμα
// Δημιουργία μαθήματος(create)
// Ενημέρωση στοιχείων μαθήματος (update)
// Διαγραφή μαθήματος
switch ($action) {
  case 'create':
    if($title && $description && $teacher && $semester){
    $idclass = create_class($title, $description, $mandatory, $teacher, $semester);
    $students = get_all_students();
    foreach($students as $student){
      add_students_to_class($student['ID'], $idclass, $teacher);
    }
    $_SESSION['msg'] = 'Το μάθημα δημιουργήθηκε με επιτυχία';
    header("location: dashboard_admin.php?page=classes");
  } else {
    $error_message = 'Η δημιουργία του μαθήματος απέτυχε.';
    $link = "admin_classes.php";
    include('view/error.php');
  }
    break;
  case 'update':
    if($title && $description && $teacher && $semester){
    update_class($title, $description, $points, $mandatory, $teacher, $semester, $classId);
    $_SESSION['msg'] = 'Το μάθημα ενημερώθηκε με επιτυχία';
    header("location: dashboard_admin.php?page=classes");
    } else {
      $error_message = 'Η επεξεργασία του μαθήματος απέτυχε.';
      $link = "dashboard_admin.php?page=classes";
      include('view/error.php');
    }
    break;
  case 'delete':
    delete_class_registration($classId);
    delete_class($classId);
    $_SESSION['msg'] = 'Το μάθημα διαγράφηκε με επιτυχία';
    header("location: dashboard_admin.php?page=classes");
    break;
  default:
    $teachers = get_users_by_role('teacher');
    include('./view/form_create_class.php');
    break;
}