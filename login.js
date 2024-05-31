const showPassword = document.querySelector("#showpassword");

const passwordField = document.querySelector("#password");

showPassword.addEventListener("click", () => {
    if(password.type === "password") {
    
        password.type = "text";
        showPassword.classList.replace("fa-eye", "fa-eye-slash");
        
    } else {
        
        password.type = "password";
        showPassword.classList.replace("fa-eye-slash", "fa-eye");
        
    }
    
})
