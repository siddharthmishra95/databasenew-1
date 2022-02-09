<?php
include '../../../config/dbconfig.php';

    if(isset($_POST['updatedepartment']))
    {   
        $id = $_POST['update_id'];
        
        $dat = $_POST['dat'];
        $dept_name = $_POST['dept_name'];
        

        $query = "UPDATE dept SET dat='$dat', dept_name='$dept_name' WHERE id='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../../department.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>