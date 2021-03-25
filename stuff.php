<?php
  require('./model/database.php');
  require('./model/admin_db.php');

  session_start();

  $name = '';
  $role = '';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
  }

  $results = get_all_admins();
  $title = 'Γραμματεια';

  include('./view/list_stuff.php');