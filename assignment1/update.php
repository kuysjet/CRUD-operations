
<?php

include 'conn.php';



    $id = $_GET['updateid'];
    $sql = "SELECT * FROM student_list WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    


    if(isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $department = $_POST['department'];
        
    $sql = "UPDATE student_list set id=$id, firstname='$fname', lastname='$lname', department='$department' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        //echo "Updated Successfully!";
        header ('location: display.php');
    }else {
        die(mysqli_error($conn));
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3 text-center">
        <h2>PHP CRUD OPERATION</h2>
    </div>
    <br>
    <hr>
    
    <div class="container mt-3">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label"><b>Firstname</b></label>
                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $row['firstname'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Lastname</b></label>
                <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lastname'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Department</b></label>
                <input type="text" class="form-control" name="department" id="department" value="<?php echo $row['department'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btn" name="submit">Update</button>
        </form>
    </div>

</body>

</html>