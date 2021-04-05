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
    <div class="dashboard__main">
      <table class="dashboard__table">
        <thead>
          <tr>
            <th>Εξάμηνο</th>
            <th>Μάθημα</th>
            <th>Διδάσκων</th>
            <th>Διδακτικές Μονάδες</th>
            <th>Είδος</th>
          </tr>
        </thead>
        <tbody>
          <!-- Μθήματα Εξάμηνο 1 -->
          <?php foreach ($semester1 as $index => $value){
          $id = $value['ID'];
          $title = $value['title'];
          $points = $value['points'];
          $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
          $semester = $value['classSemester'];
          $name = $value['name'];
          $lastname = $value['lastName'];
          ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($semester1)?>" class="width-5"><?= $semester ?></td>
            <?php } ?>
            <td class="left"><a
                href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
            <td class="left"><?= $name ?> <?= $lastname ?></td>
            <td class="width-5"><?= $points ?></td>
            <td class="left width-10"><?= $mandarory ?></td>
          </tr>
          <?php } ?>

          <!-- Μθήματα Εξάμηνο 2 -->
          <?php foreach ($semester2 as $index => $value){
          $id = $value['ID'];
          $title = $value['title'];
          $points = $value['points'];
          $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
          $semester = $value['classSemester'];
          $name = $value['name'];
          $lastname = $value['lastName'];
          ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($semester2)?>" class="width-5"><?= $semester ?></td>
            <?php } ?>
            <td class="left"><a
                href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
            <td class="left"><?= $name ?> <?= $lastname ?></td>
            <td class="width-5"><?= $points ?></td>
            <td class="left width-10"><?= $mandarory ?></td>
          </tr>
          <?php } ?>

          <!-- Μθήματα Εξάμηνο 3 -->
          <?php foreach ($semester3 as $index => $value){
          $id = $value['ID'];
          $title = $value['title'];
          $points = $value['points'];
          $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
          $semester = $value['classSemester'];
          $name = $value['name'];
          $lastname = $value['lastName'];
          ?>
          <tr>
            <?php if($index === 0) { ?>
            <td rowspan="<?= count($semester3) ?>" class="width-5"><?= $semester ?></td>
            <?php } ?>
            <td class="left"><a
                href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
            <td class="left"><?= $name ?> <?= $lastname ?></td>
            <td class="width-5"><?= $points ?></td>
            <td class="left width-10"><?= $mandarory ?></td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </section>
</main>

<?php
  include('./view/footer.php');
?>