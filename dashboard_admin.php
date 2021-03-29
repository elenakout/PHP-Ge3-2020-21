<?php
  require('./model/database.php');
  require('./model/auth_db.php');
  require('./model/teacher_db.php');
  require('./model/student_db.php');
  require('./model/admin_db.php');
  require('./model/class_db.php');
  require('./utils/active_user.php');


  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $userId = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
  }


  switch($page) {
    case 'teachers':
      $teachers = get_all_teachers();
      include('./view/admin_teachers.php');
      break;
    case 'admins':
      $admins = get_all_admins();
      include('./view/admin_stuff.php');
      break;
    case 'classes':
      $semester1 = get_classes_by_semester(1);
      include('./view/admin_classes.php');
      break;
    case 'student_profile':
      $student = get_student_info($studentId);
      break;
    case 'profile':
      $user = get_user_by_id($userId);
      include('./view/admin_profile.php');
      break;
    default:
      $stdSem1 = get_students_by_semester(1);
      $stdSem2 = get_students_by_semester(2);
      $stdSem3 = get_students_by_semester(3);
      include('./view/admin_students.php');
  }