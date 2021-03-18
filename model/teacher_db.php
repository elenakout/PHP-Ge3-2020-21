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