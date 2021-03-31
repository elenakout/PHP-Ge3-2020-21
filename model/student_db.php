<?php

// function get_all_students() {
//   global $db;
//   $query = 'SELECT *
//             FROM user
//             WHERE role = "student"';
//   $statement = $db->prepare($query);
//   $statement->execute();
//   $results = $statement->fetchAll();
//   $statement->closeCursor();
//   return $results;
// }

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

function get_student_classes($id) {
  global $db;
  $query = 'SELECT R.state, R.grade, C.title
            FROM classregistration R
            LEFT JOIN class C ON R.classId = C.ID
            WHERE studentId = :studentid';
  $statement = $db->prepare($query);
  $statement->bindValue(':studentid', $id);
  $statement->execute();
  $classes = $statement->fetchAll();
  $statement->closeCursor();
  return $classes;
}

function get_student_classes_by_semester($id, $semester) {
  global $db;
  $query = 'SELECT R.state, R.grade, C.ID, C.title, C.points, C.mandatory, C.classSemester, T.name, T.lastName
            FROM classregistration R
            LEFT JOIN class C ON R.classId = C.ID
            LEFT JOIN user T on R.teacherId = T.ID
            WHERE R.studentId = :studentid AND C.classSemester = :semester';
  $statement = $db->prepare($query);
  $statement->bindValue(':studentid', $id);
  $statement->bindValue(':semester', $semester);
  $statement->execute();
  $classes = $statement->fetchAll();
  $statement->closeCursor();
  return $classes;
}
