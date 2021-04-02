<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<main class="main">
  <section class="admin_students">
    <aside class="admin_aside">
      <a href="./dashboard_admin.php" class="post__title">Students</a>
      <a href="./dashboard_admin.php?page=teachers" class="post__title">Teachers</a>
      <a href="./dashboard_admin.php?page=admins" class="post__title">Admins</a>
      <a href="./dashboard_admin.php?page=classes" class="post__title">Classes</a>
    </aside>
    <div class="admin_main">
      <form name="update" action="./admin_users.php" method="post" class="form">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="roleuser" value="<?= $user['role'] ?>">
        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
        <input type="text" name="name" placeholder="Όνομα" value="<?= $user['name'] ?>">
        <input type="text" name="lastName" placeholder="Επίθετο" value="<?= $user['lastName'] ?>">
        <input type="text" name="regNum" placeholder="Αριθμός Μητρώου" value="<?= $user['regNum'] ?>">
        <select name="gender" id="gender" class="form_input">
          <option value="male" <?php if ($user['gender'] == 'male') {
                                  echo ("selected");
                                } ?>>Άρρεν</option>
          <option value="female" <?php if ($user['gender'] == 'female') {
                                    echo ("selected");
                                  } ?>>Θήλυ</option>
        </select>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Όνομα" value="<?= $user['email'] ?>">
        <input type="submit" value="υποβολη" class="btn" />
        <a href="./reset_password.php?userId=<?= $user['ID'] ?>" class="btn">επαναφορα κωδικού προσβασης</a>
      </form>
    </div>

  </section>
</main>

<?php
include('./view/footer.php');
?>