<?php
require('./model/database.php');
require('./model/user_db.php');
require('./utils/xml_functions.php');

session_start();

// Αρχικοποίηση μεταβλητών
$name = $role = $avatar = $action =  '';

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {};


switch ($action) {
  case 'create':
    $imp = new DOMImplementation;
    $dtd = $imp->createDocumentType('report','','report.dtd');
    $xml_filename = "./assets/files/report_".$userId.".xml";
    $xml = $imp->createDocument("","",$dtd);
    $xml->encoding = 'UTF-8';
    $xml->formatOutput = true;
    break;
  case '':
    break;
  default:
    $xmlhtml = convertXMLToHTML();
    include('./view/admin_xml_form.php');
  break;
}

// $error_message = 'Η επεξεργασία του μαθήματος απέτυχε.';
// $link = "dashboard_admin.php?page=classes";
// include('view/error.php');