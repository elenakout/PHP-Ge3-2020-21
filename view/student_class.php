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
      <a href="./dashboard_student.php?action=profile" class="dashboard__link ">
        <img src="./assets/icons/user-avatar-filled.svg" alt="avatar icon">
        Προφίλ
      </a>

      <a href="./dashboard_student.php" class="dashboard__link link__active ">
        <img src="./assets/icons/book-ico-alt.svg" alt="avatar icon">
        Μαθήματα
      </a>
    </aside>
    <section class="dashboard__main">
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
                <td class=""></td>
                <?php } else { ?>
                <td class="">
                  <?php
                  if(!$register){ ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="εγγραφη" class="btn btn-outline-green" />
                  </form>
                  <?php  } else { ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="unregister">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="καταργηση εγγραφης" class="btn btn-outline-red" />
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
                <td class="white" rowspan="<?= count($semester2)?>"><?= $semester ?></td>
                <?php } ?>
                <td class="left"><?= $title ?></td>
                <td class="left"><?= $name ?> <?= $lastname ?></td>
                <td class="width-5"><?= $points ?></td>
                <td class="width-5"><?= $mandarory ?></td>
                <td class="width-5"><?php echo($grade > 0 ? $grade : '-') ?></td>
                <?php if($passed || $active) { ?>
                <td class=""></td>
                <?php } else { ?>
                <td class="">
                  <?php
                    if(!$register){ ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="εγγραφη" class="btn btn-outline-green" />
                  </form>
                  <?php  } else { ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="unregister">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="καταργηση εγγραφης" class="btn btn-outline-red" />
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
                <td class="white" rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
                <?php } ?>
                <td class="left"><?= $title ?></td>
                <td class="left"><?= $name ?> <?= $lastname ?></td>
                <td class="width-5"><?= $points ?></td>
                <td class="width-5"><?= $mandarory ?></td>
                <td class=" width-5"><?php echo($grade > 0 ? $grade : '-') ?></td>
                <?php if($passed || $active) { ?>
                <td class=""></td>
                <?php } else { ?>
                <td class="">
                  <?php
                    if(!$register){ ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="εγγραφη" class="btn btn-outline-green" />
                  </form>
                  <?php  } else { ?>
                  <form name="register" action="./dashboard_student.php" method="post">
                    <input type="hidden" name="action" value="unregister">
                    <input type="hidden" name="regId" value="<?= $regid ?>">
                    <input type="submit" value="καταργηση εγγραφης" class="btn btn-outline-red" />
                  </form>
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
  </section>
</main>

<?php
include('./view/footer.php');
?>