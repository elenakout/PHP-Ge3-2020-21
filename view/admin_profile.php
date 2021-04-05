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
      <form name="update" action="./admin_users.php" method="post" class="form"
        onsubmit="return validateUserForm()">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="roleuser" value="<?= $user['role'] ?>">
        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
        <input type="text" name="name" placeholder="Όνομα" value="<?= $user['name'] ?>"
          class="form_input">
        <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>

        <input type="text" name="lastName" placeholder="Επίθετο" value="<?= $user['lastName'] ?>"
          class="form_input">
        <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου"
          value="<?= $user['regNum'] ?>" class="form_input">
        <p class="error_regnum">Παρακαλώ πληκρολογήστε αριθμό μητρώου</p>
        <p class="error_regnum_length">Ο αριθμός μητρώου πρέπει να έχει 6 χαρακτήρες</p>
        <p class="error_regnum_numbers">Ο αριθμός μητρώου πρέπει να είναι αριθμός</p>
        <select name="gender" id="gender" class="form_input">
          <option value="male" <?php if ($user['gender'] == 'male') {
                                  echo ("selected");
                                } ?>>Άρρεν</option>
          <option value="female" <?php if ($user['gender'] == 'female') {
                                    echo ("selected");
                                  } ?>>Θήλυ</option>
        </select>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email" value="<?= $user['email'] ?>"
          class="form_input">
        <p class="error_email">Παρακαλώ εισάγετε email</p>
        <input type="submit" value="επεξεργασια" class="btn btn-dark" />
        <a href="./reset_password.php?userId=<?= $user['ID'] ?>" class="btn btn-dark">επαναφορα
          κωδικου
          προσβασης</a>
      </form>
    </div>

  </section>
</main>

<?php
include('./view/footer.php');
?>