<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
<p>Mandatory: <?= $mandatory ?></p>
  <form name="register" action="./admin_classes.php" method="post" class="form" onsubmit="return validateForm()">
    <input type="hidden" name="action" value="create">

    <input type="text" name="title" placeholder="Τίτλος">

    <textarea id="description" name="description" rows="4" cols="80" class="form_input" placeholder="Περιγραφή Μαθήματος"></textarea>

    <input type="text" name="points" placeholder="Διαδακτικές Μονάδες">
    <p class="error_regnum">Παρακαλώ πληκρολογήστε διδακτικές μονάδες</p>

    <label for="mandatory">Βασικό</label>
    <input type="checkbox" id="mandatory" name="mandatory" value=true>

    <select name="teacher" id="teacher" class="form_input">
      <option value="" disabled selected hidden>Παρακαλώ επιλέξτε καθηγητή</option>
      <?php foreach ($teachers as $teacher) { ?>
        <option value="<?= $teacher['ID'] ?>"><?= $teacher['lastName'] ?> <?= $teacher['name'] ?></option>
      <?php } ?>
    </select>

    <select name="semester" id="semester" class="form_input">
      <option value="" disabled selected hidden>Παρακαλώ επιλέξτε εξάμηνο</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <input type="submit" value="υποβολη" class="btn" />
  </form>
</main>

<?php
include('./view/footer.php');
?>