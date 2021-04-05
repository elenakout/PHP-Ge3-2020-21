<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
  <?php if(isset($_SESSION['msg'])){ ?>
    <h2 class="success"><?= $_SESSION['msg'] ?></h2>
  <?php unset($_SESSION['msg']); } ?>
  <section class="dashboard">
    <aside class="dashboard__aside">
      <img src="./assets/images/<?= $avatar ?>" alt="<?= $lastname ?>" />
      <div class="aside__info">
        <p><?= $lastname ?></p>
        <p><?= $name ?></p>
        <?php if($role === 'admin') { ?>
        <p><span>Γραμματεία</span></p>
        <?php }else { ?>
        <p><?= $role === 'teacher' ? 'Καθηγητής' : 'Φοιτητής' ?> </p>
        <?php } ?>
      </div>
      <a href="./dashboard_teacher.php?action=profile" class="dashboard__link ">
        <img src="./assets/icons/user-avatar-filled.svg" alt="avatar icon">
        Προφίλ
      </a>

      <a href="./dashboard_teacher.php" class="dashboard__link link__active ">
        <img src="./assets/icons/book-ico-alt.svg" alt="avatar icon">
        Μαθήματα
      </a>
    </aside>
    <section class="dashboard__main">
      <?php foreach($classes as $class) { ?>
      <div class="class__container">
        <h2 class="subtitle">Εξάμηνο <?= $class['classSemester']?> -- <?= $class['title']?> </h2>

        <table class="table__dashboard">
          <thead>
            <tr>
              <th>Ονοματεπώνυμο</th>
              <th>Email</th>
              <th>Αριθμός Μητρώου</th>
              <th>Βαθμός</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($students as $student) {
              $regId = $student['regId'];
              $stdId = $student['stdId'];
              $grade = $student['grade'];
              $stdemail = $student['email'];
              $stdname = $student['name'];
              $stdlastname = $student['lastName'];
              $stdregNum = $student['regNum'];
              $stdavatar = $student['avatar'];
              $classId = $student['classId'];
              $classTitle = $student['title'];
              $classSemester = $student['classSemester'];
            ?>
            <?php if($class['ID'] === $classId) { ?>
            <tr>
              <td class="left width-10">
                <span class="center">
                  <img class="header__image" src="./assets/images/<?= $stdavatar ?>" alt="<?= $stdlastname ?>" />
                  <?= $stdlastname ?> <?=$stdname ?>
                </span>
              </td>
              <td class="left width-10"><?= $stdemail ?></td>
              <td class="width-10"><?= $stdregNum ?></td>
              <td class="width-5">
                <form name="register" action="./dashboard_teacher.php" method="post">
                  <input type="hidden" name="action" value="submit_grade">
                  <input type="hidden" name="regId" value="<?= $regId ?>">
                  <input type="hidden" name="stdId" value="<?= $stdId ?>">
                  <select name="grade" id="grade" class="form_input">
                    <option value="" disabled selected hidden>Βαθμός μαθητή</option>
                    <option value="0" <?php if ($grade == 0) {echo ("selected");} ?>>-</option>
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
                  <input type="submit" value="εισαγωγη" class="btn btn-light exit" />
                </form>
              </td>
            </tr>
            <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <?php } ?>

    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>