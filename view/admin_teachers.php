<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <aside>
  <a href="./dashboard_admin.php" class="post__title">Students</a>
  <a href="./dashboard_admin.php?page=teachers" class="post__title">Teachers</a>
  <a href="./dashboard_admin.php?page=admins" class="post__title">Admins</a>
  <a href="./dashboard_admin.php?page=classes" class="post__title">Classes</a>
  </aside>
  <h1>Teachers</h1>

  <?php foreach ($teachers as $teacher) {
    $id = $teacher['ID'];
    $name = $teacher['name'];
  ?>
  <p><?= $name ?></p>
  <?php } ?>
</main>

<?php
  include('./view/footer.php');
?>