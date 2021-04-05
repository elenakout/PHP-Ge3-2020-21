<?php

function get_all_classes() {
  global $db;
  $query = 'SELECT *
            FROM class';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function get_classes_by_semester($semester) {
  global $db;
  $query = 'SELECT C.ID, C.title, C.points, C.mandatory, C.classSemester, T.name, T.lastName
            FROM class C
            LEFT JOIN user T ON C.teacherId = T.ID
            WHERE C.classSemester = :semester';
  $statement = $db->prepare($query);
  $statement->bindValue(':semester', $semester);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function get_teacher_classes($teacherId){
  global $db;
  $query = 'SELECT ID, title, classSemester
            FROM class
            WHERE teacherId = :teacherid';
  $statement = $db->prepare($query);
  $statement->bindValue(':teacherid', $teacherId);
  $statement->execute();
  $classes = $statement->fetchAll();
  $statement->closeCursor();
  return $classes;
}

function create_class($title, $description, $points, $mandatory, $teacher, $semester)
{
  global $db;
  $query = "INSERT INTO class
              (title, description, points, mandatory, teacherId, classSemester)
            VALUES
              (:title, :description, :points, :mandatory, :teacherId, :semester)";
  $statement = $db->prepare($query);
  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':points', $points);
  $statement->bindValue(':mandatory', $mandatory);
  $statement->bindValue(':teacherId', $teacher);
  $statement->bindValue(':semester', $semester);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

function update_class($title, $description, $points, $mandatory, $teacher, $semester, $classId)
{
  global $db;
  $count = 0;
  $query = 'UPDATE class
            SET title = :title, description = :description, points = :points,
              mandatory = :mandatory, teacherId = :teacher, classSemester = :semester WHERE ID = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $classId);
  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':points', $points);
  $statement->bindValue(':mandatory', $mandatory);
  $statement->bindValue(':teacher', $teacher);
  $statement->bindValue(':semester', $semester);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function get_class_by_id($id)
{
  global $db;
  $query = 'SELECT ID, title, points, mandatory, classSemester, description, teacherId
            FROM class C
            WHERE ID = :classid';
  $statement = $db->prepare($query);
  $statement->bindValue(':classid', $id);
  $statement->execute();
  $class = $statement->fetch();
  $statement->closeCursor();
  return $class;
}

function add_classes($id) {
  $classes = get_all_classes();
  global $db;
  $count = 0;
  $statement = null;
  foreach($classes as $class) {
    $teacherId = $class['teacherId'];
    $classId = $class['ID'];
    $query = "INSERT INTO classregistration
                (studentId, teacherId, classId)
              VALUES
                (:studentid, :teacherid, :classid)";
    $statement = $db->prepare($query);
    $statement->bindValue(':studentid', $id);
    $statement->bindValue(':teacherid', $teacherId);
    $statement->bindValue(':classid', $classId);
    if ($statement->execute()) {
      $count = $statement->rowCount();
    };
  }
  $statement->closeCursor();
  return $count;
}

function register_student_to_class($id) {
  global $db;
  $count = 0;
  $query = "UPDATE classregistration
            SET  register = true
            WHERE ID = :regid";
  $statement = $db->prepare($query);
  $statement->bindValue(':regid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function unregister_student_to_class($id) {
  global $db;
  $count = 0;
  $query = 'UPDATE classregistration
            SET  register = false, grade = 0
            WHERE ID = :regid';
  $statement = $db->prepare($query);
  $statement->bindValue(':regid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function delete_class_registration($id){
  global $db;
  $count = 0;
  $query = 'DELETE FROM classregistration
            WHERE classId = :classid';
  $statement = $db->prepare($query);
  $statement->bindValue(':classid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}

function delete_class($id){
  global $db;
  $count = 0;
  $query = 'DELETE FROM class
            WHERE ID = :classid';
  $statement = $db->prepare($query);
  $statement->bindValue(':classid', $id);
  if ($statement->execute()) {
    $count = $statement->rowCount();
  };
  $statement->closeCursor();
  return $count;
}