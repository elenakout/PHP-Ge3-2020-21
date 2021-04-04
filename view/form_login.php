<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Main -->
<main class="main">
  <div class="form__container">
    <div class="form__header">
      <h3 class="form__title">Εισοδος</h3>
      <p>Συνδεθείτε με τα συνθηματικά σας</p>
    </div>
    <!-- Η φόρµα σύνδεσης  -->
    <form action="./login.php" method="post" class="form">
      <input type="email" name="email" placeholder="Email" value="<?= $email ? $email : ''?>"
        class="form_input" />
      <input type="password" name="password" placeholder="Κωδικός" class="form_input" />
      <input type="submit" value="υποβολη" class="btn btn-dark" />
    </form>
    <p class="help-block"><?php echo $error; ?> <?php echo $name; ?> <?php echo $lastName; ?></p>
  </div>
  <div class="form__demo">
    <h2>Λογαριασμοί επίδειξης</h2>
    <p><span class="span_bold">Admin:</span> adm000000@uni.thess.gr <span
        class="span_bold">password:</span> demo1234</p>
    <p><span class="span_bold">Student:</span> stu000000@uni.thess.gr <span
        class="span_bold">password:</span> demo1234</p>
    <p><span class="span_bold">Teacher:</span> sep000000@uni.thess.gr <span
        class="span_bold">password:</span> demo1234</p>
  </div>





</main>

<?php
  include('./view/footer.php');
?>