function myFunction()
{
    const x = document.getElementById('form1');
    x.style.display = 'block';
}
// When the user clicks anywhere outside of the modal, close it
var form = document.getElementById('form1');
window.onclick = function(event) {
    if (event.target == form) {
        form.style.display = "none";
    }
}
// this is for closing the reserve now button when user clicks on it.
var y = document.getElementById('cross');
 y.addEventListener('click', closefunc);
function closefunc()
{
   const x = document.getElementById('form1');
    x.style.display = 'none';
}
// This is for clickable navmenubar
const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");

menuBtn.onclick = ()=>{
  navbar.classList.add("show");
  menuBtn.classList.add("hide");
  body.classList.add("disabled");
}
cancelBtn.onclick = ()=>{
  body.classList.remove("disabled");
  navbar.classList.remove("show");
  menuBtn.classList.remove("hide");
}
window.onscroll = ()=>{
  this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}

// this is for login form
const container = document.querySelector(".container"),
      formvalid = document.querySelector('form'),
      eField = formvalid.querySelector('.email'),
      eInput = eField.querySelector('input'),
      pField = formvalid.querySelector('.password'),
      pInput = pField.querySelector('input'),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");
    
/*-------------form validation part-----------------*/ 
formvalid.addEventListener('submit',  (e) => {
    let error = 0;
    var emailPattern = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(eInput.value.trim() == "")
    {
      error++;
      document.getElementById('err_email').innerText = 'Email can\'t be empty';
    }
    else if(!emailPattern.test(eInput.value))
    {
      error++;
     document.getElementById('err_email').innerText = 'Email must be in E-mail format';
    }
    if (pInput.value.trim() === '' || pInput.value.trim() == null){
        error++;
        document.getElementById('err_psd').innerHTML = 'Password cannot be empty' ;
    }
    else if(pInput.value.length <=6) {
        error++;
       document.getElementById('err_psd').innerText = 'Password must be longer than 6 characters';
    }
    else if(pInput.value.length >=20) {
        error++;
        document.getElementById('err_psd').innerText = 'password cannot be more than 20 characters';
    }
    else if(pInput.value === 'password'){
        error++;
        document.getElementById('err_psd').innerText = 'Please enter a secure password';
    }
    if(error > 0){
    e.preventDefault();
    };
}); 
/*----- form validation for register form------------------*/
const formreg = document.getElementById('formreg'),
uField = formreg.querySelector('.username'),
uInput = uField.querySelector('input'),
emailInput = formreg.querySelector('.email'),
eValid = emailInput.querySelector('input'),
pArea = formreg.querySelector('.password'),
pCheck =pArea.querySelector('input'),
reArea = formreg.querySelector('.repassword'),
reCheck = reArea.querySelector('input');

formreg.addEventListener('submit', (e) =>{
    let error = 0;
    if (uInput.value.trim() === '' || uInput.value.trim() == null){
        error++;
        document.getElementById('err_username').innerHTML = 'Please enter username' ;
    }
    else if(uInput.value.length >=20){
        error++;
        document.getElementById('err_username').innerText = 'Username can\'t be longer than 20 characters';
    }
    var userInput = /^[0-9]+$/;
    if(uInput.value.match(userInput))
    {
        error++;
        document.getElementById('err_username').innerText = 'Invalid Username.';
    };
    
    // this is for email validatoion
    var emailCheck = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(eValid.value.trim() == "")
    {
        error++;
      document.getElementById('err_emaill').innerText = 'Email can\'t be empty';
    }
    else if(!emailCheck.test(eValid.value))
    {
        error++;
     document
     .getElementById('err_emaill').innerText = 'Email must be in E-mail format';
    }

    // this is for password and confirm password
    if (pCheck.value.trim() === '' || pCheck.value.trim() == null){
        error++;
        document.getElementById('err_psdd').innerHTML = 'Password cannot be empty' ;
    }
    else if(pCheck.value.length <=6) {
        error++;
       document.getElementById('err_psdd').innerText = 'Password must be longer than 6 characters';
    }
    else if(pCheck.value.length >=20) {
        error++;
        document.getElementById('err_psdd').innerText = 'password cannot be more than 20 characters';
    }
    else if(pCheck.value === 'password'){
        error++;
        document.getElementById('err_psdd').innerText = 'Please enter a secure password';
    };
    if (reCheck.value.trim() === '' || reCheck.value.trim() == null){
        error++;
        document.getElementById('err_re-psdd').innerText = 'Enter confirm password';
    }
    if(reCheck.value != pCheck.value){
        error++;
        document.getElementById('err_re-psdd').innerText = 'Password and Confirm password must be same.';
    }

    if(error > 0){
    e.preventDefault();
    };
});
 // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });           
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });
    // js code to popup when user clicks on it 
    function signclose()
{
    const formContainer = document.querySelector('.container');
    formContainer.style.display = 'block';
}
const cross = document.querySelector('.cancel-login-signup');
function close_cross()
{
    container.style.display = 'none';
};

// this is for showing and hiding near available rooms
function hidebtn()
{
    var btnhide =
document.getElementById('main');
if(btnhide.style.display === 'none') {
    btnhide.style.display = 'block';
}else {
    btnhide.style.display = 'none';
}
};