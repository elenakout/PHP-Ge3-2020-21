<?php
  require('./model/database.php');
  require('./model/teacher_db.php');

  session_start();

  $name = '';
  $role = '';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
  }

  $results = get_all_teachers();
  $title = 'Διδασκοντες';

  include('./view/list_stuff.php');