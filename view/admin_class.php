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
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link">
        <img src="./assets/icons/teacher-ico.svg" alt="avatar icon">
        Καθηγητές
      </a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link">
        <img src="./assets/icons/admin-ico.svg" alt="avatar icon">
        Γραμματεία
      </a>
        <a href="./dashboard_admin.php?page=classes" class="dashboard__link ">
        <img src="./assets/icons/book-ico.svg" alt="avatar icon">
      Μαθήματα
      </a>
    </aside>
    <div class="dashboard__form">
      <form name="class" action="./admin_classes.php" method="post" class="form"
        onsubmit="return validateClassForm()">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="classId" value="<?= $class['ID'] ?>">

        <input type="text" name="title" placeholder="Τίτλος" value="<?= $class['title'] ?>"
          class="form_input">
        <p class="error_title">Παρακαλώ πληκρολογήστε τίτλο</p>

        <textarea id="description" name="description" rows="8" cols="80"
          class="form_input form__textearea" placeholder="Περιγραφή Μαθήματος"> <?= $class['description'] ?></textarea class="form_input">
          <p class="error_desc">Παρακαλώ πληκρολογήστε περιγραφή του μαθήματος</p>

        <label for="mandatory" class=" checkbox__label">Βασικό</label>
        <input type="checkbox" id="mandatory" name="mandatory" value=1
          <?php if ($class['mandatory']) {echo ("checked");} ?> >

        <select name="teacher" id="teacher" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε καθηγητή</option>
          <?php foreach ($teachers as $teacher) { ?>
          <option value="<?= $teacher['ID'] ?>"
            <?php if ($class['teacherId'] == $teacher['ID']) {echo ("selected");} ?>>
            <?= $teacher['lastName'] ?> <?= $teacher['name'] ?></option>
          <?php } ?>
        </select>
        <p class="error_teacher">Παρακαλώ επιλέξτε καθηγητή</p>

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
        <p class="error_semester">Παρακαλώ επιλέξτε εξάμηνο φοίτησης</p>
        <input type="submit" value="επεξεργασια" class="btn btn-dark" />
      </form>
      <form class="form" action="./admin_classes.php" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="classId" value="<?= $class['ID'] ?>">
        <input type="submit" value="διαγραφη" class="btn btn-outline-red" />
        <p class="help">Προσοχή η ενέργεια αυτή είναι μη αναστρέψιμη.</p>
      </form>
    </div>
  </section>
</main>

<?php
include('./view/footer.php');
?>