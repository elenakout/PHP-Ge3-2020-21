<?php
  require('./utils/truncate.php');
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Main -->
<main class="main">
  <h2 class="page-title">Ανακοινωσεις</h2>
  <section class="container">

  <?php foreach ($results as $result) {
    $id = $result['ID'];
    $title = $result['Title'];
    $description = $result['Description'];
    $image = $result['Image'];
    $altText = $result['Alt-text'];
  ?>
  <article class="card">
    <img
      class="card__image"
      src="./assets/images/<?= $image ?>"
      alt="<?= $altText ?>"
    />
    <div class="card__content">
      <a href="./post1.html" class="card__title"
        ><?= $title ?></a
      >
      <p class="card__text"><?= substrwords($description,500); ?></p>
    </div>
  </article>



  <?php } ?>
    <a href="./posts.html" class="btn">ολες οι ανακοινωσεις</a>
  </section>
</main>

<?php
  include('./view/footer.php');
?>