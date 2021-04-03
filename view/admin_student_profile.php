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
      <a href="./dashboard_admin.php" class="dashboard__link"><img
          src="./assets/icons/user-avatar-filled.svg" alt="avatar icon"> Μαθητές</a>
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link"><img
          src="./assets/icons/teacher-ico.svg" alt="avatar icon">Καθηγητές</a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link"><img
          src="./assets/icons/admin-ico.svg" alt="avatar icon">Γραμματεία</a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link"><img
          src="./assets/icons/book-ico.svg" alt="avatar icon">Μαθήματα</a>
    </aside>
    <div class="dashboard__main dashboard_profile">
      <form name="update" action="./admin_users.php" method="post" class="form form__profile">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="roleuser" value="<?= $user['role'] ?>">
        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
        <input id="stdName" type="text" name="name" placeholder="Όνομα" value="<?= $user['name'] ?>"
          class="form_input input__student">
        <input type="text" name="lastName" placeholder="Επίθετο" value="<?= $user['lastName'] ?>"
          class="form_input input__student">
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου"
          value="<?= $user['regNum'] ?>" class="form_input input__student">
        <select name="gender" id="gender" class="form_input input__student">
          <option value="male" <?php if ($user['gender'] == 'male') {
                                  echo ("selected");
                                } ?>>Άρρεν</option>
          <option value="female" <?php if ($user['gender'] == 'female') {
                                    echo ("selected");
                                  } ?>>Θήλυ</option>
        </select>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Όνομα" value="<?= $user['email'] ?>"
          class="form_input input__student">

        <label for="phone">Τηλέφωνο</label>
        <input type="text" name="phone" id="phone" value="<?= $user['phone'] ?>"
          class="form_input input__student" disabled>

        <label for="birthday">Ημ. Γέννησης</label>
        <input type="text" id="birthday" value="<?= $user['birthday'] ?>"
          class="form_input input__student" disabled>

        <label for="street">Οδός</label>
        <input type="text" id="street" value="<?= $address['street'] ?> <?= $address['strnum']?>"
          class="form_input input__student" disabled>

        <label for="city">Πόλη</label>
        <input type="text" id="city" value="<?= $address['city'] ?> <?= $address['postalCode']?>"
          class="form_input input__student" disabled>

        <input type="submit" value="επεξεργασια" class="btn btn-small" />
        <a href="./reset_password.php?userId=<?= $user['ID'] ?>" class="btn btn-small">επαναφορα
          κωδικου</a>
      </form>
      <div>
        <div class="dashboard__main">
          <h2>Statistics</h2>
          <p>Semester: <?= $stusemester['semesterNum'] ?> Βασικά μαθήματα με προβιβάσιμο βαθμό:
            <?= $manPass ?></p>
          <p>Βασικά μαθήματα για πτυχίο: <?= $manRem ?> Μαθήματα που έχουν δηλωθεί:
            <?= $registerClasses ?> Μαθήματα Επιλογής με προβιβάσιμο βαθμό: <?= $nomanPass ?></p>
          <p>Μαθήματα επιλογής για πτυχίο: <?= $nomanRem ?> Διδακτικές Μονάδες: <?= $points ?>
            Διδακτικές μονάδες για πτυχίο: <?= $pointsRem  ?> </p>
        </div>
        <table class="table__dashboard">
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
            <tr
              <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
              <?php if($index === 0) { ?>
              <td class="white" rowspan="<?= count($semester2)?>"><?= $semester ?></td>
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
            <tr
              <?php if($active){ echo "class='disabled'"; }; if($passed){ echo "class='passed'"; }; ?>>
              <?php if($index === 0) { ?>
              <td class="white" rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
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