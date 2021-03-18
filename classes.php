<?php
  require('./model/database.php');
  require('./model/class_db.php');


  $semester1 = get_classes_by_semester(1);
  $semester2 = get_classes_by_semester(2);
  $semester3 = get_classes_by_semester(3);

  include('./view/table_classes.php');
