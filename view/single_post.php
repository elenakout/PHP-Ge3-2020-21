<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Main -->
<main class="main">
  <section class="container single-post">

    <?php foreach ($results as $result) {
    $id = $result['ID'];
    $title = $result['title'];
    $description = $result['description'];
    $image = $result['image'];
    $altText = $result['altText'];
  ?>
    <h3 class="single__title">
      <?= $title ?>
    </h3>
    <img class="single__image" src="./assets/images/<?= $image ?>" alt="<?= $altText ?>" />
    <p class="single__text">
      <?= $description ?>
    </p>
    <a href="./posts.php" class="btn btn-dark">ολες οι ανακοινωσεις</a>
  </section>
</main>

<?php } ?>
<?php
  include('./view/footer.php');
?>