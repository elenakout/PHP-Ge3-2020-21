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