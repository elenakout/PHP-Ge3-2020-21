<?php
  require('./model/database.php');
  require('./model/user_db.php');
  require('./model/student_db.php');
  require('./model/class_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatar = '';

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


  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $userId = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
    $classId = filter_input(INPUT_GET, 'classId', FILTER_SANITIZE_STRING);
  }


  switch($page) {
    case 'teacher':
      $teachers = get_users_by_role($page);
      include('./view/admin_teachers.php');
      break;
    case 'admin':
      $admins = get_users_by_role($page);
      include('./view/admin_stuff.php');
      break;
    case 'classes':
      $semester1 = get_classes_by_semester(1);
      $semester2 = get_classes_by_semester(2);
      $semester3 = get_classes_by_semester(3);
      include('./view/admin_classes.php');
      break;
    case 'student_profile':
      $user = get_user_by_id($userId);
      $address = get_user_address($userId);
      $classes = get_student_classes($userId);
      $stusemester = get_student_semester($userId);
      $manPass = mandatory_passed($classes);
      $manRem = 8 - $manPass;
      $regClass = register_classes($classes);
      $nomanPass = nomandatory_passed($classes);
      $registerClasses = $regClass - $manPass - $nomanPass;
      $nomanRem = 2 - $nomanPass;
      $points = 5 * ($manPass + $nomanPass);
      $pointsRem = 45 - (5 * ($manPass + $nomanPass));
      $semester1 = get_student_classes_by_semester($userId, 1);
      $semester2 = get_student_classes_by_semester($userId, 2);
      $semester3 = get_student_classes_by_semester($userId, 3);
      include('./view/admin_student_profile.php');
      break;
    case 'profile':
      $user = get_user_by_id($userId);
      $address = get_user_address($userId);
      include('./view/admin_profile.php');
      break;
    case 'class':
      $teachers = get_users_by_role('teacher');
      $class = get_class_by_id($classId);
      include('./view/admin_class.php');
      break;
    default:
      $stdSem1 = get_students_by_semester(1);
      $stdSem2 = get_students_by_semester(2);
      $stdSem3 = get_students_by_semester(3);
      include('./view/admin_students.php');
  }