<?php
/******************************************ENABLE AND DISABLE DEPARTMENT*********************************************/ 
include '../config/dbconfig.php';
$id = $_GET['id'];
$dept_status = $_GET['dept_status'];

$query = "UPDATE dept set dept_status = $dept_status where id = $id";
mysqli_query($conn, $query);
header('location:department.php');


/******************************************ENABLE AND DISABLE DEPARTMENT*********************************************/ 
?>