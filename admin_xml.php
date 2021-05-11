<?php
require('./model/database.php');
require('./model/user_db.php');
require('./model/student_db.php');
require('./utils/xml_functions.php');

session_start();

// Αρχικοποίηση μεταβλητών
$name = $role = $avatar = $action = '';

// Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $userId = $_SESSION["userId"];
  $name = $_SESSION["name"];
  $lastname = $_SESSION["lastName"];
  $role = $_SESSION['role'];
  $avatar = $_SESSION['avatar'];
  // Έλεγχος αν ο χρήστης είναι admin
  if ($role != 'admin') {
    header("location: index.php");
    exit;
  }
}

// Δημιουργία μεταβλητών μέτα την υποβολή φόρμας από το χρήστη
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
};


switch ($action) {
  case 'create':
    $students = averageGrades($semester);
    $created = createXML($students, $userId);
    if($created) {
      $xmlhtml = convertXMLToHTML($userId);
    } else {
      $xmlhtml = 'Sorry no data';
    }
    include('./view/admin_display_xml.php');
    break;
  default:
    include('./view/admin_xml_form.php');
  break;
}

// $error_message = 'Η επεξεργασία του μαθήματος απέτυχε.';
// $link = "dashboard_admin.php?page=classes";
// include('view/error.php');