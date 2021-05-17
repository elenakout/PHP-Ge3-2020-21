<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section>
    <?= $xmlhtml ?>

  </section>
  <section class="main">
    <div class="profile__statistics middle">
      <a href="<?= './assets/files/report_'.$userId.'.xml' ?>" target="pdf-frame" class="btn btn-dark-outline">προβολη αρχειου xml</a>
      <a href="<?= './assets/files/report_'.$userId.'.xml' ?>" download class="btn btn-dark-outline exit">αποθηκευση αρχειου xml</a>
    </div>
  </section>
</main>
<?php
  include('./view/footer.php');
?>