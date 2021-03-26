<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<main class="main">
<form name="register" action="./register_user.php" method="post" class="form" onsubmit="return validateForm()">
  <input type="hidden" name="action" value="submit">
  <input type="text" name="name" placeholder="Όνομα">
  <p class="error_name">Παρακαλώ πληκρολογήστε όνομα</p>
  <input type="text" name="lastName" placeholder="Επίθετο">
  <p class="error_lastname">Παρακαλώ πληκρολογήστε επίθετο</p>
  <input type="text" name="regNum" placeholder="Αριθμός Μητρώου">
  <p class="error_regnum">Παρακαλώ πληκρολογήστε αριθμό μητρώου</p>
  <select name="gender" id="gender" class="form_input">
    <option value="" disabled selected hidden>Επιεξτε φύλο</option>
    <option value="male">Άρρεν</option>
    <option value="female">Θήλυ</option>
  </select>
  <p class="error_gender">Παρακαλώ εισάγετε φύλο</p>
  <select name="role" id="role" class="form_input" onchange="select_student(value)">
    <option value="" disabled selected hidden>Επιλέξτε ρόλο χρήστη</option>
    <option value="admin">Γραμματεία</option>
    <option value="teacher">Καθηγητής</option>
    <option value="student">Φοιτητής</option>
  </select>
  <p class="error_role">Παρακαλώ εισάγετε ρόλο χρήστη</p>
  <select name="semester" id="semester" class="form_input field_semester">
    <option value="" disabled selected hidden>Εξάμηνο φοίτησης</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>

  <input type="submit" value="υποβολη" class="btn"/>
</form>
</main>

<script type="text/javascript">
  let semester_field = document.getElementById("semester");
    function select_student(value) {
    if (value === 'student') {
      semester_field.classList.add("show");
    }else {
      semester_field.classList.remove("show");
    }
  }

  function validateForm() {
    let name = document.forms["register"]["name"];
    let lastname = document.forms["register"]["lastName"];
    let regnum = document.forms["register"]["regNum"];
    let gender = document.forms["register"]["gender"];
    let role = document.forms["register"]["role"];
    let semester = document.forms["register"]["semester"];

    let name_error = document.querySelector('.error_name');
    let lastname_error = document.querySelector('.error_lastname');
    let regnum_error = document.querySelector('.error_regnum');
    let gender_error = document.querySelector('.error_gender');
    let role_error = document.querySelector('.error_role');
    let semester_error = document.querySelector('.error_semester');


    if(name.value === '' || name.value === null){
      name.style.borderBottom="1px solid red";
      name_error.classList.add('show');
      return false;
    }else {
      name.style.borderBottom="1px solid var(--primary)";
      name_error.classList.remove('show');
    }

    if(lastname.value === '' || lastname.value === null){
      lastname.style.borderBottom="1px solid red";
      lastname_error.classList.add('show');
      return false;
    }else {
      lastname.style.borderBottom="1px solid var(--primary)";
      lastname_error.classList.remove('show');
    }

    if(regnum.value === '' || regnum.value === null){
      regnum.style.borderBottom="1px solid red";
      regnum_error.classList.add('show');
      return false;
    }else {
      regnum.style.borderBottom="1px solid var(--primary)";
      regnum_error.classList.remove('show');
    }

    if(gender.value === ''){
      gender.style.borderBottom="1px solid red";
      gender_error.classList.add('show');
      return false;
    }else {
      gender.style.borderBottom="1px solid var(--primary)";
      gender_error.classList.remove('show');
    }

    if(role.value === ''){
      role.style.borderBottom="1px solid red";
      role_error.classList.add('show');
      return false;
    }else {
      role.style.borderBottom="1px solid var(--primary)";
      role_error.classList.remove('show');
    }

    return true;

  }
</script>

<?php
  include('./view/footer.php');
?>