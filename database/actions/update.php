<?php
require "../crud.php";
//initialize crud class
$crud = new Crud();

//get method
$id = $_GET['id'];

//fetch data base on getid method
$get_data = $crud->loadData($id);

//if update post request do this
if(isset($_POST['update_data'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $update_data = (object)  array('id'=>$get_data->id,'email'=>$email,'name'=>$name,'age'=>$age);
    $crud->Update($update_data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <title>Document</title>
</head>
<body>
<!--- output the data -->
<div class="container">
<center>
<div class="well well-sm" style="width: 50%;">
    <form method="POST">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="<?php  echo $get_data->name; ?>" required>
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $get_data->email; ?>" required>
        <label>Age</label>
        <input type="text" class="form-control" name="age" value="<?php echo $get_data->age; ?>" required><br>
        <input type="submit" class="btn btn-primary btn-sm" value="Update" name="update_data">
    </form>
</div>
</center>
</div>

</body>
</html>