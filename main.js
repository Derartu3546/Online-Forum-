const registerForm = document.getElementById('registerForm');
const loginForm = document.getElementById('loginForm');
const registerButton = document.getElementById('registerButton');
const loginButton = document.getElementById('loginButton');

registerButton.addEventListener('click', () => {
    loginForm.style.display = 'none'; 
    registerForm.style.display = 'block'; 
});

loginButton.addEventListener('click', () => {
    registerForm.style.display = 'none'; 
    loginForm.style.display = 'block'; 
});
