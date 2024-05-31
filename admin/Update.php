<?php 

$nameError = $emailError = $addressError = $phoneError = $shiftError = $shift_startError = $shift_endError = "";

$name = $email = $address = $phone = $shift = $shift_start = $shift_end = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(empty($_POST["name"])) {
        
        $nameError = "Name is required";
        
    } else {
        
        $name = $_POST["name"];
        
    }
    
    if(empty($_POST["email"])) {
        
        $emailError = "Email is required";
        
    } else {
        
        $email = $_POST["email"];
        
    }
    
    if(empty($_POST["address"])) {
        
        $addressError = "Address is required";
        
    } else {
        
        $location = $_POST["address"];
        
    }
    
    if(empty($_POST["phone"])) {
        
        $phoneError = "Phone number is required";
        
    } else {
        
        $phone = $_POST["phone"];
        
    }
    
    if(empty($_POST["shift"])) {
        
        $shiftError = "Shift is required";
        
    } else {
        
        $shift = $_POST["shift"];
        
    }
    
    if(empty($_POST["shift_start"])) {
        
        $shift_startError = "This is required";
        
    } else {
        
        $shift_start = $_POST["shift_start"];
        
    }

    if(empty($_POST["shift_end"])) {
        
        $shift_endError = "This is required";
        
    } else {
        
        $shift_end = $_POST["shift_end"];
        
    }
}

include("connections.php");

$id = $_GET['updateid'];

$query = "SELECT * FROM list_tbl WHERE id='$id'";

$result = mysqli_query($connections, $query);

$row = mysqli_fetch_assoc($result);

$name = $row['Name'];
$email = $row['Email'];
$address = $row['Address'];
$phone = $row['Phone'];
$shift = $row['Shift'];
$shift_start = $row['Shift_Start'];
$shift_end = $row['Shift_End'];

