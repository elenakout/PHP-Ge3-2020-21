<?php
  require('./model/database.php');
  require('./model/user_db.php');

  //Αρχικοποίηση session
  session_start();

  // Έλεγχος άν ο χρήστης είναι ήδη συνδεμένος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $role = $_SESSION['role'];
    // Επιλογή σελίδας αναδρομολογησης ανάλογα με το ρόλο του χρήστη
    switch($role) {
      case 'teacher':
        header("location: dashboard_teacher.php");
        break;
      case 'student':
        header("location: dashboard_student.php");
        break;
      case 'admin':
        header("location: dashboard_admin.php");
        break;
      default:
        header("location: index.php");
    }
  }

  // Αρχικοποίηση μεταβλητών
  $email = $password = $error = $name = $lastName = $role = "";
  $userId = null;

  // Επεξεργασία δεδομένων φόρμας κατά την υποβολή της φόρμας
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // αυθεντικοποίηση χρήστη
    $user = user_login($email, $password);
    if($user === 0){
      $error = 'Δεν υπάρχει εγγεγραμενος χρήστης με αυτό το email';
    } else if($user === -1){
      $error = 'Εσφαλμένος κωδικός password';
    } else {
      // Αποθήκευση μεταβλητών στο Session
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["name"] = $user["name"];
      $_SESSION["lastName"] = $user["lastName"];
      $_SESSION["role"] = $user["role"];
      $_SESSION["userId"] = $user["ID"];
      $_SESSION["avatar"] = $user["avatar"];

      header('location: login.php');
    }
  }

  include('./view/form_login.php');
