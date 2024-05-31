const showPassword = document.querySelector(".show");

password = document.querySelector("#password");

cpassword = document.querySelector("#cpassword");

showPassword.addEventListener("click", () => {
    if((password.type === "password") && (cpassword.type === "password")) {
    
        password.type = "text";
        cpassword.type = "text";
        showPassword.classList.replace("fa-eye", "fa-eye-slash");
        
    } else {
        
        password.type = "password";
        cpassword.type = "password";
        showPassword.classList.replace("fa-eye-slash", "fa-eye");
        
    }
    
})
