<?php

function user_login($email, $password) {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE email = :usermail';
  $statement = $db->prepare($query);
  $statement->bindParam(":usermail", $email);
  $statement->execute();

  // Έλεγχος αν υπάρχει ο χρήστης
  if($statement->rowCount() == 1){
    $user = $statement->fetch();
    $hashed_password = $user["password"];

    // Έλεγχος password
    if(password_verify($password, $hashed_password)) {
      $statement->closeCursor();
      return $user;
    }else {
      $statement->closeCursor();
      return -1;
    }

  } else{
    $statement->closeCursor();
    return 0;
  }

}

function get_user_by_id($userId) {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE ID = :userId';
  $statement = $db->prepare($query);
  $statement->bindParam(":userId", $userId);
  $statement->execute();
  $user = $statement->fetch();
  $statement->closeCursor();
  return $user;
}