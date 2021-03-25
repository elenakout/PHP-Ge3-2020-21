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