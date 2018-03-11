<?php
//require the class to use the functionality
require "../crud.php";
$crud = new Crud();
$id = $_GET['id'];

//call delete function
$crud->Delete($id);
?>