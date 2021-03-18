<?php
  require('./model/database.php');
  require('./model/admin_db.php');

  $results = get_all_admins();
  $title = 'Γραμματεια';

  include('./view/list_stuff.php');