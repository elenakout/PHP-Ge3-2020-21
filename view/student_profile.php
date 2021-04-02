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
      <h1>student profile</h1>
      <p><?= $student['lastName'] ?> <?= $student['name'] ?> <?= $student['email'] . $student['regNum'] ?></p>
      <form name="register" action="./dashboard_student.php" method="post" class="form">
        <input type="hidden" name="action" value="update">
        <input type="text" name="phone" placeholder="Τηλέφωνο" value="<?= $student['phone'] ?>">
        <label for="birthday">Ημερομηνία Γέννησης</label>
        <input type="date" id="birthday" name="birthday" value="<?= $student['birthday'] ?>">

        <!-- <input type="text" name="avatar" placeholder="avatar" value="<?= $student['avatar'] ?>"> -->

        <input type="text" name="street" placeholder="Οδός" value="<?= $address['street'] ?>">
        <input type="text" name="strnum" placeholder="Αριθμός" value="<?= $address['strnum'] ?>">
        <input type="text" name="city" placeholder="Πόλη" value="<?= $address['city'] ?>">
        <input type="text" name="postalcode" placeholder="Ταχυδρομικός Κώδικας" value="<?= $address['postalCode'] ?>">
        <input type="submit" value="υποβολη" class="btn"/>
      </form>
    </section>
  </section>
</main>

<?php
include('./view/footer.php');
?>