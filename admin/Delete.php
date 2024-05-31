<?php

include("connections.php");

if(isset($_GET['deleteid'])) {

    $id = $_GET['deleteid'];
    
    $query = "DELETE FROM list_tbl WHERE id = $id";
    
    $result = mysqli_query($connections, $query);
    
    if($result) {
            
            echo "<script> alert('Deleted! Please procced'); window.location.href = 'table.php'; </script>";
            
        } else {
        
        
            echo "<script> alert('Please! Try again'); </script>";
            
        }
    
}

?>
