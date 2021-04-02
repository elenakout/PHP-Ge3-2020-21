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
      <a href="./dashboard_admin.php?page=classes" class="post__title">Classes</a>
    </aside>
    <div class="admin_main">
      <form name="register" action="./admin_classes.php" method="post" class="form" onsubmit="return validateForm()">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="classId" value="<?= $class['ID'] ?>">

        <input type="text" name="title" placeholder="Τίτλος" value="<?= $class['title'] ?>">

        <textarea id="description" name="description" rows="7" cols="80" class="form_input" placeholder="Περιγραφή Μαθήματος"> <?= $class['description'] ?></textarea>

        <input type="text" name="points" placeholder="Διαδακτικές Μονάδες" value="<?= $class['points'] ?>">
        <p class="error_regnum">Παρακαλώ πληκρολογήστε διδακτικές μονάδες</p>

        <label for="mandatory">Βασικό</label>
        <input type="checkbox" id="mandatory" name="mandatory" value=true <?php if ($class['mandatory']) {echo ("checked");} ?>>

        <select name="teacher" id="teacher" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε καθηγητή</option>
          <?php foreach ($teachers as $teacher) { ?>
            <option value="<?= $teacher['ID'] ?>" <?php if ($class['teacherId'] == $teacher['ID']) {echo ("selected");} ?>><?= $teacher['lastName'] ?> <?= $teacher['name'] ?></option>
          <?php } ?>
        </select>

        <select name="semester" id="semester" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε εξάμηνο</option>
          <option value="1" <?php if ($class['classSemester'] == '1') {
                              echo ("selected");
                            } ?>>1</option>
          <option value="2" <?php if ($class['classSemester'] == '2') {
                              echo ("selected");
                            } ?>>2</option>
          <option value="3" <?php if ($class['classSemester'] == '3') {
                              echo ("selected");
                            } ?>>3</option>
        </select>
        <input type="submit" value="υποβολη" class="btn" />
      </form>
    </div>
  </section>
</main>

<?php
include('./view/footer.php');
?>