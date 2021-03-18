<?php include('./utils/navbaractive.php') ?>

<!-- Μενού Πλοήγησης - NavBar -->
<nav class="nav">
  <ul class="nav__list">
    <li class="nav__item <?php active('index.php');?>">
      <a href="./index.php" class="nav__link" >αρχικη</a>
    </li>
    <li class="nav__item <?php active('classes.php');?> ">
      <a href="./classes.php" class="nav__link">μαθηματα</a>
    </li>
    <li class="nav__item dropdown <?php active('teachers.php');?> <?php active('stuff.php');?>">
      <a href="#" class="nav__link">προσωπικο</a>
      <ul>
        <li class="nav__link"><a href="./teachers.php">διδασκοντες</a></li>
        <li class="nav__link"><a href="./stuff.php">Γραμματεια</a></li>
      </ul>
    </li>
    <li class="nav__item <?php active('regulation.php');?>">
      <a href="./regulation.php" class="nav__link">κανονισμος σπουδων</a>
    </li>
  </ul>
</nav>
