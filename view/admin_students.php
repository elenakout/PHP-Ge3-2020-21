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
    <a href="./register_user.php" class="btn">Εγγραφή Φοιτητή</a>
  <table class="table_students">
      <thead>
        <tr>
          <th>Εξάμηνο</th>
          <th>Ονοματεπώνυμο</th>
          <th>email</th>
          <th>Τηλέφωνο</th>
          <th>Αριθμός μητρώου</th>

        </tr>
      </thead>
      <tbody>
      <!-- Μθήματα Εξάμηνο 1 -->
        <?php foreach ($students as $index => $value){
          $id = $value['ID'];
          $name = $value['name'];
          $lastName = $value['lastName'];
          $email = $value['email'];
          $phone = $value['phone'];
          $regnum = $value['regNum'];
          $avatar = $value['avatar'];
        ?>
        <tr>
          <!-- <?php if($index === 0) { ?> -->
          <td rowspan="1">1</td>
          <!-- <?php } ?> -->
          <td class="left">
            <a href="./post.php?id=<?= $id ?>" >
              <?= $name ?> <?= $lastName ?>
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