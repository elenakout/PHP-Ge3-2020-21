<?php

function get_all_students() {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE role = "student"';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function get_students_by_semester($semester){
  global $db;
  $query = 'SELECT R.semesterNum, S.ID, S.name, S.lastName, S.phone, S.email, S.regNum, S.avatar
            FROM semesterregistration R
            LEFT JOIN user S ON R.studentId = S.ID
            WHERE R.semesterNum = :semester
            ORDER BY S.lastName ASC';
  $statement = $db->prepare($query);
  $statement->bindValue(':semester', $semester);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

// function create_student($username, $lastname, $email, $password, $regNum, $gender, $userrole){
//   global $db;
//   $hashpassword = password_hash($password, PASSWORD_DEFAULT);
//   $query = "INSERT INTO user
//               (name, lastName, email, password, regNum, gender, role)
//             VALUES
//               (:name, :lastname, :email, :hashpassword, :regNum, :gender, :role )";
//   $statement = $db->prepare($query);
//   $statement->bindValue(':name', $username);
//   $statement->bindValue(':lastname', $lastname);
//   $statement->bindValue(':email', $email);
//   $statement->bindValue(':hashpassword', $hashpassword);
//   $statement->bindValue(':regNum', $regNum);
//   $statement->bindValue(':gender', $gender);
//   $statement->bindValue(':role', $userrole);
//   $statement->execute();
//   $id = $db->lastInsertId();
//   $statement->closeCursor();


//   return $id;
// }

function register_student_to_semester($id, $semester){
  global $db;
  $count = 0;
  $query = "INSERT INTO semesterregistration
              (semesterNum, studentId)
            VALUES
              (:semester, :userid)";
  $statement = $db->prepare($query);
  $statement->bindValue(':semester', $semester);
  $statement->bindValue(':userid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}
