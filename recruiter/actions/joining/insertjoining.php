<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
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
  if ($_FILES['resume']['name'])
  {
      move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $_FILES['resume']['name']);
      $resume_des = "uploads/" . $_FILES['resume']['name'];
  }
  


  
    $query = "INSERT INTO products ( `dat`,`data`,`datoffer`,`month`,`uploaded`,`empid`,`candidatename`,`selectedcomp`,`contactper`,`precomp`,`dept`,`sal`,`contact`,`doj`,`currentadd`,`peradd`,`status`,`remarks`,`resume`)VALUES('$dat', '$data', '$datoffer', '$month', '$uploaded',' $empid', '$candidatename', '$selectedcomp', '$contactper','$precomp','$dept','$sal','$contact','$doj','$currentadd','$peradd','$status','$remarks','$resume_des')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../addjoining.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>