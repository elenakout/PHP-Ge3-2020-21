<?php

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
