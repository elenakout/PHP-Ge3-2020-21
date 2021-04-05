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
      <a href="./dashboard_teacher.php?action=profile" class="dashboard__link link__active">
        <img src="./assets/icons/user-avatar-filled-alt.svg" alt="avatar icon">
        Προφίλ
      </a>

      <a href="./dashboard_teacher.php" class="dashboard__link  ">
        <img src="./assets/icons/book-ico.svg" alt="avatar icon">
        Μαθήματα
      </a>
    </aside>
    <section class="dashboard__form">
      <form name="register" action="./dashboard_teacher.php" method="post" class="form">
        <input type="hidden" name="action" value="update">

        <label for="name">Όνομα</label>
        <input id="Name" type="text" name="name" placeholder="Όνομα" class="form_input"
          value="<?= $teacher['name'] ?>" disabled>

        <label for="lastname">Επίθετο</label>
        <input id="lastname " type="text" name="lastName" placeholder="Επίθετο"
          value="<?= $teacher['lastName'] ?>" class="form_input input__student" disabled>

        <label for="regnum">Αριθμός Μητρώου</label>
        <input type="text" name="regNum" id="regnum" placeholder="Αριθμός Μητρώου"
          value="<?= $teacher['regNum'] ?>" class="form_input" disabled>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $teacher['email'] ?>"
          class="form_input" disabled>

        <label for="phone">Τηλέφωνο</label>
        <input type="text" name="phone" placeholder="Τηλέφωνο" value="<?= $teacher['phone'] ?>"
          class="form_input">

        <label for="birthday">Ημερομηνία Γέννησης</label>
        <input type="date" id="birthday" name="birthday" value="<?= $teacher['birthday'] ?>"
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
      </form>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>