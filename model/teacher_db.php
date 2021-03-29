<?php

function get_all_teachers() {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE role = "teacher"';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function create_teacher($username, $lastname, $email, $password, $regNum, $gender, $userrole){
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

function update_teacher($username, $lastname, $regNum, $gender, $email, $userId) {
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

function update_city($id, $city, $countrycode, $district, $population) {
  global $db;
  $count = 0;
  $query = 'UPDATE city
          SET Name = :city, CountryCode = :countrycode, District = :district,
              Population = :population WHERE ID = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $id);
  $statement->bindValue(':city', $city);
  $statement->bindValue(':countrycode', $countrycode);
  $statement->bindValue(':district', $district);
  $statement->bindValue(':population', $population);
  if ($statement->execute()) {
      $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}