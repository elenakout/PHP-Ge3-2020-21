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
      <a href="./dashboard_student.php?action=profile">Επεξεργασία προφίλ</a>
      <a href="./dashboard_student.php">Μαθήματα</a>
    </aside>
    <section class="admin_main">
      <div>
        <h2>Statistics</h2>
        <p>Semester: <?= $stusemester['semesterNum'] ?> Βασικά μαθήματα με προβιβάσιμο βαθμό:
          <?= $manPass ?></p>
        <p>Βασικά μαθήματα για πτυχίο: <?= $manRem ?> Μαθήματα που έχουν δηλωθεί:
          <?= $registerClasses ?> Μαθήματα Επιλογής με προβιβάσιμο βαθμό: <?= $nomanPass ?></p>
        <p>Μαθήματα επιλογής για πτυχίο: <?= $nomanRem ?> Διδακτικές Μονάδες: <?= $points ?>
          Διδακτικές μονάδες για πτυχίο: <?= $pointsRem  ?> </p>
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
            $regid = $value['regId'];
            $title = $value['title'];
            $points = $value['points'];
            $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
            $semester = $value['classSemester'];
            $name = $value['name'];
            $lastname = $value['lastName'];
            $grade = $value['grade'];
            $register = $value['register'];
            $passed = $grade >= 5;
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
                  if(!$register){ ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="εγγραφη" class="btn btn-dark" />
              </form>
              <?php  } else { ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="unregister">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="καταργηση εγγραφης" class="btn btn-dark" />
              </form>
              <?php } ?>
            </td>
            <?php } ?>
          </tr>
          <?php } ?>

          <!-- Μθήματα Εξάμηνο 2 -->
          <?php foreach ($semester2 as $index => $value){
            $regid = $value['regId'];
            $title = $value['title'];
            $points = $value['points'];
            $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
            $semester = $value['classSemester'];
            $name = $value['name'];
            $lastname = $value['lastName'];
            $grade = $value['grade'];
            $register = $value['register'];
            $active = (int)$stusemester['semesterNum'] < (int)$semester;
            $passed = $grade >= 5;
          ?>
          <tr
            <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
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
                    if(!$register){ ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="εγγραφη" class="btn" />
              </form>
              <?php  } else { ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="unregister">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="καταργηση εγγραφης" class="btn" />
              </form>
              <?php } ?>
            </td>
            <?php } ?>
          </tr>
          <?php } ?>

          <!-- Μθήματα Εξάμηνο 3 -->
          <?php foreach ($semester3 as $index => $value){
            $regid = $value['regId'];
            $title = $value['title'];
            $points = $value['points'];
            $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
            $semester = $value['classSemester'];
            $name = $value['name'];
            $lastname = $value['lastName'];
            $grade = $value['grade'];
            $register = $value['register'];
            $active = (int)$stusemester['semesterNum'] < (int)$semester;
            $passed = $grade >= 5;
          ?>
          <tr
            <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
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
                    if(!$register){ ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="εγγραφη" class="btn" />
              </form>
              <?php  } else { ?>
              <form name="register" action="./dashboard_student.php" method="post" class="form">
                <input type="hidden" name="action" value="unregister">
                <input type="hidden" name="regId" value="<?= $regid ?>">
                <input type="submit" value="καταργηση εγγραφης" class="btn" />
              </form>
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