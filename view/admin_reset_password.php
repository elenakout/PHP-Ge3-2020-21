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
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link"><img
          src="./assets/icons/teacher-ico.svg" alt="avatar icon">Καθηγητές</a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link"><img
          src="./assets/icons/admin-ico.svg" alt="avatar icon">Γραμματεία</a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link "><img
          src="./assets/icons/book-ico.svg" alt="avatar icon">Μαθήματα</a>
    </aside>
    <div class="dashboard__form">
      <form action="./reset_password.php" method="post" class="form" name="password"
        onsubmit="return validatePasswordForm()">
        <input type="hidden" name="action" value="reset">
        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
        <label for="passsword">Νέος κωδικός πρόσβασης</label>
        <input type="text" name="newPassword" value="<?= $genPassword ?>" id="password"
          class="form_input">
        <p class="error_password">Παρακαλώ πληκρολογήστε κωδικό πρόσβασης</p>
        <p class="error_length_password">Ο κωδικός θα πρέπει να είναι τουλάχιστο 8 χαρακτήρες</p>
        <input type="submit" value="αλλαγη κωδικου" class="btn btn-dark" />
        <a href="./dashboard_admin.php?page=profile&userId=<?= $user['ID'] ?> "
          class="btn btn-outline">ακυρο</a>

      </form>
    </div>
  </section>
</main>


<?php
  include('./view/footer.php');
?>