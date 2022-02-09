<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
    $dat=$_POST['dat'];
    $data=$_POST['data'];
    $uploaded=$_POST['uploaded'];
    $clientname=$_POST['clientname'];
    $adharcardno=$_POST['adharcardno'];
    $name=$_POST['name'];
    $cunit=$_POST['cunit'];
    $companyname=$_POST['companyname'];
    $qualification=$_POST['qualification'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $department=$_POST['department'];
    

  if ($_FILES['resume']['name'])
  {
      move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $_FILES['resume']['name']);
      $resume_des = "uploads/" . $_FILES['resume']['name'];
  }
  
    $query = "INSERT INTO refinery ( `dat`,`data`,`uploaded`,`clientname`,`adharcardno`,`name`,`cunit`,`companyname`,`qualification`,`phone`,`email`,`status`,`department`,`resume`)VALUES('$dat','$data','$uploaded','$clientname','$adharcardno','$name','$cunit','$companyname','$qualification','$phone','$email','$status','$department','$resume_des')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../addrefinerycandidate.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>