<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
  <section class="admin_students">
    <aside class="admin_aside">
      <p>avatar <?= $avatar ?> </p>
      <p>userid <?= $userId ?> </p>
      <p>name <?= $lastname ?> <?= $name ?> </p>
      <a href="./dashboard_teacher.php?action=profile">Επεξεργασία προφίλ</a>
      <a href="./dashboard_teacher.php">Μαθητές</a>
    </aside>
    <section class="admin_main">
    <?php foreach($classes as $class) { ?>
      <h2><?= $class['title']?> <?= $class['classSemester']?></h2>
      <?php foreach($students as $student) {
        $regId = $student['regId'];
        $grade = $student['grade'];
        $stdname = $student['name'];
        $stdlastname = $student['lastName'];
        $stdregNum = $student['regNum'];
        $stdavatar = $student['avatar'];
        $classId = $student['classId'];
        $classTitle = $student['title'];
        $classSemester = $student['classSemester'];
      ?>
      <?php if($class['ID'] === $classId) { ?>
      <p><?= $stdname ?></p>
      <p><?= $stdlastname ?></p>
      <p>Grade: <?= $grade ?></p>
      <form name="register" action="./dashboard_teacher.php" method="post" class="form">
      <input type="hidden" name="action" value="submit_grade">
      <input type="hidden" name="regId" value="<?= $regId ?>">
      <select name="grade" id="grade" class="form_input">
        <option value="" disabled selected hidden>Βαθμός μαθητή</option>
        <option value="1" <?php if ($grade == 1) {echo ("selected");} ?>>1</option>
        <option value="2" <?php if ($grade == 2) {echo ("selected");} ?>>2</option>
        <option value="3" <?php if ($grade == 3) {echo ("selected");} ?>>3</option>
        <option value="4" <?php if ($grade == 4) {echo ("selected");} ?>>4</option>
        <option value="5" <?php if ($grade == 5) {echo ("selected");} ?>>5</option>
        <option value="6" <?php if ($grade == 6) {echo ("selected");} ?>>6</option>
        <option value="7" <?php if ($grade == 7) {echo ("selected");} ?>>7</option>
        <option value="8" <?php if ($grade == 8) {echo ("selected");} ?>>8</option>
        <option value="9" <?php if ($grade == 9) {echo ("selected");} ?>>9</option>
        <option value="10" <?php if ($grade == 10) {echo ("selected");} ?>>10</option>
      </select>
      <input type="submit" value="Εισαγωγή Βαθμού"/>
      </form>

      <p><?= $stdregNum ?></p>
      <p><?= $stdavatar ?></p>
      <?php } ?>
      <?php } ?>
        <?php } ?>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>