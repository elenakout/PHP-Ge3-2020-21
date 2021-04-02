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
      <a href="./admin_classes.php" class="btn">Δημιουργία Μαθήματος</a>
      <table class="table_students">
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
                <td rowspan="<?= count($semester1)?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><a href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
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
                <td rowspan="<?= count($semester2)?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><a href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
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
                <td rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><a href="./dashboard_admin.php?page=class&classId=<?= $id ?>"><?= $title ?></a></td>
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