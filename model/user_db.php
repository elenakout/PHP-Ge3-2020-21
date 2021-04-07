<?php

// Αυθεντικοποίηση χρήστη
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

// Δημιουργία χρήστη
function create_user($username, $lastname, $email, $password, $regNum, $gender, $userrole){
  global $db;
  $hashpassword = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO user
              (name, lastName, email, password, regNum, gender, role)
            VALUES
              (:name, :lastname, :email, :hashpassword, :regNum, :gender, :role )";
  $statement = $db->prepare($query);
  $statement->bindValue(':name', $username);
  $statement->bindValue(':lastname', $lastname);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':hashpassword', $hashpassword);
  $statement->bindValue(':regNum', $regNum);
  $statement->bindValue(':gender', $gender);
  $statement->bindValue(':role', $userrole);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

// Δημιουργία εγγραφής στο πίνακα Διεύθυνση
function create_address($id) {
  global $db;
  $query = 'INSERT INTO address
              (userId)
            VALUES
              (:userid)';
  $statement = $db->prepare($query);
  $statement->bindValue(':userid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

// Ενημέρωση βασικών στοιχείων του χρήστη στο πίνακα χρήστης
function update_user($username, $lastname, $regNum, $gender, $email, $userId){
  global $db;
  $count = 0;
  $query = 'UPDATE user
            SET name = :name, lastName = :lastname, regNum = :regnum,
              gender = :gender, email = :email
            WHERE ID = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $userId);
  $statement->bindValue(':name', $username);
  $statement->bindValue(':lastname', $lastname);
  $statement->bindValue(':regnum', $regNum);
  $statement->bindValue(':gender', $gender);
  $statement->bindValue(':email', $email);
  if ($statement->execute()) {
      $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

// Ενημέρωση λοιπων στοιχείων του χρήστη στο πίνακα χρήστης
function update_user_info($userId, $phone, $birthday) {
  global $db;
  $count = 0;
  $query = 'UPDATE user
            SET phone = :phone, birthday = :birthday
            WHERE ID = :userid';
  $statement = $db->prepare($query);
  $statement->bindValue(':userid', $userId);
  $statement->bindValue(':phone', $phone);
  $statement->bindValue(':birthday', $birthday);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

// Ενημέρωση στοιχείων διεύθυνσης του χρήστη στο πίνακα διέυθυνση
function update_user_address($userId, $street, $strnum, $city, $postalcode) {
  global $db;
  $count = 0;
  $query = 'UPDATE address
            SET street = :street, strnum = :strnum, city = :city, postalCode = :postalcode
            WHERE userId = :userid';
  $statement = $db->prepare($query);
  $statement->bindValue(':userid', $userId);
  $statement->bindValue(':street', $street);
  $statement->bindValue(':strnum', $strnum);
  $statement->bindValue(':city', $city);
  $statement->bindValue(':postalcode', $postalcode);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

// Ανάκτηση χρήστη με βάση την ΙD του χρήστη
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

// Ανάκτηση διεύθυνσης χρήστη
function get_user_address($userId) {
  global $db;
  $query = 'SELECT *
            FROM address
            WHERE userId = :id';
  $statement = $db->prepare($query);
  $statement->bindParam(":id", $userId);
  $statement->execute();
  $address = $statement->fetch();
  $statement->closeCursor();
  return $address;
}

// Ανάκτηση χρηστών με βάση το ρόλο τους
function get_users_by_role($role) {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE role = :userrole';
  $statement = $db->prepare($query);
  $statement->bindParam(":userrole", $role);
  $statement->execute();
  $users = $statement->fetchAll();
  $statement->closeCursor();
  return $users;
}

// Επαναφορά κωδικού πρόσβασης χρήστη
function reset_user_password($id, $newPassword) {
  global $db;
  $hashpassword = password_hash($newPassword, PASSWORD_DEFAULT);
  $query = 'UPDATE user
            SET password = :newpassword
            WHERE ID = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $id);
  $statement->bindValue(':newpassword', $hashpassword);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}