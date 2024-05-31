<?php 

$connections = mysqli_connect("localhost:3307", "root", "", "mydatabase");

if(mysqli_connect_errno()) {
    
    echo "Failed to connect in Mysql" .mysqli_connect_errno();
    
} else {
    
}

?>