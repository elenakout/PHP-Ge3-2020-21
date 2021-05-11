<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <section>
  <form action="./admin_xml.php" method="post" class="form">
    <input type="hidden" name="action" value="create">
    <input type="text" name="semester" placeholder="Εξάμηνο" class="form_input" />

    <input type="submit" value="υποβολη" class="btn btn-dark" />
  </form>
  </section>
</main>
<?php
  include('./view/footer.php');
?>