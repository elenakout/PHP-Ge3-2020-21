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
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link link__active"><img
          src="./assets/icons/book-ico-alt.svg" alt="avatar icon">Μαθήματα</a>
      <a href="./admin_classes.php" class="dashboard__link link__active"><img
          src="./assets/icons/insert-alt.svg" alt="avatar icon">Δημιουργία Μαθήματος</a>
    </aside>
    <div class="dashboard__form">
      <form name="register" action="./admin_users.php" method="post" class="form"
        onsubmit="return validateForm()">
        <input type="hidden" name="action" value="submit">
        <input type="hidden" name="roleuser" value="<?= $roleuser ?>">
        <input type="text" name="name" placeholder="Όνομα">
        <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>
        <input type="text" name="lastName" placeholder="Επίθετο">
        <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου">
        <p class="error_regnum">Παρακαλώ πληκρολογήστε αριθμό μητρώου</p>
        <p class="error_regnum_length">Ο αριθμός μητρώου πρέπει να έχει 6 χαρακτήρες</p>
        <p class="error_regnum_numbers">Ο αριθμός μητρώου πρέπει να είναι αριθμός</p>
        <select name="gender" id="gender" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε φύλο</option>
          <option value="male">Άρρεν</option>
          <option value="female">Θήλυ</option>
        </select>
        <p class="error_gender">Παρακαλώ εισάγετε φύλο</p>
        <?php if($roleuser === 'student') { ?>
        <select name="semester" id="semester" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε εξάμηνο φοίτησης</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
        <p class="error_semester">Παρακαλώ εισάγετε εξάμηνο φοίτησης</p>
        <?php } ?>
        <input type="submit" value="δημιουργια" class="btn" />
      </form>
    </div>
  </section>
</main>

<?php
  include('./view/footer.php');
?>