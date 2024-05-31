<?php
// Include the connections.php file
include("connections.php");

$emailError = $passwordError = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailError = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordError =  "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($email && $password) {
        // The database connection is already included from connections.php

        $check_email = mysqli_query($connections, "SELECT * FROM users WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if ($check_email_row > 0) {
            $row = mysqli_fetch_assoc($check_email);
            $db_password = $row["password"];
            $db_account_type = $row["account_type"];

            if ($db_password === $password) {
                if ($db_account_type == "admin") {
                    // Redirect to admin page
                    header("Location: admin.php");
                    exit; // Redirecting, so stop further execution
                } else {
                    // Redirect to user page
                    header("Location: user.php");
                    exit; // Redirecting, so stop further execution
                }
            } else {
                $passwordError = "Password is incorrect";
            }
        } else {
            $emailError = "Email is not registered!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</head>
<body>
    <div class="login">
        
        <form class="" method="post" id="form" acton="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return submitForm(this);">
            
            <h1>Log In</h1>
            
            <!-- Email -->
            
            <div class="input">
            
            <!-- icon -->
            
            <i class="fa-solid fa-envelope"></i>
            
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"> <br>
            <label for="email">Email: </label>
           
            
            <span class="error"> <?php echo $emailError ?></span>
            
            </div>

            <!-- Password -->
            
            <div class="input">
                
            <!-- icon -->
                
            <i class="fa-solid fa-eye" id="showpassword"></i>
                
            <input type="password" id="password" name="password" value="<?php echo $password; ?>"> <br>
            <label for="password">Password: </label>
            
            <span class="error"> <?php echo $passwordError ?></span>
            
            </div>
            
            <div class="checkbox">
                
                <label> <input type="checkbox"> Remember me? </label>
                
                <a href="forget.php">Forget password</a>
                
            </div>
            
            <!-- button -->

            <button type="submit" name='submit' class="submit">Log In</button>
            
            <!-- Sign Up -->
            
            <div class="signup">
                
                <p>Haven't an account? 
                <a href="signup.php">Sign Up</a> </p>
                
            </div>
            
        </form>
        
    </div>
    
    <script src="login.js"></script>
</body>
</html>