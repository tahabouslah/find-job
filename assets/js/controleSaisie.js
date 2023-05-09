/// Control saisie as job seeker

const form = document.querySelector(".formulaire-create-account");
const inptCin = document.querySelector(".inptCin");
const inptFirstName = document.querySelector(".inptFirstName");
const inptLastName = document.querySelector(".inptLastName");
const inptPseudo = document.querySelector(".inptPseudo");
const inptEmail = document.querySelector(".inptEmail");
const inptPwd = document.querySelector(".inptPwd");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // prevent form submission

  if (inptCin.value === "" || isNaN(inptCin.value) || inptCin.value.length < 8) {
    // check if CIN is empty, not a number, or less than 8 digits
    alert("Please enter a valid CIN number with at least 8 digits.");
    inptCin.focus();
  }else if (inptFirstName.value === "") {
    // check if first name is empty
    alert("Please enter your first name.");
    inptFirstName.focus();
  } else if (inptLastName.value === "") {
    // check if last name is empty
    alert("Please enter your last name.");
    inptLastName.focus();
  } else if (inptPseudo.value === "") {
    // check if pseudo is empty
    alert("Please enter a pseudo.");
    inptPseudo.focus();
  } else if (inptEmail.value === "" || !isValidEmail(inptEmail.value)) {
    // check if email is empty or not valid
    alert("Please enter a valid email address.");
    inptEmail.focus();
  } else if (inptPwd.value === "") {
    // check if password is empty
    alert("Please enter a password.");
    inptPwd.focus();
  } else {
    // submit the form
    form.submit();
  }
});

function isValidEmail(email) {
  // check if email is valid using a regular expression
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}


/////////////////////  FORM JOB OFFERER   /////////////////////////////////////////////

const formOfferer = document.querySelector(".form-job-offerer");

formOfferer.addEventListener("submit", (event) => {
  // prevent the form from submitting by default
  event.preventDefault();

  const inptCodeRegof= document.querySelector(".inptCodeReg");
  const inptEntrNameof = document.querySelector(".inptEntrName");
  const inptFirstNameof = document.querySelector(".inptFirstName");
  const inptLastNameof = document.querySelector(".inptLastName");
  const inptPseudoof = document.querySelector(".inptPseudo");
  const inptEmailof = document.querySelector(".inptEmail");
  const inptPwdof = document.querySelector(".inptPwd");

  // check if Code registre is empty or less than 1 digit
  if (inptCodeRegof.value === "" || isNaN(inptCodeRegof.value) || inptCodeRegof.value.length < 1) {
    alert("Please enter a valid Code registre.");
    inptCodeRegof.focus();
    return;
  }

  // check if Entreprise Name is empty
  if (inptEntrNameof.value.trim() === "") {
    alert("Please enter your Entreprise Name.");
    inptEntrNameof.focus();
    return;
  }

  // check if First name is empty
  if (inptFirstNameof.value.trim() === "") {
    alert("Please enter your First name.");
    inptFirstNameof.focus();
    return;
  }

  // check if Last name is empty
  if (inptLastNameof.value.trim() === "") {
    alert("Please enter your Last name.");
    inptLastNameof.focus();
    return;
  }

  // check if Pseudo is empty
  if (inptPseudoof.value.trim() === "") {
    alert("Please enter your Pseudo.");
    inptPseudoof.focus();
    return;
  }

  // check if Email is empty or invalid
  if (inptEmailof.value === "" || !/\S+@\S+\.\S+/.test(inptEmailof.value)) {
    alert("Please enter a valid email address.");
    inptEmailof.focus();
    return;
  }

  // check if Password is empty or less than 6 characters
  if (inptPwdof.value === "" || inptPwdof.value.length < 6) {
    alert("Please enter a password with at least 6 characters.");
    inptPwdof.focus();
    return;
  }

  // if all validation conditions are passed, submit the form
  formOfferer.submit();
});

//////////////////////////// ROLE VALIDATION  check//////////////////////////////
// get the form element
const formRole = document.querySelector('.form-role');

// add event listener to form submit
formRole.addEventListener('submit', function(event) {
  // get the radio buttons
  const radioBtn1 = document.getElementById('radio-btn-1');
  const radioBtn2 = document.getElementById('radio-btn-2');

  // check if one of the radio buttons has been selected
  if (!radioBtn1.checked && !radioBtn2.checked) {
    // if not, prevent form submission and show an error message
    event.preventDefault();
    alert('Please select a role.');
  }
});


///////////////////// LOGIN  check///////
const formLog = document.querySelector('.form-login');

formLog.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent formLog submission
  
  // get input values
  const pseudoInput = document.querySelector('.inptPseudo');
  const pwdInput = document.querySelector('.inptPwd');
  const roleInputs = document.querySelectorAll('input[name="role"]');
  
  const pseudo = pseudoInput.value.trim();
  const pwd = pwdInput.value.trim();
  let role = null;
  
  // check if a role is selected
  for (let i = 0; i < roleInputs.length; i++) {
    if (roleInputs[i].checked) {
      role = roleInputs[i].value;
      break;
    }
  }
  
  // validate input values
  if (pseudo === '') {
    alert('Please enter a pseudo.');
    pseudoInput.focus();
    return;
  }
  
  if (pwd === '') {
    alert('Please enter a password.');
    pwdInput.focus();
    return;
  }
  
  if (role === null) {
    alert('Please select a role.');
    roleInputs[0].focus();
    return;
  }
  
  // submit the formLog if all inputs are valid
  formLog.submit();
});

//////////////////////// ADD OFFER check - required ///
const  formOffer = document.querySelector('. formOffer-offer');

 formOffer.addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the  formOffer inputs
  const title =  formOffer.querySelector('.title');
  const post =  formOffer.querySelector('.post');

  // Validate the inputs
  if (title.value.trim() === '') {
    alert('Title is required');
    title.focus();
    return;
  }

  if (post.value.trim() === '') {
    alert('Post is required');
    post.focus();
    return;
  }

  // If all inputs are valid, submit the  formOffer
   formOffer.submit();
});

///////////////////////  DASH DEM REQUIRED 


//////////////////////
