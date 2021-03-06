<?php
  require('./model/database.php');
  require('./model/user_db.php');
  require('./model/student_db.php');
  require('./model/class_db.php');
  require('./utils/generators.php');


  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatar = $action = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
    $lastname = $_SESSION["lastName"];
    // Έλαγχος αν ο χρήστης είναι admin
    if($role != 'admin') {
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
    $username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $userlastname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $regNum = filter_input(INPUT_POST, 'regNum', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $roleuser = filter_input(INPUT_POST, 'roleuser', FILTER_SANITIZE_STRING);
    $semester = '0';
    if($roleuser === 'student') {
      $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
    }

    if($action === 'create'){
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    }
    if($action === 'update') {
      $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    }
    if($action === 'update_admin') {
      $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
      $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
      $birthday = trim($_POST["birthday"]);
      $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
      $strnum = filter_input(INPUT_POST, 'strnum', FILTER_SANITIZE_STRING);
      $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
      $postalcode = filter_input(INPUT_POST, 'postalcode', FILTER_SANITIZE_STRING);
    }
  }

  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $roleuser = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);
  }

  // Διαχείριση λειτουργίας ανάλογα με την εργασιά για την οποία δημιουργήθηκε η φόρμα
  // Δημιουργία χρήστη (submit, create)
  // Ενημέρωση στοιχείων χρήστη (update, update_admin)
  switch($action) {
    // Αν η φόρμα υποβληθεί δημιουργούμε αντίστοιχο email χρήστη και τυχαίο password
    case 'submit':
      $email = email_generator( $regNum, $roleuser );
      $password = random_password();
      include('./view/form_confirm_register.php');
      break;
    case 'create':
      if($username && $userlastname && $email && $password && $regNum && $gender && $roleuser){
      $id = create_user($username, $userlastname, $email, $password, $regNum, $gender, $roleuser);
      create_address($id);
      if($roleuser == 'student'){
        register_student_to_semester($id, $semester);
        add_classes($id);
      }
      $_SESSION['msg'] = 'Ο χρήστης δημιουργήθηκε με επιτυχία';
      header("location: dashboard_admin.php");
      } else {
        $error_message = 'Η εγγραφή του χρήστη απέτυχε.';
        $link = "dashboard_admin.php";
        include('view/error.php');
      }
      break;
    case 'update':
      if($username && $userlastname && $email && $regNum && $gender && $userId){
      update_user($username, $userlastname, $regNum, $gender, $email, $userId);
      $_SESSION['msg'] = 'Τα στοιχεία του χρήστη ενημερώθηκαν με επιτυχία';
      header("location: dashboard_admin.php");
    } else {
      $error_message = 'Η διόρθωση των στοιχείων του χρήστη απέτυχε.';
      $link = "dashboard_admin.php";
      include('view/error.php');
    }
      break;
    case 'update_admin':
      update_user_info($userId, $phone, $birthday);
      update_user_address($userId, $street, $strnum, $city, $postalcode);
      $_SESSION['msg'] = 'Τα στοιχεία ενημερώθηκαν με επιτυχία';
      header("location: dashboard_admin.php");
    default:
    $regNum = random_num();
    include('./view/form_register.php');
    break;
  }