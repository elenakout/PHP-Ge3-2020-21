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
      <p>Επεξεργασία προφίλ</p>
    </aside>
    <section class="admin_main">
      <div>
      <h2>Statistics</h2>
      <p>Semester: <?= $stusemester['semesterNum'] ?></p>

      </div>
      <table class="table_students">
        <thead>
          <tr>
            <th>Εξάμηνο</th>
            <th>Μάθημα</th>
            <th>Διδάσκων</th>
            <th>Διδακτικές Μονάδες</th>
            <th>Είδος</th>
            <th>Βαθμος</th>
            <th>Εγγραφή</th>
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
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="left width-10"><?= $mandarory ?></td>
              <td class="left width-10">0</td>
              <td class="left width-10">Εγγραφή</td>
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
            <tr <?php if((int)$stusemester['semesterNum'] < (int)$semester ){ echo "class='disabled'"; } ?>>
              <?php if($index === 0) { ?>
                <td rowspan="<?= count($semester2)?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="left width-10"><?= $mandarory ?></td>
              <td class="left width-10">0</td>
              <td class="left width-10">Εγγραφή</td>
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
            <tr <?php if((int)$stusemester['semesterNum'] < (int)$semester ){ echo "class='disabled'"; } ?>>
              <?php if($index === 0) { ?>
                <td rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="left width-10"><?= $mandarory ?></td>
              <td class="left width-10">0</td>
              <td class="left width-10">Εγγραφή</td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>