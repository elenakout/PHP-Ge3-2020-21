<?php

  function get_posts() {
    global $db;
    $query = 'SELECT * FROM posts
              ORDER BY ID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
  }
  function get_limit_posts() {
    global $db;
    $query = 'SELECT * FROM posts
              ORDER BY ID ASC
              LIMIT 0,3';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
  }
