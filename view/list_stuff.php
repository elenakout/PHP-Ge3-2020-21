<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Main -->
<main class="main">
  <h2 class="page-title"><?= $title ?></h2>
  <section class="container">
    <?php foreach ($results as $result) {
      $id = $result['ID'];
      $name = $result['name'];
      $lastname = $result['lastName'];
      $phone = $result['phone'];
      $email = $result['email'];
      $avatar = $result['avatar'];

    ?>
    <article class="list">
      <img
        src="./assets/images/<?= $avatar ?>"
        alt="<?= $name.$lastname ?> Καθηγητής"
      />
      <p><?= $name?> <?= $lastname ?></p>
      <p>Καθηγητής</p>
      <p><?= $email ?></p>
      <p><?= $phone ?></p>
    </article>
    <?php } ?>

  </section>
</main>

<?php
  include('./view/footer.php');
?>