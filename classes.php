<?php
  require('./model/database.php');
  require('./model/class_db.php');

  session_start();

  $name = '';
  $role = '';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
  }


  $semester1 = get_classes_by_semester(1);
  $semester2 = get_classes_by_semester(2);
  $semester3 = get_classes_by_semester(3);

  include('./view/table_classes.php');
