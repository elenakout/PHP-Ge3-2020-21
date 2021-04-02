<?php

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

function get_student_classes_by_semester($id, $semester) {
  global $db;
  $query = 'SELECT R.grade, R.ID as regId, R.register, C.ID as classid, C.title, C.points, C.mandatory, C.classSemester, C.teacherId, T.name, T.lastName
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

function get_student_classes($id) {
  global $db;
  $query = 'SELECT R.grade, R.ID as regId, R.register, C.ID as classid, C.points, C.mandatory, C.classSemester
            FROM classregistration R
            LEFT JOIN class C ON R.classId = C.ID
            WHERE R.studentId = :studentid';
  $statement = $db->prepare($query);
  $statement->bindValue(':studentid', $id);
  $statement->execute();
  $classes = $statement->fetchAll();
  $statement->closeCursor();
  return $classes;
}

function update_student_grade($regId, $grade) {
  global $db;
  $count = 0;
  $query = 'UPDATE classregistration
            SET grade = :grade
            WHERE ID = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $regId);
  $statement->bindValue(':grade', $grade);
  if ($statement->execute()) {
      $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function update_student_semester($id, $semester){
  global $db;
  $count = 0;
  $query = 'UPDATE semesterregistration
            SET semesterNum = :semester
            WHERE studentId = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $id);
  $statement->bindValue(':semester', $semester);
  if ($statement->execute()) {
      $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function get_teacher_students($teacherId){
  global $db;
  $query = 'SELECT R.ID as regId, R.grade, R.register, S.ID as stdId, S.name, S.lastName, S.regNum, S.avatar, C.ID as classId, C.title, C.classSemester
            FROM classregistration R
            LEFT JOIN user S ON R.studentId = S.ID
            LEFT JOIN class C ON R.classId = C.ID
            WHERE R.teacherId = :teacherid AND R.register = true
            ORDER BY C.classSemester AND S.lastName ASC';
  $statement = $db->prepare($query);
  $statement->bindValue(':teacherid', $teacherId);
  $statement->execute();
  $students = $statement->fetchAll();
  $statement->closeCursor();
  return $students;
}

function mandatory_passed($classes){
  $count = 0;
  foreach($classes as $class) {
    if($class['mandatory'] && $class['grade'] >= 5) {
      $count++;
    }
  }
  return $count;
}

function register_classes($classes){
  $count = 0;
  foreach($classes as $class) {
    if($class['register']) {
      $count++;
    }
  }
  return $count;
}

function nomandatory_passed($classes){
  $count = 0;
  foreach($classes as $class) {
    if(!$class['mandatory'] && $class['grade'] >= 5) {
      $count++;
    }
  }
  return $count;
}
