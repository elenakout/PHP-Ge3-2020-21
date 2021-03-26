<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
<form action="./register_user.php" method="post" class="form">
  <input type="hidden" name="action" value="submit">
  <input type="text" name="name" placeholder="Όνομα">
  <input type="text" name="lastName" placeholder="Επίθετο">
  <input type="email" name="email" placeholder="Email"/>
  <input type="text" name="regNum" placeholder="Αριθμός Μητρώου">

  <select name="gender" id="gender" class="form_input">
    <option value="male">Άρρεν</option>
    <option value="female">Θήλυ</option>
  </select>
  <select name="role" id="role" class="form_input" onchange="select_student(value)">
    <option value="admin">Γραμματεία</option>
    <option value="teacher">Καθηγητής</option>
    <option value="student">Φοιτητής</option>
  </select>
  <select name="semester" id="semester" class="form_input field_semester">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>
  <input type="submit" value="υποβολη" class="btn" />
</form>
</main>

<script>
  let semester_field = document.getElementById("semester");
  function select_student(value) {
  if (value === 'student') {
    semester_field.classList.add("show");
  }else {
    semester_field.classList.remove("show");
  }
}
</script>

<?php
  include('./view/footer.php');
?>