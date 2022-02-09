<?php
include('../shared/header.php');
session_start();
if($_SESSION['name']=='')
  {
     header('location:../index.php');
  }
?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include('../shared/topbar.php') ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include('../shared/sidebar.php') ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php
          $query = mysqli_query($conn,"SELECT * FROM registration WHERE name='".$_SESSION['name']."'");
          while($row = mysqli_fetch_array($query)) {
          $role = $row['role'];
          }
          if($role == 'SuperAdmin') { ?>

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-account-star text-danger icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Number Of Candidate </p>
                                            <div class="fluid-container">
                                                <?php 
                            $currentDateTime = date('d-M-Y');
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `crud` WHERE data = '$currentDateTime' ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Added Today
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class=" mdi mdi-account-check text-warning icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">No. of Candidate </p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` from products where MONTH(doj)=MONTH(now()) and YEAR(doj)=YEAR(now()) and status = 'YTJ'  ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Joining this
                                        Month
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Candidates Offered</p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` from products where MONTH(datoffer)=MONTH(now()) and YEAR(datoffer)=YEAR(now()) ");
                        $row = mysqli_fetch_array($result);
                        $result1 = mysqli_query($conn, "SELECT SUM(sal) AS `Total Salary` FROM products WHERE MONTH(datoffer)=MONTH(now()) and YEAR(datoffer)=YEAR(now()) ");
                        $row1 = mysqli_fetch_array($result1);
                        $count = $row['count'];
                        $count1 = $row1['Total Salary']
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count; ?>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-currency-inr mr-1" aria-hidden="true"></i>
                                        <?php echo $count1; ?> LPA<br />
                                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> This Month
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Total Candidate</p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `crud` ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>Present In Database
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo BASE_URL; ?>/assets/images/dashboard/circle.svg" class="card-img-absolute"
                    alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Weekly Sales <i
                      class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">$ 15,0000</h2>
                  <h6 class="card-text">Increased by 60%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo BASE_URL; ?>/assets/images/dashboard/circle.svg" class="card-img-absolute"
                    alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Weekly Orders <i
                      class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">45,6334</h2>
                  <h6 class="card-text">Decreased by 10%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo BASE_URL; ?>/assets/images/dashboard/circle.svg" class="card-img-absolute"
                    alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Visitors Online <i
                      class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">95,5741</h2>
                  <h6 class="card-text">Increased by 5%</h6>
                </div>
              </div>
            </div> -->
                    </div>

                    <div class="col-12 grid-margin">
                        <div class="card card-statistics">
                            <div class="row">
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i
                                                class="mdi mdi-account-multiple-outline text-info mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Not Join Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='NJ'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i
                                                class="mdi mdi-checkbox-marked-circle-outline text-warning mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Yet To Join Candidates</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='YTJ' ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i class="mdi mdi-trophy-outline text-success mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Total Joined Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='Joined' ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i class="mdi mdi-target text-danger mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Total Left Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='Left'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Today
                                    Candidate
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Paris')">Today Requirement
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Today Joining Candidate
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Duplicate')">Today Duplicate
                                    Candidate Entry</button>
                            </div>

                            <div id="London" class="tabcontent">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Recent Candidate Entry</h4>
                                        <div class="table-responsive">
                                            <?php   
                              $limit = 10;
                              if(isset($_GET['page'])){
                                $page = $_GET['page'];
                              }else{
                                $page = 1;
                              }
                              $offset = ($page - 1) * $limit;
                              date_default_timezone_set('Asia/Kolkata');
                              $currentDateTime = date('d-M-Y');
                              $sql = "SELECT * from crud where data='$currentDateTime' ORDER BY id DESC LIMIT {$offset},{$limit}";
                              $result = mysqli_query($conn, $sql ) or die("Query failed");
                              if(mysqli_num_rows($result) > 0){
                      ?>
                                            <table id="example"
                                                class="table table-striped table-bordered display responsive nowrap"
                                                cellspacing="0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Date Of Working</th>
                                                        <th>Employee Name</th>
                                                        <th>Client Name</th>
                                                        <th>Working Department</th>
                                                        <th>Candidate Name</th>
                                                        <th>Present Company</th>
                                                        <th>Designation</th>
                                                        <th>Qualification</th>
                                                        <th>Total Experience</th>
                                                        <th>Current Salary</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Current Location</th>
                                                        <th>Permanent Location</th>
                                                        <th>Contact No.</th>
                                                        <th>E-mail</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Candidate Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $result->fetch_assoc()) {
                                                    # code...
                          ?>
                                                    <tr>
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['dat']; ?></td>
                                                        <td><?= $row['uploaded']; ?></td>
                                                        <td><?= $row['clientname']; ?></td>
                                                        <td><?= $row['workingdept']; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['companyname']; ?></td>
                                                        <td><?= $row['designation']; ?></td>
                                                        <td><?= $row['qualification']; ?></td>
                                                        <td><?= $row['experience']; ?></td>
                                                        <td><?= $row['currentsal']; ?></td>
                                                        <td><?= $row['expectedsal']; ?></td>
                                                        <td><?= $row['noticeperiod']; ?></td>
                                                        <td><?= $row['address']; ?></td>
                                                        <td><?= $row['peraddress']; ?></td>
                                                        <td><?= $row['phone']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td><?= $row['remarks']; ?></td>
                                                        <td><?= $row['department']; ?></td>


                                                        <td>
                                                            <a href="details.php?details=<?= $row['id']; ?>"
                                                                class="btn btn-primary p-2"><i
                                                                    class="mdi mdi-eye"></i>Details</a>|
                                                            <a href="editauto.php?edit=<?= $row['id']; ?>"
                                                                class="btn btn-success p-2"><i
                                                                    class="mdi mdi-pencil-box-outline"
                                                                    aria-hidden="true"></i>Edit</a>
                                                            <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                class="btn btn-info p-2"><i class="mdi mdi-table-edit"
                                                                    aria-hidden="true"></i>Shortlist</a>
                                                            <a href="<?php echo $row['resume']; ?>"
                                                                download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                class="btn btn-danger p-2"><i class="mdi mdi-file-pdf"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="in.php?in=<?= $row['id']; ?>"
                                                                class="btn btn-secondary p-2"><i
                                                                    class="mdi mdi-paperclip" aria-hidden="true"></i>
                                                                Create Logo</a>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                            <?php } 
                            date_default_timezone_set('Asia/Kolkata');
                            $currentDateTime = date('d-M-Y');
                            $sql1 = "SELECT * from crud where data='$currentDateTime'";
                            $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                            if(mysqli_num_rows($result1) > 0) {
                              $total_records = mysqli_num_rows($result1);
                              $total_page = ceil($total_records / $limit);
                              echo '<nav>
                              <ul class="pagination rounded-flat pagination-success">';
                              if($page > 1){
                                echo '<li class="page-item"><a class="page-link" href="dashboard.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                              }
                            
                              for($i = 1; $i <= $total_page; $i++) {
                                if($i == $page){
                                  $active = "active";
                                }else{
                                  $active = "";
                                }
                                echo '<li class="page-item '.$active.' "><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                              }
                              if($total_page > $page){
                                echo '<li class="page-item"><a class="page-link" href="dashboard.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                              }
                            
                              echo '</ul>
                              </nav>';
                            }
                          ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Paris" class="tabcontent">
                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Today Requirement Entry</h4>
                                                <div class="table-responsive">
                                                    <?php   
                              $limit = 10;
                              if(isset($_GET['page'])){
                                $page = $_GET['page'];
                              }else{
                                $page = 1;
                              }
                              $offset = ($page - 1) * $limit;
                              date_default_timezone_set('Asia/Kolkata');
                              $currentDateTime = date('d-M-Y');
                              $sql = "SELECT * from requirement where data='$currentDateTime' ORDER BY id DESC LIMIT {$offset},{$limit}";
                              $result = mysqli_query($conn, $sql ) or die("Query failed");
                              if(mysqli_num_rows($result) > 0){
                          ?>
                                                    <table id="example"
                                                        class="table table-striped table-bordered display responsive nowrap"
                                                        cellspacing="0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Job Id</th>
                                                                <th>Requirement Date</th>
                                                                <th>Month</th>
                                                                <th>Employee Name</th>
                                                                <th>Company Name</th>
                                                                <th>Department/ Designation</th>
                                                                <th>Salary</th>
                                                                <th>Repeat</th>
                                                                <th>Status</th>
                                                                <th>No Of Position</th>
                                                                <th>Req Attachment</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = $result->fetch_assoc()) {?>
                                                            <tr>
                                                                <td><?= $row['jobid']; ?></td>
                                                                <td><?= $row['reqdate']; ?></td>
                                                                <td><?= $row['month']; ?></td>
                                                                <td><?= $row['uploaded']; ?></td>
                                                                <td><?= $row['companyname']; ?></td>
                                                                <td><?= $row['dept']; ?></td>
                                                                <td><?= $row['sal']; ?></td>
                                                                <td><?= $row['repeat']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['nop']; ?></td>
                                                                <td><?= $row['req']; ?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php } 
                            date_default_timezone_set('Asia/Kolkata');
                            $currentDateTime = date('d-M-Y');
                            $sql1 = "SELECT * from requirement where data='$currentDateTime'";
                            $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                            if(mysqli_num_rows($result1) > 0) {
                              $total_records = mysqli_num_rows($result1);
                              $total_page = ceil($total_records / $limit);
                              echo '<nav>
                              <ul class="pagination rounded-flat pagination-success">';
                              if($page > 1){
                                echo '<li class="page-item"><a class="page-link" href="dashboard.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                              }
                            
                              for($i = 1; $i <= $total_page; $i++) {
                                if($i == $page){
                                  $active = "active";
                                }else{
                                  $active = "";
                                }
                                echo '<li class="page-item '.$active.' "><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                              }
                              if($total_page > $page){
                                echo '<li class="page-item"><a class="page-link" href="dashboard.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                              }
                            
                              echo '</ul>
                              </nav>';
                            }
                          ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Tokyo" class="tabcontent">
                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Recent Joining Candidate Entry</h4>
                                                <div class="table-responsive">
                                                    <?php 
                                                       
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $currentDateTime = date('d-M-Y');
                                                        $result = mysqli_query($conn, "SELECT * FROM products where data='$currentDateTime' " );
                                                    ?>
                                                    <table id="example"
                                                        class="table table-striped table-bordered display responsive nowrap"
                                                        cellspacing="0" style="width:100%">
                                                        <thead>
                                                            <tr>

                                                                <th>Date Offer</th>
                                                                <th>Month</th>
                                                                <th>Employee Name</th>
                                                                <th>Candidate Name</th>
                                                                <th>Company Name</th>
                                                                <th>Contact Person</th>
                                                                <th>Previous Company</th>
                                                                <th>Department</th>
                                                                <th>Current Salary</th>
                                                                <th>Contact No</th>
                                                                <th>D.O.J</th>
                                                                <th>Candidate Present Address</th>
                                                                <th>Candidate Permanent Address</th>
                                                                <th>Status</th>
                                                                <th>Remarks</th>
                                                                <th>Document</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = $result->fetch_assoc()) {
                                                                # code...
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['datoffer']; ?></td>
                                                                <td><?= $row['month']; ?></td>
                                                                <td><?= $row['uploaded']; ?></td>
                                                                <td><?= $row['candidatename']; ?></td>
                                                                <td><?= $row['selectedcomp']; ?></td>
                                                                <td><?= $row['contactper']; ?></td>
                                                                <td><?= $row['precomp']; ?></td>
                                                                <td><?= $row['dept']; ?></td>
                                                                <td><?= $row['sal']; ?></td>
                                                                <td><?= $row['contact']; ?></td>
                                                                <td><?= $row['doj']; ?></td>
                                                                <td><?= $row['currentadd']; ?></td>
                                                                <td><?= $row['peradd']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['remarks']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['doc']; ?></td>





                                                                <td>
                                                                    <a href="details.php?details=<?= $row['id']; ?>"
                                                                        class="badge badge-primary p-2"><i
                                                                            class="fa fa-eye"></i>Details</a>|
                                                                    <a href="edit.php?edit=<?= $row['id']; ?>"
                                                                        class="badge badge-success p-2"><i
                                                                            class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i>Edit</a>
                                                                    <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                        class="badge badge-info p-2"><i
                                                                            class="fa fa-doc-square-o"
                                                                            aria-hidden="true"></i>Shortlist</a>
                                                                    <a href="<?php echo $row['resume']; ?>"
                                                                        download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                        class="badge badge-danger p-2"><i
                                                                            class="fa fa-file-pdf-o"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="in.php?in=<?= $row['id']; ?>"
                                                                        class="badge badge-secondary p-2"><i
                                                                            class="fa fa-user-circle-o"
                                                                            aria-hidden="true"></i>
                                                                        Create Logo</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Duplicate" class="tabcontent">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Duplicate Candidate Entry</h4>
                                        <div class="table-responsive">
                                            <?php              
                            date_default_timezone_set('Asia/Kolkata');
                            $currentDateTime = date('d-M-Y');
                            $result = mysqli_query($conn, "SELECT * FROM duplicatecrud where data='$currentDateTime'" );
                      ?>
                                            <table id="example"
                                                class="table table-striped table-bordered display responsive nowrap"
                                                cellspacing="0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Date Of Working</th>
                                                        <th>Employee Name</th>
                                                        <th>Client Name</th>
                                                        <th>Working Department</th>
                                                        <th>Candidate Name</th>
                                                        <th>Present Company</th>
                                                        <th>Designation</th>
                                                        <th>Qualification</th>
                                                        <th>Total Experience</th>
                                                        <th>Current Salary</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Current Location</th>
                                                        <th>Permanent Location</th>
                                                        <th>Contact No.</th>
                                                        <th>E-mail</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Candidate Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $result->fetch_assoc()) {
                                                    # code...
                          ?>
                                                    <tr>
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['dat']; ?></td>
                                                        <td><?= $row['uploaded']; ?></td>
                                                        <td><?= $row['clientname']; ?></td>
                                                        <td><?= $row['workingdept']; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['companyname']; ?></td>
                                                        <td><?= $row['designation']; ?></td>
                                                        <td><?= $row['qualification']; ?></td>
                                                        <td><?= $row['experience']; ?></td>
                                                        <td><?= $row['currentsal']; ?></td>
                                                        <td><?= $row['expectedsal']; ?></td>
                                                        <td><?= $row['noticeperiod']; ?></td>
                                                        <td><?= $row['address']; ?></td>
                                                        <td><?= $row['peraddress']; ?></td>
                                                        <td><?= $row['phone']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td><?= $row['remarks']; ?></td>
                                                        <td><?= $row['department']; ?></td>


                                                        <td>
                                                            <a href="details.php?details=<?= $row['id']; ?>"
                                                                class="badge badge-primary p-2"><i
                                                                    class="fa fa-eye"></i>Details</a>|
                                                            <a href="../edit.php?edit=<?= $row['id']; ?>"
                                                                class="badge badge-success p-2"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>Edit</a>
                                                            <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                class="badge badge-info p-2"><i
                                                                    class="fa fa-doc-square-o"
                                                                    aria-hidden="true"></i>Shortlist</a>
                                                            <a href="<?php echo $row['resume']; ?>"
                                                                download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                class="badge badge-danger p-2"><i
                                                                    class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                            <a href="in.php?in=<?= $row['id']; ?>"
                                                                class="badge badge-secondary p-2"><i
                                                                    class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                                Create Logo</a>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- USERS TODAYS REPORTING IN GRAPH STARTS   -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix col-md-9">
                                        <h4 class="card-title float-left">Todays Users Reports</h4>
                                        <select name='uploaded' class="form-control" id='uploaded'>
                                            <option value="">Select Users</option>
                                            <?php
                       date_default_timezone_set('Asia/Kolkata');
                       $currentDateTime = date('d-M-Y');
                        $records = mysqli_query($conn, "SELECT uploaded FROM crud WHERE data='$currentDateTime' GROUP BY uploaded DESC");  // Use select query here        
                        while($data = mysqli_fetch_array($records))
                        {
                            echo "<option value='". $data['uploaded'] ."'>" .$data['uploaded'] ."</option>";  // displaying data in option menu
                        }	
                      ?>
                                        </select>
                                    </div>
                                    <div class="panel-body">
                                        <div id="chart_area_new" class="mt-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- USERS TODAYS REPORTING IN GRAPH ENDS -->

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Todays Joining</h4>
                                    <?php
                    $noresults = true;   
                    $today = date('Y-m-d');
                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE doj = '$today' AND status = 'YTJ'  " );
                  ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Candidate Name </th>
                                                    <th> Date Offer </th>
                                                    <th> Status </th>
                                                    <th> Phone No. </th>
                                                    <th> Salary </th>
                                                </tr>
                                            </thead>
                                            <?php while ($row = $result->fetch_assoc()) {
                                  $noresults = false;                    # code...
                        ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo BASE_URL; ?>assets/images/faces/face1.jpg"
                                                            class="me-2" alt="image">
                                                        <?= $row['candidatename']; ?>
                                                    </td>
                                                    <td> <?= $row['datoffer']; ?> </td>
                                                    <td>
                                                        <label
                                                            class="badge badge-gradient-success"><?= $row['status']; ?></label>
                                                    </td>
                                                    <td> <?= $row['contact']; ?> </td>
                                                    <td> <?= $row['sal']; ?> </td>
                                                </tr>
                                                <?php }
                          if($noresults){
                            echo '<div class="jumbotron">
                                    <h1>No Joinings Today</h1>                  
                                  </div>';
                          }
                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  } elseif($role == "users") { ?>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-account-star text-danger icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Number Of Candidate </p>
                                            <div class="fluid-container">
                                                <?php 
                            $currentDateTime = date('d-M-Y');
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `crud` WHERE data = '$currentDateTime' AND uploaded='$_SESSION[empid]'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Added Today
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class=" mdi mdi-account-check text-warning icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">No. of Candidate </p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` from products where MONTH(doj)=MONTH(now()) and YEAR(doj)=YEAR(now()) and status = 'YTJ' AND empid = '$_SESSION[empid]' ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Joining this
                                        Month
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Candidates Offered</p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` from products where MONTH(datoffer)=MONTH(now()) and YEAR(datoffer)=YEAR(now()) AND empid = '$_SESSION[empid]'");
                        $row = mysqli_fetch_array($result);
                        $result1 = mysqli_query($conn, "SELECT SUM(sal) AS `Total Salary` FROM products WHERE MONTH(datoffer)=MONTH(now()) and YEAR(datoffer)=YEAR(now()) AND empid = '$_SESSION[empid]'");
                        $row1 = mysqli_fetch_array($result1);
                        $count = $row['count'];
                        $count1 = $row1['Total Salary']
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count; ?>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-currency-inr mr-1" aria-hidden="true"></i>
                                        <?php echo $count1; ?> LPA<br />
                                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> This Month
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Total Candidate</p>
                                            <div class="fluid-container">
                                                <?php $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `crud` ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                        ?>
                                                <h3 class="font-weight-medium text-right mb-0"><?php echo $count ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>Present In Database
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 grid-margin">
                        <div class="card card-statistics">
                            <div class="row">
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i
                                                class="mdi mdi-account-multiple-outline text-info mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Not Join Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='NJ' AND empid = '$_SESSION[empid]'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i
                                                class="mdi mdi-checkbox-marked-circle-outline text-warning mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Yet To Join Candidates</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='YTJ' AND empid = '$_SESSION[empid]'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i class="mdi mdi-trophy-outline text-success mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Total Joined Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='Joined' AND empid = '$_SESSION[empid]'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                            <i class="mdi mdi-target text-danger mr-0 mr-sm-4 icon-lg"></i>
                                            <div class="wrapper text-center text-sm-left">
                                                <p class="card-text mb-0">Total Left Candidate</p>
                                                <div class="fluid-container">
                                                    <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `products` where status='Left' AND empid = '$_SESSION[empid]'");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                          ?>
                                                    <h3 class="mb-0 font-weight-medium"><?php echo $count ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Today
                                    Candidate
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Paris')">Today Requirement
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Today Joining Candidate
                                    Entry</button>
                                <button class="tablinks" onclick="openCity(event, 'Duplicate')">Today Duplicate
                                    Candidate Entry</button>
                            </div>

                            <div id="London" class="tabcontent">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Recent Candidate Entry</h4>
                                        <div class="table-responsive">
                                            <?php              
                            date_default_timezone_set('Asia/Kolkata');
                            $currentDateTime = date('d-M-Y');
                            $result = mysqli_query($conn, "SELECT * FROM crud where data='$currentDateTime' AND uploaded='$_SESSION[empid]'" );
                      ?>
                                            <table id="example"
                                                class="table table-striped table-bordered display responsive nowrap"
                                                cellspacing="0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Date Of Working</th>
                                                        <th>Employee Name</th>
                                                        <th>Client Name</th>
                                                        <th>Working Department</th>
                                                        <th>Candidate Name</th>
                                                        <th>Present Company</th>
                                                        <th>Designation</th>
                                                        <th>Qualification</th>
                                                        <th>Total Experience</th>
                                                        <th>Current Salary</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Current Location</th>
                                                        <th>Permanent Location</th>
                                                        <th>Contact No.</th>
                                                        <th>E-mail</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Candidate Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $result->fetch_assoc()) {
                                                    # code...
                          ?>
                                                    <tr>
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['dat']; ?></td>
                                                        <td><?= $row['uploaded']; ?></td>
                                                        <td><?= $row['clientname']; ?></td>
                                                        <td><?= $row['workingdept']; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['companyname']; ?></td>
                                                        <td><?= $row['designation']; ?></td>
                                                        <td><?= $row['qualification']; ?></td>
                                                        <td><?= $row['experience']; ?></td>
                                                        <td><?= $row['currentsal']; ?></td>
                                                        <td><?= $row['expectedsal']; ?></td>
                                                        <td><?= $row['noticeperiod']; ?></td>
                                                        <td><?= $row['address']; ?></td>
                                                        <td><?= $row['peraddress']; ?></td>
                                                        <td><?= $row['phone']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td><?= $row['remarks']; ?></td>
                                                        <td><?= $row['department']; ?></td>
                                                        <td>
                                                            <a href="details.php?details=<?= $row['id']; ?>"
                                                                class="badge badge-primary p-2"><i
                                                                    class="fa fa-eye"></i>Details</a>|
                                                            <a href="../edit.php?edit=<?= $row['id']; ?>"
                                                                class="badge badge-success p-2"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>Edit</a>
                                                            <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                class="badge badge-info p-2"><i
                                                                    class="fa fa-doc-square-o"
                                                                    aria-hidden="true"></i>Shortlist</a>
                                                            <a href="<?php echo $row['resume']; ?>"
                                                                download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                class="badge badge-danger p-2"><i
                                                                    class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                            <a href="in.php?in=<?= $row['id']; ?>"
                                                                class="badge badge-secondary p-2"><i
                                                                    class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                                Create Logo</a>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Paris" class="tabcontent">
                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Today Requirement Entry</h4>
                                                <div class="table-responsive">
                                                    <?php 
                                                       
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $currentDateTime = date('d-M-Y');
                                                        $result = mysqli_query($conn, "SELECT * from requirement where data='$currentDateTime' AND uploaded=$_SESSION[empid]"  );
                                                    ?>
                                                    <table id="example"
                                                        class="table table-striped table-bordered display responsive nowrap"
                                                        cellspacing="0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Job Id</th>
                                                                <th>Requirement Date</th>
                                                                <th>Month</th>
                                                                <th>Employee Name</th>
                                                                <th>Company Name</th>
                                                                <th>Department/ Designation</th>
                                                                <th>Salary</th>
                                                                <th>Repeat</th>
                                                                <th>Status</th>
                                                                <th>No Of Position</th>
                                                                <th>Req Attachment</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = $result->fetch_assoc()) {
                                                                # code...
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['jobid']; ?></td>
                                                                <td><?= $row['reqdate']; ?></td>
                                                                <td><?= $row['month']; ?></td>
                                                                <td><?= $row['uploaded']; ?></td>
                                                                <td><?= $row['companyname']; ?></td>
                                                                <td><?= $row['dept']; ?></td>
                                                                <td><?= $row['sal']; ?></td>
                                                                <td><?= $row['repeat']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['nop']; ?></td>
                                                                <td><?= $row['req']; ?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Tokyo" class="tabcontent">
                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Recent Joining Candidate Entry</h4>
                                                <div class="table-responsive">
                                                    <?php 
                                                       
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $currentDateTime = date('d-M-Y');
                                                        $result = mysqli_query($conn, "SELECT * FROM products where data='$currentDateTime' AND uploaded='$_SESSION[name]'" );
                                                    ?>
                                                    <table id="example"
                                                        class="table table-striped table-bordered display responsive nowrap"
                                                        cellspacing="0" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Date Offer</th>
                                                                <th>Month</th>
                                                                <th>Employee Name</th>
                                                                <th>Candidate Name</th>
                                                                <th>Company Name</th>
                                                                <th>Contact Person</th>
                                                                <th>Previous Company</th>
                                                                <th>Department</th>
                                                                <th>Current Salary</th>
                                                                <th>Contact No</th>
                                                                <th>D.O.J</th>
                                                                <th>Candidate Present Address</th>
                                                                <th>Candidate Permanent Address</th>
                                                                <th>Status</th>
                                                                <th>Remarks</th>
                                                                <th>Document</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = $result->fetch_assoc()) {
                                                                # code...
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['datoffer']; ?></td>
                                                                <td><?= $row['month']; ?></td>
                                                                <td><?= $row['uploaded']; ?></td>
                                                                <td><?= $row['candidatename']; ?></td>
                                                                <td><?= $row['selectedcomp']; ?></td>
                                                                <td><?= $row['contactper']; ?></td>
                                                                <td><?= $row['precomp']; ?></td>
                                                                <td><?= $row['dept']; ?></td>
                                                                <td><?= $row['sal']; ?></td>
                                                                <td><?= $row['contact']; ?></td>
                                                                <td><?= $row['doj']; ?></td>
                                                                <td><?= $row['currentadd']; ?></td>
                                                                <td><?= $row['peradd']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['remarks']; ?></td>
                                                                <td><?= $row['status']; ?></td>
                                                                <td><?= $row['doc']; ?></td>
                                                                <td>
                                                                    <a href="details.php?details=<?= $row['id']; ?>"
                                                                        class="badge badge-primary p-2"><i
                                                                            class="fa fa-eye"></i>Details</a>|
                                                                    <a href="edit.php?edit=<?= $row['id']; ?>"
                                                                        class="badge badge-success p-2"><i
                                                                            class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i>Edit</a>
                                                                    <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                        class="badge badge-info p-2"><i
                                                                            class="fa fa-doc-square-o"
                                                                            aria-hidden="true"></i>Shortlist</a>
                                                                    <a href="<?php echo $row['resume']; ?>"
                                                                        download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                        class="badge badge-danger p-2"><i
                                                                            class="fa fa-file-pdf-o"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="in.php?in=<?= $row['id']; ?>"
                                                                        class="badge badge-secondary p-2"><i
                                                                            class="fa fa-user-circle-o"
                                                                            aria-hidden="true"></i>
                                                                        Create Logo</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Duplicate" class="tabcontent">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Duplicate Candidate Entry</h4>
                                        <div class="table-responsive">
                                            <?php              
                            date_default_timezone_set('Asia/Kolkata');
                            $currentDateTime = date('d-M-Y');
                            $result = mysqli_query($conn, "SELECT * FROM duplicatecrud where data='$currentDateTime'  AND uploaded='$_SESSION[empid]'" );
                      ?>
                                            <table id="example"
                                                class="table table-striped table-bordered display responsive nowrap"
                                                cellspacing="0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Date Of Working</th>
                                                        <th>Employee Name</th>
                                                        <th>Client Name</th>
                                                        <th>Working Department</th>
                                                        <th>Candidate Name</th>
                                                        <th>Present Company</th>
                                                        <th>Designation</th>
                                                        <th>Qualification</th>
                                                        <th>Total Experience</th>
                                                        <th>Current Salary</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Current Location</th>
                                                        <th>Permanent Location</th>
                                                        <th>Contact No.</th>
                                                        <th>E-mail</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Candidate Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $result->fetch_assoc()) {
                                                    # code...
                          ?>
                                                    <tr>
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['dat']; ?></td>
                                                        <td><?= $row['uploaded']; ?></td>
                                                        <td><?= $row['clientname']; ?></td>
                                                        <td><?= $row['workingdept']; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['companyname']; ?></td>
                                                        <td><?= $row['designation']; ?></td>
                                                        <td><?= $row['qualification']; ?></td>
                                                        <td><?= $row['experience']; ?></td>
                                                        <td><?= $row['currentsal']; ?></td>
                                                        <td><?= $row['expectedsal']; ?></td>
                                                        <td><?= $row['noticeperiod']; ?></td>
                                                        <td><?= $row['address']; ?></td>
                                                        <td><?= $row['peraddress']; ?></td>
                                                        <td><?= $row['phone']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['status']; ?></td>
                                                        <td><?= $row['remarks']; ?></td>
                                                        <td><?= $row['department']; ?></td>


                                                        <td>
                                                            <a href="details.php?details=<?= $row['id']; ?>"
                                                                class="badge badge-primary p-2"><i
                                                                    class="fa fa-eye"></i>Details</a>|
                                                            <a href="../edit.php?edit=<?= $row['id']; ?>"
                                                                class="badge badge-success p-2"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>Edit</a>
                                                            <a href="shortlist.php?shortlist=<?= $row['id']; ?>"
                                                                class="badge badge-info p-2"><i
                                                                    class="fa fa-doc-square-o"
                                                                    aria-hidden="true"></i>Shortlist</a>
                                                            <a href="<?php echo $row['resume']; ?>"
                                                                download="<?php echo $row['name'] . ' Resume' . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                                class="badge badge-danger p-2"><i
                                                                    class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                            <a href="in.php?in=<?= $row['id']; ?>"
                                                                class="badge badge-secondary p-2"><i
                                                                    class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                                Create Logo</a>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix col-md-9">
                                        <h4 class="card-title float-left">Your Todays Reports</h4>
                                        <?php
                       date_default_timezone_set('Asia/Kolkata');
                       $currentDateTime = date('d-M-Y');
                       $emprecords = mysqli_query($conn, "SELECT status, count(*) as number FROM crud where uploaded=$_SESSION[empid] AND data='$currentDateTime' GROUP By status");  // Use select query here         
                      ?>
                                    </div>
                                    <div class="panel-body">
                                        <div id="piechart-new-offer-o" class="mt-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Todays Joining</h4>
                                    <?php
                    $noresults = true;   
                    $today = date('Y-m-d');
                    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE doj = '$today' AND status = 'YTJ' AND empid=$_SESSION[empid] " );
                  ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Candidate Name </th>
                                                    <th> Date Offer </th>
                                                    <th> Status </th>
                                                    <th> Phone No. </th>
                                                    <th> Salary </th>
                                                </tr>
                                            </thead>
                                            <?php while ($row = $result->fetch_assoc()) {
                                  $noresults = false;                    # code...
                        ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo BASE_URL; ?>assets/images/faces/face1.jpg"
                                                            class="me-2" alt="image">
                                                        <?= $row['candidatename']; ?>
                                                    </td>
                                                    <td> <?= $row['datoffer']; ?> </td>
                                                    <td>
                                                        <label
                                                            class="badge badge-gradient-success"><?= $row['status']; ?></label>
                                                    </td>
                                                    <td> <?= $row['contact']; ?> </td>
                                                    <td> <?= $row['sal']; ?> </td>
                                                </tr>
                                                <?php }
                          if($noresults){
                            echo '<div class="jumbotron">
                                    <h1>No Joinings Today</h1>                  
                                  </div>';
                          }
                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } elseif($role == "Admin") { ?>
                    Admin
                    <?php  } elseif($role == "tempusers") { ?>
                    temp Users
                    <?php } ?>
                    <!-- TODO APPLICATION STARTS -->
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Today's Task</h4>
                                    <?php 
                    $errors = "";
                    $db = mysqli_connect("localhost", "root", "", "phpcrud");
                    if (isset($_POST['addtask'])) {
                      if (empty($_POST['task'])) {
                        $errors = "You must fill in the task";
                      }else{
                        $task = $_POST['task'];
                        $empid = $_SESSION['empid'];
                        $created_at = $_POST['created_at'];
                        $sql = "INSERT INTO tasks (task,empid,created_at) VALUES ('$task','$empid','$created_at')";
                        mysqli_query($db, $sql);
                        header('location: dashboard.php');
                      }
                    }
                    if (isset($_GET['del_task'])) {
                      $id = $_GET['del_task'];
                    
                      mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
                      header('location: dashboard.php');
                    }	
                  ?>

                                    <form method="post" action="dashboard.php" class="input_form">
                                        <?php if (isset($errors)) { ?>
                                        <p class='text-danger'><?php echo $errors; ?></p>
                                        <?php } ?>
                                        <input type="hidden" name="created_at" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y');
                                echo $currentDateTime; ?>" class="task_input form-control">
                                        <input type="text" name="task" class="task_input form-control">
                                        <button type="submit" name="addtask" id="add_btn"
                                            class="add btn btn-gradient-primary font-weight-bold add_btn">Add
                                            Task</button>
                                    </form>
                                    <div class="list-wrapper">
                                        <?php 

                        $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE empid=$_SESSION[empid]");
                        $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                                        <ul class="d-flex flex-column-reverse todo-list">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        <?php echo $row['task']; ?> <i class="input-helper"></i></label>
                                                </div>
                                                <a href="dashboard.php?del_task=<?php echo $row['id'] ?>"><i
                                                        class="remove mdi mdi-close-circle-outline"></i></a>
                                            </li>
                                        </ul>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TODO APPLICATION ENDS -->





                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                            innovationtriggers.com
                            <?php echo date("Y"); ?>
                        </span>
                        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                                href="https://www.innovationtriggers.com" target="_blank">Innovation Triggers Admin
                            </a> Innovationtriggers.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <?php
include('../shared/footer.php')
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data(uploaded, title) {
        var temp_title = title + ' ' + uploaded + '';
        $.ajax({
            url: "ajax/reports/today-report.php",
            method: "POST",
            data: {
                uploaded: uploaded
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthwiseChart(data, temp_title);
            }
        });
    }

    function drawMonthwiseChart(chart_data, chart_main_title) {
        var jsonData = chart_data;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'status');
        data.addColumn('number', 'number');
        $.each(jsonData, function(i, jsonData) {
            var status = jsonData.status;
            var number = parseFloat($.trim(jsonData.number));
            data.addRows([
                [status, number]
            ]);
        });
        var options = {
            title: chart_main_title,
            hAxis: {
                title: "STATUS"
            },
            vAxis: {
                title: 'TOTAL NUMBERS'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_area_new'));
        chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['status', 'Number'],
            <?php
                        while ($row = mysqli_fetch_array($emprecords)) {
                            echo "['" . $row["status"] . "', " . $row["number"] . "],";
                        }
                        ?>
        ]);
        var options = {
            title: 'Your Todays Candiate Entry reports',
            is3D: true,
            pieHole: 0.1
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart-new-offer-o'));
        chart.draw(data, options);
    }
    </script>
    <script>
    $(document).ready(function() {

        $('#uploaded').change(function() {
            var uploaded = $(this).val();
            if (uploaded != '') {
                load_monthwise_data(uploaded, 'Status Wise Data For');
            }
        });

    });
    </script>