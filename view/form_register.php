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
      <a href="./dashboard_admin.php?page=admin_profile" class="dashboard__link ">
        <img src="./assets/icons/user-avatar-filled.svg" alt="avatar icon">
        Προφίλ
      </a>
      <a href="./dashboard_admin.php" class="dashboard__link ">
        <img src="./assets/icons/users.svg" alt="avatar icon">
        Φοιτητές
      </a>
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link"><img
          src="./assets/icons/teacher-ico.svg" alt="avatar icon">Καθηγητές</a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link"><img
          src="./assets/icons/admin-ico.svg" alt="avatar icon">Γραμματεία</a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link "><img
          src="./assets/icons/book-ico.svg" alt="avatar icon">Μαθήματα</a>
    </aside>
    <div class="dashboard__form">
      <form name="create" action="./admin_users.php" method="POST" class="form"
        onsubmit="return validateCreateForm()">

        <input type="hidden" name="action" value="submit">
        <input type="hidden" name="roleuser" value="<?= $roleuser ?>">
        <input type="text" name="name" placeholder="Όνομα" class="form_input">
        <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>
        <input type="text" name="lastName" placeholder="Επίθετο" class="form_input">
        <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου" class="form_input">
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
        <input type="submit" value="εγγραφη" class="btn btn-dark" />
      </form>
    </div>
  </section>
</main>

<?php
  include('./view/footer.php');
?>