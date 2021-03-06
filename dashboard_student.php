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
    // Έλαγχος αν ο χρήστης είναι student
    if($role != 'student') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }

  // Δημιουργία μεταβλητών μέτα την υποβολή φόρμας από το χρήστη
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $regid = filter_input(INPUT_POST, 'regId', FILTER_SANITIZE_NUMBER_INT);
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

  // Διαχείριση λειτουργίας ανάλογα με την εργασιά για την οποία δημιουργήθηκε η φόρμα
  // Εγγραφή σε μάθημα(register)
  // Απεγραφή από μάθημα (unregister)
  // Εμφάνιση Προφίλ (profile)
  // Ενημέρωση στοιχείων (update)
  // Εμφάνιση στατιστικών και πίνακα μαθημάτων(default)
  switch ($action) {
    case 'register':
      $count = register_student_to_class($regid);
      header("location: dashboard_student.php");
      break;
    case 'unregister':
      $count = unregister_student_to_class($regid);
      header("location: dashboard_student.php");
      break;
    case 'profile':
      $student = get_user_by_id($userId);
      $address = get_user_address($userId);
      include('./view/student_profile.php');
      break;
    case 'update':
      update_user_info($userId, $phone, $birthday);
      update_user_address($userId, $street, $strnum, $city, $postalcode);
      $_SESSION['msg'] = 'Τα στοιχεία ενημερώθηκαν με επιτυχία';
      header("location: dashboard_student.php");
      break;
    default:
      $classes = get_student_classes($userId);
      $stusemester = get_student_semester($userId);
      $manPass = mandatory_passed($classes);
      $manRem = 8 - $manPass;
      $regClass = register_classes($classes);
      $nomanPass = nomandatory_passed($classes);
      $registerClasses = $regClass - $manPass - $nomanPass;
      $nomanRem = 2 - $nomanPass;
      $points = 5 * $manPass + $nomanPass;
      $pointsRem = 45 - (5 * $manPass + $nomanPass);
      $semester1 = get_student_classes_by_semester($userId, 1);
      $semester2 = get_student_classes_by_semester($userId, 2);
      $semester3 = get_student_classes_by_semester($userId, 3);
      include('./view/student_class.php');
      break;
  }