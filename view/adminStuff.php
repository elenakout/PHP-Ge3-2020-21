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
<h1>Admins</h1>
</main>

<?php
  include('./view/footer.php');
?>