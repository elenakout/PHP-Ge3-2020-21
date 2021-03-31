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

function get_student_semester($id) {
  global $db;
  $query = 'SELECT semesterNum
            FROM semesterregistration
            WHERE studentId = :studentid';
  $statement = $db->prepare($query);
  $statement->bindValue(':studentid', $id);
  $statement->execute();
  $semester = $statement->fetch();
  $statement->closeCursor();
  return $semester;
}
