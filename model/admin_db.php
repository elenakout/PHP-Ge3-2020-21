<?php

function get_all_admins() {
  global $db;
  $query = 'SELECT *
            FROM user
            WHERE role = "admin"';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}