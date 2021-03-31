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
    // Έλαγχος αν ο χρήστης είναι admin
    if($role != 'admin') {
      header("location: index.php");
      exit;
    }
  }else {
    header("location: index.php");
    exit;
  }


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
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
  }

  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $roleuser = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);
  }

  switch($action) {
    // Αν η φόρμα υποβληθεί δημιουργούμε αντίστοιχο email χρήστη και τυχαίο password
    case 'submit':
      $email = email_generator( $regNum, $roleuser );
      $password = random_password();
      include('./view/form_confirm_register.php');
      break;
    case 'create':
      $id = create_user($username, $lastname, $email, $password, $regNum, $gender, $roleuser);
      if($roleuser == 'student'){
        register_student_to_semester($id, $semester);
        add_classes($id);
      }
      header("location: dashboard_admin.php");
      break;
    case 'update':
      update_user($username, $lastname, $regNum, $gender, $email, $userId);
      if($roleuser === 'student'){
        update_student_semester($userId, $semester);
      }
      header("location: dashboard_admin.php");
      break;
    default:
    include('./view/form_register.php');
    break;
  }
