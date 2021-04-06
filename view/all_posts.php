<?php
  require('./utils/truncate.php');
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Ανακοινώσεις -->
<main class="main">
  <h2 class="page-title">Ανακοινωσεις</h2>
  <section class="container posts">

  <?php foreach ($results as $result) {
    $id = $result['ID'];
    $title = $result['title'];
    $description = $result['description'];
    $image = $result['image'];
    $altText = $result['altText'];
  ?>
    <article class="post">
      <img
        class="post__image"
        src="./assets/images/<?= $image ?>"
        alt="<?= $altText ?>"
      />
      <a href="./post.php?id=<?= $id ?>" class="post__title"
        ><?= $title ?></a
      >
      <p class="post__text">
        <?= substrwords($description,450) ?>
      </p>
    </article>
  <?php } ?>
  </section>
</main>


<?php
  include('./view/footer.php');
?>