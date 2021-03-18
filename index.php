<?php
  require('./model/database.php');
  require('./model/post_db.php');

  $results = get_limit_posts();
  $page = 'home';

  include('./view/home_posts.php');
  // TODO if else statement if not posts show error page