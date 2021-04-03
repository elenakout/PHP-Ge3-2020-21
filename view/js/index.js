

function validateForm() {
  let usrname = document.forms["register"]["name"];
  let lastname = document.forms["register"]["lastName"];
  let regnum = document.forms["register"]["regNum"];
  let gender = document.forms["register"]["gender"];
  let semester = document.forms["register"]["semester"];
  let email = document.forms["register"]["email"];
  let password = document.forms["register"]["password"];

  let name_error = document.querySelector('.error_name');
  let lastname_error = document.querySelector('.error_lastname');
  let regnum_error = document.querySelector('.error_regnum');
  let regnum_length_error = document.querySelector('.error_regnum_length');
  let regnum_numbers_error = document.querySelector('.error_regnum_numbers');
  let gender_error = document.querySelector('.error_gender');
  let semester_error = document.querySelector('.error_semester');
  let email_error = document.querySelector('.error_email');
  let password_error = document.querySelector('.error_password');
  let password_length_error = document.querySelector('.error_length_password');

  if (usrname.value === '' || usrname.value === null) {
    usrname.style.borderBottom = "1px solid red";
    usrname.focus();
    name_error.classList.add('show');
    return false;
  } else {
    usrname.style.borderBottom = "1px solid var(--primary)";
    name_error.classList.remove('show');
  }

  if (lastname.value === '' || lastname.value === null) {
    lastname.style.borderBottom = "1px solid red";
    lastname.focus();
    lastname_error.classList.add('show');
    return false;
  } else {
    lastname.style.borderBottom = "1px solid var(--primary)";
    lastname_error.classList.remove('show');
  }

  if (regnum.value === '' || regnum.value === null) {
    console.log("length", regnum.value)
    regnum.style.borderBottom = "1px solid red";
    regnum.focus();
    regnum_error.classList.add('show');
    return false;
  } else {
    regnum.style.borderBottom = "1px solid var(--primary)";
    regnum_error.classList.remove('show');
  }

  if (regnum.value.length < 6) {
    regnum.style.borderBottom = "1px solid red";
    regnum.focus();
    regnum_length_error.classList.add('show');
    return false;
  } else {
    regnum.style.borderBottom = "1px solid var(--primary)";
    regnum_length_error.classList.remove('show');
  }

  if (regnum.value.match(/^[0-9]+$/) == null) {
    regnum.style.borderBottom = "1px solid red";
    regnum.focus();
    regnum_numbers_error.classList.add('show');
    return false;
  } else {
    regnum.style.borderBottom = "1px solid var(--primary)";
    regnum_numbers_error.classList.remove('show');
  }

  if (gender.value === '') {
    gender.style.borderBottom = "1px solid red";
    gender.focus();
    gender_error.classList.add('show');
    return false;
  } else {
    gender.style.borderBottom = "1px solid var(--primary)";
    gender_error.classList.remove('show');
  }

  if (semester.value === '') {
    semester.style.borderBottom = "1px solid red";
    semester.focus();
    semester_error.classList.add('show');
    return false;
  } else {
    semester.style.borderBottom = "1px solid var(--primary)";
    semester_error.classList.remove('show');
  }
  if (email.value === ' ' || email.value === null) {
    email.style.borderBottom = "1px solid red";
    email.focus();
    email_error.classList.add('show');
    return false;
  } else {
    email.style.borderBottom = "1px solid var(--primary)";
    email_error.classList.remove('show');
  }
  if (password.value === ' ' || password.value === null) {
    password.style.borderBottom = "1px solid red";
    password.focus();
    password_error.classList.add('show');
    return false;
  } else {
    password.style.borderBottom = "1px solid var(--primary)";
    password_error.classList.remove('show');
  }
  if (password.value.length < 8) {
    password.style.borderBottom = "1px solid red";
    password.focus();
    password_length_error.classList.add('show');
    return false;
  } else {
    password.style.borderBottom = "1px solid var(--primary)";
    password_length_error.classList.remove('show');
  }

  return false;

}
