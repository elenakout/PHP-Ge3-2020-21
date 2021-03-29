<?php
  require('./utils/generators.php');
  require('./model/database.php');
  require('./model/auth_db.php');
  require('./utils/active_user');


  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);

  if($action == 'reset') {
    $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
  }else {
    $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
  }

  if($action == 'reset') {
    $count = reset_user_password($id, $newPassword);
    header("location: dashboard_admin.php?page=profile&userId=" . $id);
    exit;
  }else {
    $genPassword = random_password();
    $user = get_user_by_id($id);
    include("./view/admin_reset_password.php");
  }
