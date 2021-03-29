<?php

function get_all_admins() {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE role = "admin"';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function create_admin($username, $lastname, $email, $password, $regNum, $gender, $userrole){
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
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function update_admin($username, $lastname, $regNum, $gender, $email, $userId) {
  global $db;
  $count = 0;
  $query = 'UPDATE user
            SET name = :name, lastName = :lastname, regNum = :regnum,
              gender = :gender, email = :email WHERE ID = :id';
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