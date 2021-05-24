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
  // Δημιουργία και εμφάνιση XML αρχείου
  case 'create':
    $students = averageGrades($semester);
    // Έλεγχος αν υπάρχουν μαθητές
    if (!$students) {
      $error_message = 'Δεν βρέθηκαν μαθητές για το συγκεκριμένο εξάμηνο';
      $link = "admin_xml.php";
      include('view/error.php');
    }
    // Έλεγχος γαι τη σωστή δημιουργία του xml αρχείου
    $created = createXML($students, $userId, $semester);
    if($created) {
      $xmlhtml = convertXMLToHTML($userId);
      if(!$xmlhtml){
        $error_message = 'Το XML αρχείο δεν είναι έγκυρο σύμφωνα με το DTD. Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.';
        $link = "admin_xml.php";
        include('view/error.php');
      }
      include('./view/admin_display_xml.php');
    } else {
      $error_message = 'Η δημιουργία του αρχείου xml απέτυχε. Παρακαλώ επικοινωνίστε με τη γραμματεία.';
      $link = "admin_xml.php";
      include('view/error.php');
    }
    break;
  default:
    include('./view/admin_xml_form.php');
  break;
}
