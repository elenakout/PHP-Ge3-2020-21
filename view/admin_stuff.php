<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section class="admin_students">
    <aside class="admin_aside">
      <a href="./dashboard_admin.php" class="post__title">Students</a>
      <a href="./dashboard_admin.php?page=teacher" class="post__title">Teachers</a>
      <a href="./dashboard_admin.php?page=admin" class="post__title">Admins</a>
      <a href="./dashboard_dmin.php?page=classes" class="post__title">Classes</a>
    </aside>
    <div class="admin_main">
    <a href="./admin_users.php?role=admin" class="btn">Εγγραφή Γραμματείας</a>
  <table class="table_students">
      <thead>
        <tr>
          <th>Ονοματεπώνυμο</th>
          <th>email</th>
          <th>Τηλέφωνο</th>
          <th>Αριθμός μητρώου</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($admins as $admin){
          $id = $admin['ID'];
          $name = $admin['name'];
          $lastName = $admin['lastName'];
          $email = $admin['email'];
          $phone = $admin['phone'];
          $regnum = $admin['regNum'];
          $avatar = $admin['avatar'];
        ?>
        <tr>
          <td class="left">
            <a href="./dashboard_admin.php?page=profile&userId=<?= $id ?>">
              <?= $lastName ?> <?= $name ?>
            </a>
          </td>
          <td class="left"><?= $email ?></td>
          <td class="width-5"><?= $phone ?></td>
          <td class="left width-10"><?= $regnum ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>

  </section>
</main>

<?php
  include('./view/footer.php');
?>