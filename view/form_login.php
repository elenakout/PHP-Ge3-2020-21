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
      <input type="email" name="email" placeholder="Email" value="<?= $email ? $email : ''?>" />
      <input type="password" name="password" placeholder="Κωδικός" />
      <input type="submit" value="υποβολη" class="btn" />
    </form>
  </div>
    <span class="help-block"><?php echo $error; ?></span>
    <span class="help-block"><?php echo $name; ?></span>
    <span class="help-block"><?php echo $lastName; ?></span>

    <p>admin: adm483713@uni.thess.gr password: fe4cfffe</p>
    <p>student: stu203042@uni.thess.gr password: aa15a8c6</p>


</main>

<?php
  include('./view/footer.php');
?>