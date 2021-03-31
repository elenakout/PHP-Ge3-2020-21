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
          $grade = $value['grade'];
          $state = $value['state'];
          $passed = $value['grade'] > 5;
          ?>
            <tr <?php if($passed){ echo "class='passed'"; }?>>
              <?php if($index === 0) { ?>
                <td class="white" rowspan="<?= count($semester1)?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="width-5"><?= $mandarory ?></td>
              <td class="width-5"><?php echo($grade > 0 ? $grade : '-') ?></td>
              <?php if($passed) { ?>
                <td class="width-10"></td>
              <?php } else { ?>
              <td class="width-5">
                <?php
                  if($state === 'unregistered'){ ?>
                    <a href="./dashboard_student.php?action=register&studentId=<?= $userId ?>&classId=<?= $id ?>">Εγγραφή</a>
                <?php  } else { ?>
                    <a href="./dashboard_student.php">Κατάργηση εγγραφής</a>
                <?php } ?>
              </td>
              <?php } ?>
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
          $active = (int)$stusemester['semesterNum'] < (int)$semester;
          $passed = $value['grade'] > 5;
          ?>
            <tr <?php if($active){ echo "class='disabled'"; } ?>>
              <?php if($index === 0) { ?>
                <td rowspan="<?= count($semester2)?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="width-5"><?= $mandarory ?></td>
              <td class="width-5"><?php echo($grade > 0 ? $grade : '-') ?></td>
              <?php if($passed || $active) { ?>
                <td class="width-10"></td>
              <?php } else { ?>
                <td class="width-5">
                  <?php
                    if($state === 'unregistered'){ ?>
                      <a href="./dashboard_student.php">Εγγραφή</a>
                  <?php  } else if($state === 'unregistered') { ?>
                      <a href="./dashboard_student.php">Κατάργηση εγγραφής</a>
                  <?php } ?>
                </td>
              <?php } ?>
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
          $active = (int)$stusemester['semesterNum'] < (int)$semester;
          $passed = $value['grade'] > 5;
          ?>
            <tr <?php if($active){ echo "class='disabled'"; } ?>>
              <?php if($index === 0) { ?>
                <td rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
              <?php } ?>
              <td class="left"><?= $title ?></td>
              <td class="left"><?= $name ?> <?= $lastname ?></td>
              <td class="width-5"><?= $points ?></td>
              <td class="width-5"><?= $mandarory ?></td>
              <td class=" width-5"><?php echo($grade > 0 ? $grade : '-') ?></td>
              <?php if($passed || $active) { ?>
                <td class="width-10"></td>
              <?php } else { ?>
                <td class="width-5">
                  <?php
                    if($state === 'unregistered'){ ?>
                      <a href="./dashboard_student.php">Εγγραφή</a>
                  <?php  } else if($state === 'unregistered') { ?>
                      <a href="./dashboard_student.php">Κατάργηση εγγραφής</a>
                  <?php } ?>
                </td>
              <?php } ?>
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