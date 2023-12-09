const loginbtn = document.getElementById('loginbtn');
const signupbtn = document.getElementById('signupbtn');
const loginform = document.getElementById('loginform');
const signupform = document.getElementById('signupform');

loginbtn.addEventListener("click", () => {
    loginform.style.display = "block";
    signupform.style.display = "none";
});

signupbtn.addEventListener("click", () => {
    loginform.style.display = "none";
    signupform.style.display = "block";
});
