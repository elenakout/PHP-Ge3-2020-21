<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
<aside>
<a href="./dashboardAdmin.php" class="post__title">Students</a>
<a href="./dashboardAdmin.php?page=teachers" class="post__title">Teachers</a>
<a href="./dashboardAdmin.php?page=admins" class="post__title">Admins</a>
<a href="./dashboardAdmin.php?page=classes" class="post__title">Classes</a>
</aside>
<h1>Classes</h1>
<?php foreach ($semester1 as $class) {
  $id = $class['ID'];
  $title = $class['title'];
?>
  <p><?= $title ?></p>
<?php } ?>
</main>

<?php
  include('./view/footer.php');
?>