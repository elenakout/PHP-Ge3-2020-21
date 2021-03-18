<?php
  require('./model/database.php');
  require('./model/teacher_db.php');

  $results = get_all_teachers();
  $title = 'Διδασκοντες';

  include('./view/list_stuff.php');