<?php
include '../../../config/dbconfig.php';

    if(isset($_POST['updaterrefinery']))
    {   
        $id = $_POST['update_id'];
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
        $ectc=$_POST['ectc'];
        $companyname=$_POST['companyname'];
        $pcompanyname=$_POST['pcompanyname'];
        $workingfrom=$_POST['workingfrom'];
        $workingto=$_POST['workingto'];
        $clocation=$_POST['clocation'];
        $designation=$_POST['designation'];
        $gctc=$_POST['gctc'];
        $relocate=$_POST['relocate'];
        $qualification=$_POST['qualification'];
        $qualificationtype=$_POST['qualificationtype'];
        $yop=$_POST['yop'];
        $stream=$_POST['stream'];
        $institute=$_POST['institute'];
        $dsharing=$_POST['dsharing'];
        $premarks=$_POST['premarks'];
        $cstatus=$_POST['cstatus'];
        $currentsal=$_POST['currentsal'];
        $fctc=$_POST['fctc'];
        $expectedsal=$_POST['expectedsal'];
        $noticeperiod=$_POST['noticeperiod'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $selected1=$_POST['selected1'];
        $joined1=$_POST['joined1'];
        $status=$_POST['status'];
        $source=$_POST['source'];
        $department=$_POST['department'];
 
        $oldresume=$_POST['oldresume'];
		    if(isset($_FILES['resume']['name'])&&($_FILES['resume']['name']!="")){
        $newresume="uploads/".$_FILES['resume']['name'];
        unlink($oldresume);
        move_uploaded_file($_FILES['resume']['tmp_name'], $newresume);
        }
        else {
        $newresume=$oldresume;
        }
       
        

        $query = "UPDATE refinery SET dat='$dat', data='$data', uploaded='$uploaded', clientname='$clientname', workingdept='$workingdept', positionname='$positionname', erecno='$erecno', candidateno='$candidateno',applicationno='$applicationno',adharcardno='$adharcardno', name='$name',cvposition='$cvposition',dob='$dob',age='$age', fname='$fname', mname='$mname', maritial='$maritial',address='$address',peraddress='$peraddress', experience='$experience',tpexp='$tpexp',pexp='$pexp', rexp='$rexp', cunit='$cunit', unit='$unit',fexp='$fexp',cexp='$cexp',ectc='$ectc', companyname='$companyname',pcompanyname='$pcompanyname',workingfrom='$workingfrom',workingto='$workingto', clocation='$clocation',designation='$designation',gctc='$gctc',relocate='$relocate',qualification='$qualification', qualificationtype='$qualificationtype', yop='$yop', stream='$stream',institute='$institute',dsharing='$dsharing', premarks='$premarks',cstatus='$cstatus',currentsal='$currentsal', fctc='$fctc',expectedsal='$expectedsal',noticeperiod='$noticeperiod', phone='$phone', email='$email', selected1='$selected1',joined1='$joined1',status='$status', source='$source',department='$department',resume='$newresume' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../../addrefinerycandidate.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>