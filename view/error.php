<?php include('header.php') ?>
<?php include('navbar.php') ?>
<main class="main container">
  <h2 class="errorpage__title">Παρουσιάστηκε κάποιο σφάλμα</h2>
  <p class="errorpage__error"><?= $error_message ?></p>
  <a href="<?= $link?>" class="btn btn-dark-outline">επιστροφη</a>
</main>

<br>
<?php include('footer.php') ?>
