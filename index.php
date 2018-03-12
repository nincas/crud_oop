<?php

//requiring the Crud Class
require "./database/crud.php";
$crud = new Crud;

//check if POST is empty or it will execute the save function
if(isset($_POST['add_data'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $input = array('email'=>$email,'name'=>$name,'age'=>$age);
    $crud->Save($input);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <title>Document</title>
</head>
<body>
<br>
    <center><h2>CRUD</h2><center>
<hr>
<div class="container">
    <div class="well well-sm" style="width: 50%;">
        <form method="POST">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required>
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
            <label>Age</label>
            <input type="text" class="form-control" name="age" required><br>
            <input type="submit" class="btn btn-success btn-sm" value="Add" name="add_data">
        </form>
    </div>

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    //load all data from database 
       $data = $crud->Read();
       //loop through the object and printout
       foreach($data as $row){
           echo "<tr>
           <td>".$row->email."</td>
           <td>".$row->name."</td>
           <td>".$row->age."</td>
           <td><a href=\"database/actions/update.php/?id=".$row->id."\" class=\"btn btn-info btn-sm\">Update</a> <a href=\"database/actions/delete.php/?id=".$row->id."\" class=\"btn btn-danger btn-sm\">Delete</a></td>
           </tr>";
       }
    ?>
    </tbody>
    </table>
</div>  
</body>
<script src="./assets/js/jquery.js"></script>
</html>
