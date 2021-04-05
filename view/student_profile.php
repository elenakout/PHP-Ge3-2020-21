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
        <p><?= $role === 'teacher' ? 'Καθηγητής' : 'Φοιτητής' ?> </p>
        <?php } ?>
      </div>
      <a href="./dashboard_student.php?action=profile" class="dashboard__link link__active">
        <img src="./assets/icons/user-avatar-filled-alt.svg" alt="avatar icon">
        Προφίλ
      </a>

      <a href="./dashboard_student.php" class="dashboard__link">
        <img src="./assets/icons/book-ico.svg" alt="avatar icon">
        Μαθήματα
      </a>

    </aside>
    <section class="dashboard__form">

      <form name="info" action="./dashboard_student.php" method="post" class="form">

        <input type="hidden" name="action" value="update">

        <label for="stdname">Όνομα</label>
        <input id="stdName" type="text" name="name" placeholder="Όνομα" class="form_input"
          value="<?= $student['name'] ?>" disabled>

        <label for="stdlastname">Επίθετο</label>
        <input id="stdlastname " type="text" name="lastName" placeholder="Επίθετο"
          value="<?= $student['lastName'] ?>" class="form_input input__student" disabled>

        <label for="regnum">Αριθμός Μητρώου</label>
        <input type="text" name="regNum" id="regnum" placeholder="Αριθμός Μητρώου"
          value="<?= $student['regNum'] ?>" class="form_input" disabled>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $student['email'] ?>"
          class="form_input" disabled>

        <label for="phone">Τηλέφωνο</label>
        <input type="text" name="phone" placeholder="Τηλέφωνο" value="<?= $student['phone'] ?>"
          class="form_input">

        <label for="birthday">Ημερομηνία Γέννησης</label>
        <input type="date" id="birthday" name="birthday" value="<?= $student['birthday'] ?>"
          class="form_input">

        <label for="street">Οδός</label>
        <input type="text" name="street" placeholder="Οδός" value="<?= $address['street'] ?>"
          class="form_input">

        <label for="strnum">Αριθμός</label>
        <input type="text" name="strnum" placeholder="Αριθμός" value="<?= $address['strnum'] ?>"
          class="form_input">

        <label for="city">Πόλη</label>
        <input type="text" name="city" placeholder="Πόλη" value="<?= $address['city'] ?>"
          class="form_input">

        <label for="postalcode">Ταχυδρομικός Κώδικας</label>
        <input type="text" name="postalcode" placeholder="Ταχυδρομικός Κώδικας"
          value="<?= $address['postalCode'] ?>" class="form_input">
        <input type="submit" value="επεξεργασια" class="btn btn-dark" />
        <a href="./reset_password.php?userId=<?= $student['ID'] ?>" class="btn btn-dark">αλλαγη
        κωδικου</a>
      </form>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>