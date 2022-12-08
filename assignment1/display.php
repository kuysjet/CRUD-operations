<?php

include 'conn.php';

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
    <div class="container my-5">
        <button class="btn btn-primary mb-3"><a href="create.php" class="text-light text-decoration-none">ADD Student</a></button>
        <table class="table table-light text-center">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">FIRSTNAME</th>
                <th scope="col">LASTNAME</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            $sql = "SELECT * FROM student_list";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fname = $row['firstname'];
                    $lname = $row['lastname'];
                    $department = $row['department'];
                    echo '
                          <tr>
                          <th>'.$id.'</th>
                          <td>'.$fname.'</td>
                          <td>'.$lname.'</td>
                          <td>'.$department.'</td>
                          <td>
                          <button class="btn btn-primary"><a href="update.php?updateid='.$id.' " class="text-light text-decoration-none">UPDATE</a></button>
                          <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.' " class="text-light text-decoration-none">DELETE</a></button>
                          </td>
                          </tr>';           
                }
                $no++;
            }
            ?>
                

        </table>
    </div>
</body>
</html>