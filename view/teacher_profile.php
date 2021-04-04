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
      <a href="./dashboard_teacher.php?action=profile">Επεξεργασία προφίλ</a>
      <a href="./dashboard_teacher.php">Μαθήματα</a>
    </aside>
    <section class="admin_main">
      <h1>teacher profile</h1>
      <p><?= $teacher['lastName'] ?> <?= $teacher['name'] ?>
        <?= $teacher['email'] . $teacher['regNum'] ?></p>
      <form name="register" action="./dashboard_teacher.php" method="post" class="form">
        <input type="hidden" name="action" value="update">
        <input type="text" name="phone" placeholder="Τηλέφωνο" value="<?= $teacher['phone'] ?>">
        <label for="birthday">Ημερομηνία Γέννησης</label>
        <input type="date" id="birthday" name="birthday" value="<?= $teacher['birthday'] ?>">
        <input type="text" name="street" placeholder="Οδός" value="<?= $address['street'] ?>">
        <input type="text" name="strnum" placeholder="Αριθμός" value="<?= $address['strnum'] ?>">
        <input type="text" name="city" placeholder="Πόλη" value="<?= $address['city'] ?>">
        <input type="text" name="postalcode" placeholder="Ταχυδρομικός Κώδικας"
          value="<?= $address['postalCode'] ?>">
        <input type="submit" value="επεξεργασια" class="btn btn-dark" />
      </form>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>