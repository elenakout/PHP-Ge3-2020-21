<?php

  function get_posts() {
    global $db;
    $query = 'SELECT * FROM post
              ORDER BY ID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
  }

  function get_limit_posts() {
    global $db;
    $query = 'SELECT * FROM post
              ORDER BY ID ASC
              LIMIT 0,3';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
  }

  function get_single_post($id) {
    global $db;
    $query = 'SELECT * FROM post
              WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
  }
