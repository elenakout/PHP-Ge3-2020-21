<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section class="dashboard">
    <aside class="dashboard__aside">
      <img src="./assets/images/<?= $avatar ?>" alt="<?= $lastname ?>" />
      <div class="aside__info">
        <p><?= $lastname ?></p>
        <p><?= $name ?></p>
        <?php if($role === 'admin') { ?>
        <p><span>Γραμματεία</span></p>
        <?php }else { ?>
        <p><?= $role === 'teacher' ? 'Καθηγητής' : 'Μαθητης' ?> </p>
        <?php } ?>
      </div>
      <a href="./dashboard_admin.php" class="dashboard__link link__active"><img
          src="./assets/icons/user-avatar-filled-alt.svg" alt="avatar icon"> Μαθητές</a>
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link"><img
          src="./assets/icons/teacher-ico.svg" alt="avatar icon">Καθηγητές</a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link"><img
          src="./assets/icons/admin-ico.svg" alt="avatar icon">Γραμματεία</a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link"><img
          src="./assets/icons/book-ico.svg" alt="avatar icon">Μαθήματα</a>
      <a href="./admin_users.php?role=student" class="dashboard__link link__active"><img
          src="./assets/icons/insert-alt.svg" alt="avatar icon">Εγγραφή
        Φοιτητή</a>
    </aside>
    <div class="dashboard__main">
      <table class="dashboard__table">
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
          <!-- Φοιτητές εξάμηνο 1 -->
          <?php foreach ($stdSem1 as $index => $value){
            $id = $value['ID'];
            $name = $value['name'];
            $lastName = $value['lastName'];
            $email = $value['email'];
            $phone = $value['phone'];
            $regnum = $value['regNum'];
            $avatar = $value['avatar'];
            $semesterNum = $value['semesterNum'];
            ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($stdSem1)?>" class="width-5"><?= $semesterNum ?></td>
            <?php } ?>
            <td class="left">
              <a href="./dashboard_admin.php?page=student_profile&userId=<?= $id ?>">
                <?= $lastName ?> <?= $name ?>
              </a>
            </td>
            <td class="left"><?= $email ?></td>
            <td><?= $phone ?></td>
            <td><?= $regnum ?></td>
          </tr>
          <?php } ?>

          <!-- Φοιτητές εξάμηνο 2 -->
          <?php foreach ($stdSem2 as $index => $value){
          $id = $value['ID'];
          $name = $value['name'];
          $lastName = $value['lastName'];
          $email = $value['email'];
          $phone = $value['phone'];
          $regnum = $value['regNum'];
          $avatar = $value['avatar'];
          $semesterNum = $value['semesterNum'];
        ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($stdSem2)?>" class="width-5"><?= $semesterNum ?></td>
            <?php } ?>
            <td class="left">
              <a href="./dashboard_admin.php?page=student_profile&userId=<?= $id ?>">
                <?= $lastName ?> <?= $name ?>
              </a>
            </td>
            <td class="left"><?= $email ?></td>
            <td><?= $phone ?></td>
            <td><?= $regnum ?></td>
          </tr>
          <?php } ?>

          <!-- Φοιτητές εξάμηνο 3 -->
          <?php foreach ($stdSem3 as $index => $value){
          $id = $value['ID'];
          $name = $value['name'];
          $lastName = $value['lastName'];
          $email = $value['email'];
          $phone = $value['phone'];
          $regnum = $value['regNum'];
          $avatar = $value['avatar'];
          $semesterNum = $value['semesterNum'];
        ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($stdSem3)?>" class="width-5"><?= $semesterNum ?></td>
            <?php } ?>
            <td class="left">
              <a href="./dashboard_admin.php?page=student_profile&userId=<?= $id ?>">
                <?= $lastName ?> <?= $name ?>
              </a>
            </td>
            <td class="left"><?= $email ?></td>
            <td><?= $phone ?></td>
            <td><?= $regnum ?></td>
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