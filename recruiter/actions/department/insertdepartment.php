<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
    
    $dat = $_POST['dat'];
    $dept_name = $_POST['dept_name'];


    $query = "INSERT INTO dept (`dat`,`dept_name`) VALUES ('$dat','$dept_name')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../department.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>