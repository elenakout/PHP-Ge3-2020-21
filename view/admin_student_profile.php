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
      <form name="update" action="./admin_users.php" method="post" class="form">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="roleuser" value="<?= $user['role'] ?>">
        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
        <input type="text" name="name" placeholder="Όνομα" value="<?= $user['name'] ?>">
        <input type="text" name="lastName" placeholder="Επίθετο" value="<?= $user['lastName'] ?>">
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου" value="<?= $user['regNum'] ?>">
        <select name="gender" id="gender" class="form_input">
          <option value="male" <?php if ($user['gender'] == 'male') {
                                  echo ("selected");
                                } ?>>Άρρεν</option>
          <option value="female" <?php if ($user['gender'] == 'female') {
                                    echo ("selected");
                                  } ?>>Θήλυ</option>
        </select>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Όνομα" value="<?= $user['email'] ?>">
        <input type="submit" value="υποβολη" class="btn" />
        <a href="./reset_password.php?userId=<?= $user['ID'] ?>" class="btn">επαναφορα κωδικού προσβασης</a>
      </form>
      <div>
        <p>Phone: <?= $user['phone'] ?></p>
        <p>Birthday: <?= $user['birthday'] ?></p>
        <p>Street: <?= $address['street'] ?> <?= $address['strnum']?></p>
        <p>Postalcode: <?= $address['postalCode'] ?> City: <?= $address['city']?></p>
      </div>
      <div>
      <div>
      <h2>Statistics</h2>
      <p>Semester: <?= $stusemester['semesterNum'] ?> Βασικά μαθήματα με προβιβάσιμο βαθμό: <?= $manPass ?></p>
      <p>Βασικά μαθήματα για πτυχίο: <?= $manRem ?> Μαθήματα που έχουν δηλωθεί: <?= $registerClasses ?> Μαθήματα Επιλογής με προβιβάσιμο βαθμό: <?= $nomanPass ?></p>
      <p>Μαθήματα επιλογής για πτυχίο: <?= $nomanRem ?> Διδακτικές Μονάδες: <?= $points ?> Διδακτικές μονάδες για πτυχίο: <?= $pointsRem  ?> </p>
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
                    Μη Εγγραμμένος
                <?php  } else { ?>
                    Εγγεγραμμενος
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
            <tr <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
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
                    Μη Εγγραμμένος
                <?php  } else { ?>
                    Εγγεγραμμενος
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
            <tr <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
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
                    Μη Εγγραμμένος
                <?php  } else { ?>
                    Εγγεγραμμενος
                <?php } ?>
                </td>
              <?php } ?>
            </tr>
          <?php } ?>

        </tbody>
      </table>
      </div>
    </div>

  </section>
</main>

<?php
include('./view/footer.php');
?>