<?php
include '../../../config/dbconfig.php';

    if(isset($_POST['updatejoining']))
    {   
        $id = $_POST['update_id'];
        $dat = $_POST['dat'];
        $data = $_POST['data'];
        $datoffer = $_POST['datoffer'];
        $month = $_POST['month'];
        $uploaded = $_POST['uploaded'];
        $empid = $_POST['empid'];
        $candidatename = $_POST['candidatename'];
        $selectedcomp = $_POST['selectedcomp'];
        $contactper = $_POST['contactper'];
        $precomp = $_POST['precomp'];
        $dept = $_POST['dept'];
        $sal = $_POST['sal'];
        $contact = $_POST['contact'];
        $doj = $_POST['doj'];
        $currentadd = $_POST['currentadd'];
        $peradd = $_POST['peradd'];
        $status = $_POST['status'];
        $remarks = $_POST['remarks'];
        $oldresume=$_POST['oldresume'];
		    if(isset($_FILES['resume']['name'])&&($_FILES['resume']['name']!="")){
        $newresume="uploads/".$_FILES['resume']['name'];
        unlink($oldresume);
        move_uploaded_file($_FILES['resume']['tmp_name'], $newresume);
        }
        else {
        $newresume=$oldresume;
        }
        
        

        $query = "UPDATE products SET dat='$dat', data='$data', datoffer='$datoffer', month='$month', uploaded='$uploaded', empid='$empid', candidatename='$candidatename', selectedcomp='$selectedcomp',contactper='$contactper', precomp='$precomp',dept='$dept',sal='$sal',contact='$contact',doj='$doj',currentadd='$currentadd',peradd='$peradd', status='$status',remarks='$remarks',resume='$newresume' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../../addjoining.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>