if(isset($_POST['update'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $shift = $_POST['Shift'];
    $shift_start = $_POST['Shift_Start'];
    $shift_end = $_POST['Shift_End'];

    $query = "UPDATE list_tbl SET name='$name', email='$email', address='$address', phone='$phone', shift='$shift', shift_start='$shift_start', shift_end='shift_end' WHERE id='$id'";

    $result = mysqli_query($connections, $query);

    if($result) {
    
        echo "<script> alert('Successfully Please procced'); window.location.href = 'table.php'; </script>";
        
    } else {
    
        echo "<script> alert('Please! Try again'); </script>";
        
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="table1.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert/jquery-3.7.1.min.js"></script>
    <script src="sweetalert/sweetalert2.all.min.js"></script>
    <script src="sweetalert/sweetalert2.min.js"></script>
    <title>Page title</title>
</head>
<body>
    <div class="card">
        <div class="table-content">
            <section class="table-head">
                <h2>Shift and Scheduling</h2>
            </section>

            <section class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th>Shift Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Type of Shift</th>
                            <th>Shift Start</th>
                            <th>Shift End</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- table list -->
                        <?php
                        $query = "SELECT * FROM list_tbl";
                            
                            $result = mysqli_query($connections, $query);
                            
                            if($result) {
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $id = $row['Id'];
                                    $name = $row['Name'];
                                    $email = $row['Email'];
                                    $address = $row['Address'];
                                    $phone = $row['Phone'];
                                    $shift = $row['Shift'];
                                    $shift_start = $row['Shift_Start'];
                                    $shift_end = $row['Shift_End'];

                                    
                                    echo '<tr>
                            
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$address.'</td>
                                <td>'.$phone.'</td>
                                <td>'.$shift.'</td>
                                <td>'.$shift_start.'</td>
                                <td>'.$shift_end.'</td>
                                <td> 
                                
                                    
                                    <button type="button" onclick="toggleView()" class="view" name="view" id="view"><a href="view.php?viewid='.$id.'">View</a></button>
                                        
                                    <button type="button" onclick="toggleUpdate()" class="update" name="update" id="update"><a href="update.php?updateid='.$id.'">Update</a></button>    
                                    
                                    <button type="button" class="delete" name="delete"><a href="delete.php?deleteid='.$id.'" class="btn-del">Delete</a></button>
                                    
                                    </div>
                                
                                </td>
                            
                            </tr>';
                                    
                                }
                                
                            }
                                                    
                            ?>
                    </tbody>
                </table>
            </section>

            <div class="add-list">
            
                <input type="checkbox" class="add" id="click">
                <label for="click" class="add">Add Employee</label>
            
                <div class="modal">
                    <div class="modal-title">
                        <h2>Fill up form</h2>
                        <label for="click"><i class="fa-solid fa-x"></i></label>
                    </div>
            
                    <form id="addForm" action="#" class="" method="post">
                        <div class="input">
                            <input type="text" name="name" id="name" placeholder="Enter your name">
                        </div>
                    
                        <div class="input">
                            <input type="email" name="email" id="email" placeholder="Enter your email">
                        </div>
                    
                        <div class="input">
                            <input type="text" name="address" id="address" placeholder="Enter your address">
                        </div>
                    
                        <div class="input">
                            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
                        </div>

                        <div class="input">
                            <select class="option" name="shift" id="shift">
                                <option value="choose">Choose</option>
                                <option value="Night">Night</option>
                                <option value="Day">Day</option>
                            </select>
                        </div>

                        <div class="input">
                            <input type="datetime-local" name="shift_start" id="shift_start" placeholder="">
                        </div>

                        <div class="input">
                            <input type="datetime-local" name="shift_end" id="shift_end" placeholder="">
                        </div>
                    
                        <!-- button -->
                        <button type="submit" class="update" name="update" id="update">Submit</button>

                    </form>
                </div>
            </div>

                <!-- view modal-->
                
                <div class="view-modal" id="view-modal">
                    <div class="view-content">
                        <div class="close-view" onclick="toggleView()">&times;</div>
                        <h2>View Employee Details</h2>
                        <form id="viewForm" action="#" class="" method="post">
                            <div class="input">
                                <input type="text" name="name" id="view_name" value="<?php echo $name; ?>" readonly>
                            </div>
                        
                            <div class="input">
                                <input type="email" name="email" id="view_email" value="<?php echo $email; ?>" readonly>
                            </div>
                                
                            <div class="input">
                                <input type="text" name="address" id="view_address" value="<?php echo $address; ?>" readonly>                                </div>
                                
                            <div class="input">
                                <input type="tel" name="phone" id="view_phone" value="<?php echo $phone; ?>" readonly>
                            </div>
                            
                            <div class="input">
                                <input type="text" name="shift" id="view_shift" value="<?php echo $shift; ?>" readonly>
                            </div> 
                            
                            <div class="input">
                                <input type="datetime-local" name="shift_start" id="shift_start" value="<?php echo $shift_start; ?>" readonly>
                            </div>

                            <div class="input">
                                <input type="datetime-local" name="shift_end" id="shift_end" value="<?php echo $shift_end; ?>" readonly>
                            </div>

                        </form>     
                    </div>
                </div>
                
                <!-- update modal -->
                    
                <div class="update-modal" id="update-modal">
                    <div class="update-content">
                        <div class="close-update" onclick="toggleUpdate()">&times;</div>
                        <h2>Update form</h2>
                        <form id="updateForm" class="" method="post">
                            <div class="input">
                                <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $name; ?>">
                            </div>

                            <div class="input">
                                <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>">
                            </div>
                        
                            <div class="input">
                                <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>">
                            </div>
                    
                            <div class="input">
                                <input type="text" name="address" id="address" placeholder="Enter your address" value="<?php echo $address; ?>">
                            
                            </div>
                        
                            <div class="input">
                                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>">
                            </div>
                        
                            <div class="input">
                                <select class="option" name="shift" id="shift">
                                    <option value="choose">Shift</option>
                                    <option value="night" <?php if($gender == 'night') echo 'selected'; ?>>Night</option>
                                    <option value="day" <?php if($gender == 'day') echo 'selected'; ?>>Day</option>
                                </select>
                            </div>

                            <div class="input">
                                <input type="datetime-local" name="shift_start" id="shift_start" value="<?php echo $shift_start; ?>">
                            </div>

                            <div class="input">
                                <input type="datetime-local" name="shift_end" id="shift_end" value="<?php echo $shift_start; ?>">
                            </div>
                            
                            <!-- button -->
                            <button type="button" class="submit" onclick="submitUpdateForm()">Update</button>
                    
                        </form>   
                    </div>
                </div>

        </div>
    </div>

    <script src="table.js"></script>
                        
</body>
</html>