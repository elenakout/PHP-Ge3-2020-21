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
      <a href="./dashboard_admin.php" class="dashboard__link "><img
          src="./assets/icons/user-avatar-filled.svg" alt="avatar icon"> Μαθητές</a>
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link "><img
          src="./assets/icons/teacher-ico.svg" alt="avatar icon">Καθηγητές</a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link link__active"><img
          src="./assets/icons/admin-ico-alt.svg" alt="avatar icon">Γραμματεία</a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link "><img
          src="./assets/icons/book-ico.svg" alt="avatar icon">Μαθήματα</a>
      <a href="./admin_users.php?role=admin" class="dashboard__link link__active "><img
          src="./assets/icons/insert-alt.svg" alt="avatar icon">Εγγραφή
        Γραμματείας</a>
    </aside>
    <div class="dashboard__main">
      <table class="tdashboard__table">
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
              <span class="center">
                <img class="header__image" src="./assets/images/<?= $avatar ?>" alt="<?= $lastName ?>" />
                <a href="./dashboard_admin.php?page=student_profile&userId=<?= $id ?>">
                  <?= $lastName ?> <?= $name ?>
                </a>
              </span>
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