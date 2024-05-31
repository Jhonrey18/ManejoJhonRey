<?php 

$usernameError = $emailError = $pnumberError = $passwordError = $cpasswordError = "";

$username = $email = $pnumber = $password = $cpassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(empty($_POST["username"])) {
        
        $usernameError = "Username is required";
        
    } else {
        
        $username = $_POST["username"];
        
    }
    
    if(empty($_POST["email"])) {
        
        $emailError = "Email is required";
        
    } else {
        
        $email = $_POST["email"];
        
    }
    
    if(empty($_POST["pnumber"])) {
        
        $pnumberError = "Phone number is required";
        
    } else {
        
        $pnumber = $_POST["pnumber"];
        
    }
    
    if(empty($_POST["password"])) {
        
        $passwordError = "Password is required";
        
    } else {
        
        $password = $_POST["password"];
        
    }
    
    if(empty($_POST["cpassword"])) {
        
        $cpasswordError = "Confirm password is required";
        
    } else {
        
        $cpassword = $_POST["cpassword"];
        
    }
    
    if($_POST["password"] !== $_POST["cpassword"]) {
        
        $cpasswordError = "Password and Confirm password id not match!";
        
    }
    
    include("connections.php");
    
    if($username && $email && $pnumber && $password && $cpassword) {
        
        $query = mysqli_query(connections, "INSERT INTO signup_tbl(username, email, pnumber, password) VALUES ('$username', '$email', '$pnumber', '$password')");
        
        echo "Success";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="signup">
        
        <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <h1>Sign Up</h1>
            
            <!-- username -->
            
                <div class="input">
                    
                <!-- icon -->
                
                <i class="fa-solid fa-user"></i>
                 
                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                
                <label for="username">Username: </label>
                
                <span class="error"> <?php echo $usernameError ?> </span>
                </div>
                
            
            <!-- email -->
            
                <div class="input">
                
                <!-- icon -->
            
            <i class="fa-solid fa-envelope"></i>
                
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                
                <label for="email">Email: </label>
                
                <span class="error"> <?php echo $emailError ?> </span>
                
                </div>
                
                <!-- number -->
            
                <div class="input">
                
                <!-- icon -->
            
            <i class="fa-solid fa-phone"></i>
                
                <input type="tel" id="pnumber" name="pnumber" pattern="[0-9](4) - [0-9](3) - [0-9](4)" value="<?php echo $pnumber; ?>">
                
                <label for="pnumber">Phone Number: </label>
                
                <span class="error"> <?php echo $pnumberError ?> </span>
                
                </div>
            
            <!-- password -->
            
                <div class="input">
                
                    
            <!-- icon -->
                
            <i class="fa-solid fa-eye show"></i>
            
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                
                <label for="password">Password: </label>
                
                <span class="error"> <?php echo $passwordError ?> </span>
                
                </div>
            
            <!-- confirm password -->
            
                <div class="input">
            
                <input type="password" id="cpassword" name="cpassword" value="<?php echo $cpassword; ?>">
                
                <label for="cpassword">Confirm Password: </label>
                
                <span class="error"> <?php echo $cpasswordError ?> </span>
                
                </div>
            
            <button type="submit" name='submit'>Sign Up</button>
            
            <div class="login">
                
                <p>Already have an account? 
                <a href="login.php">Log In</a></p>
                
            </div>
            
        </form>
        
    </div>
    
    <script src="signup.js"></script>
    
</body>
</html>