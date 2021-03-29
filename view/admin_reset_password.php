<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <h2>Επαναφορά κωδικού πρόσβασης χρήστη <?= $user['lastName'] ?> <?= $user['name'] ?></h2>

  <form action="./reset_password.php"  method="post" class="form">
    <input type="hidden" name="action" value="reset">
    <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
    <label for="passsword">Νέος κωδικός πρόσβασης</label>
    <input type="text" name="newPassword" value="<?= $genPassword ?>" id="password">
    <input type="submit" value="υποβολη" class="btn" />
    <a href="./dashboard_admin.php?page=profile&userId=<?= $user['ID'] ?> " class="btn">ακυρο</a>
  </form>

</main>


<?php
  include('./view/footer.php');
?>