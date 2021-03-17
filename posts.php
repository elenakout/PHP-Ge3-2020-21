<?php
  require('./model/database.php');
  require('./model/post_db.php');

  $results = get_posts();

  include('./view/all_posts.php');
  // TODO if else statement if not posts show error page