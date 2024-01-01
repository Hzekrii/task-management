const loginbtn = document.getElementById('loginbtn');
const signupbtn = document.getElementById('signupbtn');
const loginform = document.getElementById('loginform');
const signupform = document.getElementById('signupform');

loginbtn.addEventListener("click", () => {
    loginform.style.display = "block";
    signupform.style.display = "none";
    loginbtn.classList.add("btn-primary");
    signupbtn.classList.remove("btn-primary");
    signupbtn.classList.add('btn-secondary');
    loginbtn.classList.remove('btn-secondary');

});

signupbtn.addEventListener("click", () => {
    loginform.style.display = "none";
    signupform.style.display = "block";
    loginbtn.classList.add("btn-secondary");
    signupbtn.classList.remove("btn-secondary");
    signupbtn.classList.add('btn-primary');
    loginbtn.classList.remove('btn-primary');
});
