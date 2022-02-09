<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
    $dat=$_POST['dat'];
    $data=$_POST['data'];
    $uploaded=$_POST['uploaded'];
    $clientname=$_POST['clientname'];
    $workingdept=$_POST['workingdept'];
    $positionname=$_POST['positionname'];
    $erecno=$_POST['erecno'];
    $candidateno=$_POST['candidateno'];
    $applicationno=$_POST['applicationno'];
    $adharcardno=$_POST['adharcardno'];
    $name=$_POST['name'];
    $cvposition=$_POST['cvposition'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $maritial=$_POST['maritial'];
    $address=$_POST['address'];
    $peraddress=$_POST['peraddress'];
    $experience=$_POST['experience'];
    $tpexp=$_POST['tpexp'];
    $pexp=$_POST['pexp'];
    $rexp=$_POST['rexp'];
    $cunit=$_POST['cunit'];
    $unit=$_POST['unit'];
    $fexp=$_POST['fexp'];
    $cexp=$_POST['cexp'];
    $companyname=$_POST['companyname'];
    $pcompanyname=$_POST['pcompanyname'];
    $workingfrom=$_POST['workingfrom'];
    $workingto=$_POST['workingto'];
    $clocation=$_POST['clocation'];
    $designation=$_POST['designation'];
    $gctc=$_POST['gctc'];
    $fctc=$_POST['fctc'];
    $ectc=$_POST['ectc'];
    $qualification=$_POST['qualification'];
    $qualificationtype=$_POST['qualificationtype'];
    $yop=$_POST['yop'];
    $stream=$_POST['stream'];
    $institute=$_POST['institute'];
    $dsharing=$_POST['dsharing'];
    $premarks=$_POST['premarks'];
    $cstatus=$_POST['cstatus'];
    $experience=$_POST['experience'];
    $currentsal=$_POST['currentsal'];
    $expectedsal=$_POST['expectedsal'];
    $noticeperiod=$_POST['noticeperiod'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $selected1=$_POST['selected1'];
    $joined1=$_POST['joined1'];
    $status=$_POST['status'];
    $source=$_POST['source'];
    $department=$_POST['department'];
    

  if ($_FILES['resume']['name'])
  {
      move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $_FILES['resume']['name']);
      $resume_des = "uploads/" . $_FILES['resume']['name'];
  }
  
    $query = "INSERT INTO refinery ( `dat`,`data`,`uploaded`,`clientname`,`workingdept`,`positionname`,`erecno`,`candidateno`,`applicationno`,`adharcardno`,`name`,`cvposition`,`dob`,`age`,`fname`,`mname`,`maritial`,`address`,`peraddress`,`experience`,`tpexp`,`pexp`,`rexp`,`cunit`,`unit`,`fexp`,`cexp`,`companyname`,`pcompanyname`,`workingfrom`,`workingto`,`clocation`,`designation`,`gctc`,`fctc`,`ectc`,`qualification`,`qualificationtype`,`yop`,`stream`,`institute`,`dsharing`,`premarks`,`cstatus`,`currentsal`,`expectedsal`,`noticeperiod`,`phone`,`email`,`selected1`,`joined1`,`status`,`source`,`department`,`resume`)VALUES('$dat','$data','$uploaded','$clientname','$workingdept','$positionname','$erecno','$candidateno','$applicationno','$adharcardno','$name','$cvposition','$dob','$age','$fname','$mname','$maritial','$address','$peraddress','$experience','$tpexp','$pexp','$rexp','$cunit','$unit','$fexp','$cexp','$companyname','$pcompanyname','$workingfrom','$workingto','$clocation','$designation','$gctc','$fctc','$ectc','$qualification','$qualificationtype','$yop','$stream','$institute','$dsharing','$premarks','$cstatus','$currentsal','$expectedsal','$noticeperiod','$phone','$email','$selected1','$joined1','$status','$source','$department','$resume_des')";
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