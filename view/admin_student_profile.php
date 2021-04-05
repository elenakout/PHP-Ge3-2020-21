<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
  <div class="dashboard_profile">
    <form name="update" action="./admin_users.php" method="post" class="form form__profile">
      <h3 class="subtitle">Επεξεργασία Προφίλ</h3>
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="roleuser" value="<?= $user['role'] ?>">
      <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
      <label for="stdname">Όνομα</label>
      <input id="stdName" type="text" name="name" placeholder="Όνομα" value="<?= $user['name'] ?>"
        class="form_input input__student">
      <label for="stdlastname">Επίθετο</label>
      <input id="stdlastname " type="text" name="lastName" placeholder="Επίθετο"
        value="<?= $user['lastName'] ?>" class="form_input input__student">
      <label for="regnum">Αριθμός Μητρώου</label>
      <input type="text" name="regNum" id="regnum" placeholder="Αριθμός Μητρώου"
        value="<?= $user['regNum'] ?>" class="form_input input__student">

      <label for="gender">Φύλλο</label>
      <select name="gender" id="gender" class="form_input input__student">
        <option value="male" <?php if ($user['gender'] == 'male') {
                                  echo ("selected");
                                } ?>>Άρρεν</option>
        <option value="female" <?php if ($user['gender'] == 'female') {
                                    echo ("selected");
                                  } ?>>Θήλυ</option>
      </select>

      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= $user['email'] ?>"
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
    <div class="profile__main">
      <div class="profile__statistics">
        <h3 class="subtitle">Στατιστικά</h3>
        <div class="statistics__container">
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-1.png" alt="icon" />
            <span class="box__title">Εξάμηνο</span>
            <span class="box__number"><?= $stusemester['semesterNum'] ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-2.png" alt="icon" />
            <span class="box__title">Βασικά μαθήματα με προβιβάσιμο βαθμό</span>
            <span class="box__number"><?= $manPass ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-3.png" alt="icon" />
            <span class="box__title">Βασικά μαθήματα για πτυχίο</span>
            <span class="box__number"><?= $manRem ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-4.png" alt="icon" />
            <span class="box__title">Μαθήματα που έχουν δηλωθεί</span>
            <span class="box__number"><?= $registerClasses ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-5.png" alt="icon" />
            <span class="box__title">Μαθήματα Επιλογής με προβιβάσιμο βαθμό</span>
            <span class="box__number"><?= $nomanPass ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-6.png" alt="icon" />
            <span class="box__title">Μαθήματα επιλογής για πτυχίο</span>
            <span class="box__number"><?= $nomanRem ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-7.png" alt="icon" />
            <span class="box__title">Διδακτικές Μονάδες</span>
            <span class="box__number"><?= $points ?></span>
          </div>
          <div class="statistics__box">
            <img class="box__image" src="./assets/icons/st-8.png" alt="icon" />
            <span class="box__title">Διδακτικές μονάδες για πτυχίο</span>
            <span class="box__number"><?= $pointsRem  ?></span>
          </div>
        </div>
      </div>
      <div class="profile__table">
        <h3 class="subtitle">Μαθήματα</h3>
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
              <td class="width-5 <?= $register ? 'green' : 'red'?>">
                <?= $register ? 'Εγγεγραμμενος' : 'Μη Εγγραμμένος' ?>
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
                <td class="width-5 <?= $register ? 'green' : 'red'?>">
                  <?= $register ? 'Εγγεγραμμενος' : 'Μη Εγγραμμένος' ?>
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
                <td class="width-5 <?= $register ? 'green' : 'red'?>">
                  <?= $register ? 'Εγγεγραμμενος' : 'Μη Εγγραμμένος' ?>
                </td>
              <?php } ?>
            </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<?php
include('./view/footer.php');
?>