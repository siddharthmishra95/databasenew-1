<?php
include '../../config/dbconfig.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByMonth = $_POST['searchByMonth'];
$searchByName = $_POST['searchByName'];
$searchByWorkingDept = $_POST['searchByWorkingDept'];
$searchByGender = $_POST['searchByGender'];
$searchByClient = $_POST['searchByClient'];
$searchByPresentCompany = $_POST['searchByPresentCompany'];
$searchByDepartment = $_POST['searchByDepartment'];
$searchByEmail = $_POST['searchByEmail'];
$searchByContact = $_POST['searchByContact'];


## Search 
$searchQuery = " ";
if($searchByMonth != ''){
    $searchQuery .= " and (data like '%".$searchByMonth."%') ";
}
if($searchByName != ''){
    $searchQuery .= " and (name like '%".$searchByName."%' ) ";
}
if($searchByWorkingDept != ''){
    $searchQuery .= " and (workingdept like '%".$searchByWorkingDept."%') ";
}
if($searchByGender != ''){
    $searchQuery .= " and (uploaded='".$searchByGender."') ";
}
if($searchByClient != ''){
    $searchQuery .= " and (clientname='".$searchByClient."') ";
}
if($searchByPresentCompany != ''){
    $searchQuery .= " and (companyname like '%".$searchByPresentCompany."%') ";
}

if($searchByDepartment != ''){
    $searchQuery .= " and (department like '%".$searchByDepartment."%') ";
}
if($searchByEmail != ''){
    $searchQuery .= " and (email like '%".$searchByEmail."%') ";
}
if($searchByContact != ''){
    $searchQuery .= " and (phone like '%".$searchByContact."%') ";
}
if($searchValue != ''){
	$searchQuery .= " and (
        email like '%".$searchValue."%' or 
        phone like'%".$searchValue."%' or) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from refinery ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from refinery WHERE 1  ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from refinery WHERE  1  ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();



while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"id"=>$row['id'],
            "dat"=>$row['dat'],
            "uploaded"=>$row['uploaded'],
            "clientname"=>$row['clientname'],
            "workingdept"=>$row["workingdept"],
            "erecno"=>$row['erecno'],
            "candidateno"=>$row['candidateno'],
            "applicationno"=>$row['applicationno'],
            "adharcardno"=>$row['adharcardno'],
            "name"=>$row['name'],
            "dob"=>$row['dob'],
            "age"=>$row['age'],
            "fname"=>$row['fname'],
            "mname"=>$row['mname'],
            "maritial"=>$row['maritial'],
            "address"=>$row['address'],
            "peraddress"=>$row['peraddress'],
            "experience"=>$row['experience'],
            "tpexp"=>$row['tpexp'],
            "pexp"=>$row['pexp'],
            "rexp"=>$row['rexp'],
            "cunit"=>$row['cunit'],
            "unit"=>$row['unit'],
            "fexp"=>$row['fexp'],
            "cexp"=>$row['cexp'],
            "companyname"=>$row['companyname'],
            "pcompanyname"=>$row['pcompanyname'],
            "workingfrom"=>$row['workingfrom'],
            "workingto"=>$row['workingto'],
            "designation"=> $row["designation"],
            "qualification"=>$row['qualification'],
            "qualificationtype"=>$row['qualificationtype'],
            "yop"=>$row['yop'],
            "stream"=>$row['stream'],
            "institute"=>$row['institute'],
            "premarks"=>$row['premarks'],
            "cstatus"=>$row['cstatus'],
            "currentsal"=>$row['currentsal'],
            "expectedsal"=>$row['expectedsal'],
            "noticeperiod"=>$row['noticeperiod'],
            "phone"=>$row['phone'],
            "email"=>$row['email'],
            "selected1"=>$row['selected1'],
            "joined1"=>$row['joined1'],
            "status"=>$row['status'],
            "department"=>$row['department'],
    		"resume"=>'<a target="_blank" href="'.$row['resume'].'" height="60" width="75" class="btn btn-warning bt-xs update" />Download</a>',
            "edit"=>'<a href="editrefinery.php?refedit='.$row['id'].'" height="60" width="75" class="btn btn-warning bt-xs update" />Edit</a>',
            
            
    		
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);