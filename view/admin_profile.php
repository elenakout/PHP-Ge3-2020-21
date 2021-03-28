<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section class="admin_students">
    <aside class="admin_aside">
      <a href="./dashboard_admin.php" class="post__title">Students</a>
      <a href="./dashboard_admin.php?page=teachers" class="post__title">Teachers</a>
      <a href="./dashboard_admin.php?page=admins" class="post__title">Admins</a>
      <a href="./dashboard_dmin.php?page=classes" class="post__title">Classes</a>
    </aside>
    <div class="admin_main">

    <a href="./register_user.php?role=admin" class="btn">Εγγραφή Γραμματείας</a>
    <h1><?= $user['name'] ?> <?= $user['lastName'] ?></h1>

    </div>

  </section>
</main>

<?php
  include('./view/footer.php');
?>