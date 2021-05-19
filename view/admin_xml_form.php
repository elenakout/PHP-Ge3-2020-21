<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
  <section class="dashboard">
    <aside class="dashboard__aside">
      <img src="./assets/images/<?= $avatar ?>" alt="<?= $lastname ?>" />
      <div class="aside__info">
        <p><?= $lastname ?></p>
        <p><?= $name ?></p>
        <?php if ($role === 'admin') { ?>
          <p><span>Γραμματεία</span></p>
        <?php } else { ?>
          <p><?= $role === 'teacher' ? 'Καθηγητής' : 'Μαθητης' ?> </p>
        <?php } ?>
      </div>
      <a href="./dashboard_admin.php?page=admin_profile" class="dashboard__link ">
        <img src="./assets/icons/user-avatar-filled.svg" alt="avatar icon">
        Προφίλ
      </a>
      <a href="./dashboard_admin.php" class="dashboard__link">
        <img src="./assets/icons/users.svg" alt="avatar icon">
        Φοιτητές
      </a>
      <a href="./dashboard_admin.php?page=teacher" class="dashboard__link">
        <img src="./assets/icons/teacher-ico.svg" alt="avatar icon">
        Καθηγητές
      </a>
      <a href="./dashboard_admin.php?page=admin" class="dashboard__link">
        <img src="./assets/icons/admin-ico.svg" alt="avatar icon">
        Γραμματεία
      </a>
      <a href="./dashboard_admin.php?page=classes" class="dashboard__link ">
        <img src="./assets/icons/book-ico.svg" alt="avatar icon">
        Μαθήματα
      </a>
      <a href="./admin_xml.php" class="dashboard__link link__active"><img src="./assets/icons/insert-alt.svg" alt="avatar icon">Δημιουργία XML</a>
    </aside>
    <div class="dashboard__xml">
    <div class="profile__statistics single__text">
      <h2>Στο αρχείο xml εμφανίζονται μόνο οι μαθητές που είναι εγγεγραμένοι στο συγκεκριμένο εξάμηνο.</h2>
      <h2>Ο μέσος όρος προκύπτει από τα μαθήματα που έχουν περάσει.</h2>
    </div>
      <div class="profile__statistics \">
      <form action="./admin_xml.php" method="post" class="form">
        <input type="hidden" name="action" value="create">
        <select name="semester" id="semester" class="form_input">
          <option value="" disabled selected hidden>Παρακαλώ επιλέξτε εξάμηνο φοίτησης</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
        <input type="submit" value="δημιουργια και εμφανηση xml" class="btn btn-dark btn-wide" />
      </form>
      </div>
    </div>
  </section>
</main>
<?php
include('./view/footer.php');
?>