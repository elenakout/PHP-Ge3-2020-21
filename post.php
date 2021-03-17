<?php
  require('./model/database.php');
  require('./model/post_db.php');

  $postId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

  $results = get_single_post($postId);

  include('./view/single_post.php');
  // TODO if else statement if not posts show error page
