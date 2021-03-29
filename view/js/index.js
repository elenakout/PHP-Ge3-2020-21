

function validateForm() {
  let usrname = document.forms["register"]["name"];
  let lastname = document.forms["register"]["lastName"];
  let regnum = document.forms["register"]["regNum"];
  let gender = document.forms["register"]["gender"];
  let semester = document.forms["register"]["semester"];

  let name_error = document.querySelector('.error_name');
  let lastname_error = document.querySelector('.error_lastname');
  let regnum_error = document.querySelector('.error_regnum');
  let gender_error = document.querySelector('.error_gender');
  let semester_error = document.querySelector('.error_semester');

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
    lastname_error.classList.add('show');
    return false;
  } else {
    lastname.style.borderBottom = "1px solid var(--primary)";
    lastname_error.classList.remove('show');
  }

  if (regnum.value === '' || regnum.value === null) {
    regnum.style.borderBottom = "1px solid red";
    regnum_error.classList.add('show');
    return false;
  } else {
    regnum.style.borderBottom = "1px solid var(--primary)";
    regnum_error.classList.remove('show');
  }

  if (gender.value === '') {
    gender.style.borderBottom = "1px solid red";
    gender_error.classList.add('show');
    return false;
  } else {
    gender.style.borderBottom = "1px solid var(--primary)";
    gender_error.classList.remove('show');
  }

  return true;

}
