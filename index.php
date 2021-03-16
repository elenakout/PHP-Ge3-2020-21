<?php
  require('./model/database.php');
  require('./model/post_db.php');

  $results = get_limit_posts();



  include('./view/home_posts.php');