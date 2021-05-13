<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section>
  <?= $xmlhtml ?>
  <a href="./assets/files/report.xml" target="pdf-frame"
        >ΕΔΩ</a
      >
  </section>
</main>
<?php
  include('./view/footer.php');
?>