<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
  <h1>Εγγραφή <?= $roleuser ?></h1>
  <form action="./register_user.php" method="post" class="form" onsubmit="return validateForm()>
    <input type="hidden" name="action" value="create">
    <input type="hidden" name="roleuser" value="<?= $roleuser ?>">
    <?php if($roleuser == 'student') { ?>
      <h2>user semester: <?= $semester ?></h2>
    <?php } ?>
    <input type="text" name="name" placeholder="Όνομα" value="<?= $username ?>">
    <input type="text" name="lastName" placeholder="Επίθετο" value="<?= $lastname ?>">
    <input type="text" name="regNum" placeholder="Αριθμός Μητρώου" value="<?= $regNum ?>">

    <select name="gender" id="gender" class="form_input">
      <option value="male" <?php if($gender == 'male'){echo("selected");}?>>Άρρεν</option>
      <option value="female" <?php if($gender == 'female'){echo("selected");}?>>Θήλυ</option>
    </select>
    <?php if($roleuser == 'student') { ?>
    <select name="semester" id="semester" class="form_input">
      <option value="1" <?php if($semester == '1'){echo("selected");}?>>1</option>
      <option value="2" <?php if($semester == '2'){echo("selected");}?>>2</option>
      <option value="3" <?php if($semester == '3'){echo("selected");}?>>3</option>
    </select>
    <?php } ?>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="Όνομα" value="<?= $email ?>">
    <input type="text" name="password" placeholder="Όνομα" value="<?= $password ?>">

    <input type="submit" value="υποβολη" class="btn" />
    <a href="./register_user.php" class="btn">πισω</a>
  </form>
</main>


<?php
  include('./view/footer.php');
?>