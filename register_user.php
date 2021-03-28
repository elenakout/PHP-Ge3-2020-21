<?php
  include('./utils/generators.php');
  include('./model/database.php');
  include('./model/student_db.php');
  include('./model/teacher_db.php');
  include('./model/admin_db.php');

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

  // Ανάθεση μεταβλητών όταν υποβληθεί η φόρμα
  $userrole = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);

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

  // Αν η φόρμα υποβληθεί δημιουργούμε αντίστοιχο email χρήστη και τυχαίο password
  if($action === 'submit') {
    $email = email_generator( $regNum, $roleuser );
    $password = random_password();
    include('./view/form_confirm_register.php');
    // Οταν επιβεβαώνουμε την εγγρφή του χρήστη εκτελούμε τη μέθοδο για δημιουργία χρήστη ανάλογα με το ρόλο του χρήστη
  } else if($action === 'create') {
      switch($roleuser) {
        case 'student':
          $studentId = create_student($username, $lastname, $email, $password, $regNum, $gender, $roleuser);
          register_student_to_semester($studentId, $semester);
          if($studentId) {
            header("location: dashboard_admin.php");
          }else {
            $error_message = 'Η εισαγωγή του χρήστη δε πραγματοποιήθηκε σωστά';
          }
          break;
        case 'teacher':
          $count = create_teacher($username, $lastname, $email, $password, $regNum, $gender, $roleuser);
          if($count) {
            header("location: dashboard_admin.php");
          }else {
            $error_message = 'Η εισαγωγή του χρήστη δε πραγματοποιήθηκε σωστά';
          }
          break;
        case 'admin':
          $count = create_admin($username, $lastname, $email, $password, $regNum, $gender, $roleuser);
          if($count) {
            header("location: dashboard_admin.php");
          }else {
            $error_message = 'Η εισαγωγή του χρήστη δε πραγματοποιήθηκε σωστά';
          }
      }
  // Άν η φόρμα δεν έχει υποβληθεί και δεν έχουν ανατεθεί τιμές στις μεταβλητές εμφανίζουμε την ρχική φόρμα δημιουργίας χρήστη.
  }else {
    include('./view/form_register.php');
  }
