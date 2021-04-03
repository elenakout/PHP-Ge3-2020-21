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
      <form name="register" action="./admin_users.php" method="post" class="form form_dashboard"
        onsubmit="return validateForm()">
        <input type="hidden" name="action" value="create">
        <input type="hidden" name="roleuser" value="<?= $roleuser ?>">

        <label for="name">Όνομα</label>
        <input type="text" name="name" placeholder="Όνομα" id="name" value="<?= $username ?>">
        <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>

        <label for="lastname">Επίθετο</label>
        <input type="text" name="lastName" id="lastname" placeholder="Επίθετο"
          value="<?= $userlastname ?>">
        <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>

        <label for="regNum">Αριθμός Μητρώου</label>
        <input type="text" name="regNum" id="regNum" placeholder="Αριθμός Μητρώου"
          value="<?= $regNum ?>">
        <p class="error_regnum">Παρακαλώ πληκρολογήστε αριθμό μητρώου</p>
        <p class="error_regnum_length">Ο αριθμός μητρώου πρέπει να έχει 6 χαρακτήρες</p>
        <p class="error_regnum_numbers">Ο αριθμός μητρώου πρέπει να είναι αριθμός</p>

        <label for="gender">Φύλλο</label>
        <select name="gender" id="gender" class="form_input">
          <option value="male" <?php if($gender == 'male'){echo("selected");}?>>Άρρεν</option>
          <option value="female" <?php if($gender == 'female'){echo("selected");}?>>Θήλυ</option>
        </select>

        <?php if($roleuser == 'student') { ?>
        <label for="semester">Εξάμηνο φοίτησης</label>
        <select name="semester" id="semester" class="form_input">
          <option value="1" <?php if($semester == '1'){echo("selected");}?>>1</option>
          <option value="2" <?php if($semester == '2'){echo("selected");}?>>2</option>
          <option value="3" <?php if($semester == '3'){echo("selected");}?>>3</option>
        </select>
        <?php } ?>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>"
          required>
        <p class="error_email">Παρακαλώ εισάγετε email</p>

        <label for="password">Κωδικός Πρόσβασης</label>
        <input type="text" name="password" id="password" placeholder="Κωδικός"
          value="<?= $password ?>">
        <p class="error_password">Παρακαλώ εισάγετε κωδικό πρόσβασης</p>
        <p class="error_length_password">Ο κωδικός πρόσβασης πρέπει να έχει τουλαχιστο 8 χαρακτήρες
        </p>

        <input type="submit" value="υποβολη" class="btn" />
        <a href="./register_user.php" class="btn">πισω</a>
      </form>
    </div>
  </section>
</main>


<?php
  include('./view/footer.php');
?>