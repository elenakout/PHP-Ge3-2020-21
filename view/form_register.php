<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <form name="register" action="./admin_users.php" method="post" class="form" onsubmit="return validateForm()">
    <input type="hidden" name="action" value="submit">
    <input type="hidden" name="roleuser" value="<?= $userrole ?>">
    <input type="text" name="name" placeholder="Όνομα">
    <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>
    <input type="text" name="lastName" placeholder="Επίθετο">
    <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>
    <input type="text" name="regNum" placeholder="Αριθμός Μητρώου">
    <p class="error_regnum">Παρακαλώ πληκρολογήστε αριθμό μητρώου</p>
    <select name="gender" id="gender" class="form_input">
      <option value="" disabled selected hidden>Παρακαλώ επιλέξτε φύλο</option>
      <option value="male">Άρρεν</option>
      <option value="female">Θήλυ</option>
    </select>
    <p class="error_gender">Παρακαλώ εισάγετε φύλο</p>
    <?php if($userrole == 'student') { ?>
    <select name="semester" id="semester" class="form_input">
      <option value="" disabled selected hidden>Παρακαλώ επιλέξτε εξάμηνο φοίτησης</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  <?php } ?>
    <input type="submit" value="υποβολη" class="btn"/>
  </form>
</main>

<?php
  include('./view/footer.php');
?>