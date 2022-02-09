<?php
/******************************************ENABLE AND DISABLE CLIENTS*********************************************/ 
include '../config/dbconfig.php';
$id = $_GET['id'];
$client_status = $_GET['client_status'];

$query = "UPDATE clients set client_status = $client_status where id = $id";
mysqli_query($conn, $query);
header('location:clients.php');

/******************************************ENABLE AND DISABLE CLIENTS*********************************************/ 
?>