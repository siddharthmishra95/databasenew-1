<?php
include '../../../config/dbconfig.php';

if(isset($_POST['deletejoining']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM products WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:../../addjoining.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>