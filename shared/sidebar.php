<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <?php 
    include('../config/dbconfig.php');
    $_SESSION['name'];
    $query = mysqli_query($conn,"SELECT * FROM registration WHERE name='".$_SESSION['name']."'");
    while($row = mysqli_fetch_array($query)) {
      $role = $row['role'];
    }
    if($role == 'SuperAdmin') { ?>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?php echo BASE_URL; ?>assets/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION['name'] ?></span>
                    <span class="text-secondary text-small">Employee Id: <?php echo $_SESSION['empid'] ?></span>
                    <span class="text-secondary text-small">UserType: <?php echo $_SESSION['role'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Candidates</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/addcandidate.php">Add
                            Candidate</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/allcandidate.php">Candidate
                            Database</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-ref" aria-expanded="false"
                aria-controls="ui-basic-ref">
                <span class="menu-title">Refinery</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-fire menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic-ref">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/addrefinerycandidate.php">Refinery
                            Candidate</a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-new" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Employee</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-check menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic-new">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/Employee.php">Employee</a>
                    </li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/allcandidate.php">Candidate
              Database</a></li> -->
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addrequirement.php">
                <span class="menu-title">Requirement</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addjoining.php">
                <span class="menu-title">Joinings</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/clients.php">
                <span class="menu-title">Clients</span>
                <i class="mdi mdi-car menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/department.php">
                <span class="menu-title">Department</span>
                <i class="mdi mdi-office menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/reports.php">
                <span class="menu-title">Reports</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Year Wise MIS</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/mis.php">MIS</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <?php } elseif($role == "Admin") { ?>
    Admin
    <?php  } elseif($role == "users") { ?>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?php echo BASE_URL; ?>assets/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION['name'] ?></span>
                    <span class="text-secondary text-small">Employee Id: <?php echo $_SESSION['empid'] ?></span>
                    <span class="text-secondary text-small">UserType: <?php echo $_SESSION['role'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Candidates</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/addcandidate.php">Add
                            Candidate</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/allcandidate.php">Candidate
                            Database</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-ref" aria-expanded="false"
                aria-controls="ui-basic-ref">
                <span class="menu-title">Refinery</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-fire menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic-ref">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="<?php echo BASE_URL; ?>recruiter/addrefinerycandidate.php">Refinery
                            Candidate</a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addrequirement.php">
                <span class="menu-title">Requirement</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addjoining.php">
                <span class="menu-title">Joinings</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>


    </ul>
    <?php  } elseif($role == "tempusers") { ?>
    temp Users
    <?php } ?>
</nav>