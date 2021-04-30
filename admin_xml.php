<?php
require('./model/database.php');
require('./model/user_db.php');
require('./utils/xml_functions.php');

// Αρχικοποίηση μεταβλητών
$name = $role = $avatar = $action =  '';

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
}

// Δημιουργία μεταβλητών μέτα την υποβολή φόρμας από το χρήστη
if ($_SERVER["REQUEST_METHOD"] == "POST") {};
$xmlhtml = convertXMLToHTML();
include('./view/admin_xml_form.php');

// switch ($action) {
//   case 'create':
//     if($title && $description && $teacher && $semester){
//     $idclass = create_class($title, $description, $mandatory, $teacher, $semester);
//     $students = get_all_students();
//     foreach($students as $student){
//       add_students_to_class($student['ID'], $idclass, $teacher);
//     }
//     $_SESSION['msg'] = 'Το μάθημα δημιουργήθηκε με επιτυχία';
//     header("location: dashboard_admin.php?page=classes");
//   } else {
//     $error_message = 'Η δημιουργία του μαθήματος απέτυχε.';
//     $link = "admin_classes.php";
//     include('view/error.php');
//   }
//     break;
//   case '':
//     break;
//   default:
//     include('./view/admin_xml_form.php');
//     break;
// }

// $error_message = 'Η επεξεργασία του μαθήματος απέτυχε.';
// $link = "dashboard_admin.php?page=classes";
// include('view/error.php');