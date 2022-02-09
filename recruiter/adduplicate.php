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
        <!-- partial:../../partials/_navbar.html -->
        <?php include('../shared/topbar.php') ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include('../shared/sidebar.php') ?>
            <!-- partial -->



            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Candidate</h4>
                                <form class="form-sample" action="addcandidate.php" method="post"
                                    enctype="multipart/form-data">
                                    <p class="card-description"> Candidate info </p>
                                    <div class="row" style="display:none">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">DAT</label>
                                                <div class="col-sm-8">
                                                    <input name="dat" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y H:i:s a');
                                echo $currentDateTime; ?>" readonly="readonly" class="form-group form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">DATA</label>
                                                <div class="col-sm-8">
                                                    <input name="data" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y');
                                echo $currentDateTime; ?>" readonly="readonly" class="form-group form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <input type="hidden" name="crud_id" value="<?= $id ?>">
                                                <label class="col-sm-4 col-form-label">Employee Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="uploaded"
                                                        value="<?php echo $_SESSION['empid'] ?>" required=""
                                                        readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Client Name</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="clientname"
                                                        value="<?= $clientname;  ?>" required="">
                                                        <option value="">Select Client</option>
                                                        <?php
                                    $records = mysqli_query($conn, "SELECT client_name From clients");  // Use select query here 
                                    while($data = mysqli_fetch_array($records))
                                      {
                                        echo "<option value='". $data['client_name'] ."'>" .$data['client_name'] ."</option>";  // displaying data in option menu
                                      }	
                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Working Department</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="workingdept"
                                                        value="<?= $workingdept;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Candidate Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?= $name;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Candidate Company
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="companyname"
                                                        value="<?= $companyname;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Designation</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="designation"
                                                        value="<?= $designation;  ?>" required="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Highest Qualification</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="qualification"
                                                        value="<?= $qualification;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Experience</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="experience"
                                                        value="<?= $experience;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Current Salary</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="currentsal"
                                                        value="<?= $currentsal;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Expected Salary</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="expectedsal"
                                                        value="<?= $expectedsal;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Notice Period</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="noticeperiod"
                                                        value="<?= $noticeperiod;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Current Location</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="address"
                                                        value="<?= $address;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Permanent Location</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="peraddress"
                                                        value="<?= $peraddress;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Mobile</label>
                                                <div class="col-sm-8">
                                                    <input type="tel" class="form-control" name="phone"
                                                        value="<?= $phone;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="emailid"
                                                        onBlur="checkemailAvailability()" name="email"
                                                        value="<?= $email;  ?>" required="">
                                                    <tr>
                                                        <th width="24%" scope="row"></th>
                                                        <td> <span id="email-availability-status"></span> </td>
                                                    </tr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status" value="<?= $status;  ?>"
                                                        required="">
                                                        <option value="">SELECT STATUS</option>
                                                        <option value="OK">OK</option>
                                                        <option value="CALL AGAIN">CALL AGAIN</option>
                                                        <option value="NOT INTERESTED">Not Interested</option>
                                                        <option value="MISMATCH">MISMATCH</option>
                                                        <option value="BYMAIL">BYMAIL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Remarks</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="remarks"
                                                        value="<?= $remarks;  ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Department</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="department"
                                                        value="<?= $department;  ?>" required="">
                                                        <option value="">SELECT CANDIDATE DEPARTMENT</option>
                                                        <option value="FRESHER">Fresher</option>
                                                        <option value="PROD">Production</option>
                                                        <option value="QA">Quality Assurance</option>
                                                        <option value="SQA">Supplier Quality Assurance</option>
                                                        <option value="QC">Quality Control</option>
                                                        <option value="PE">Process, Process Engineering</option>
                                                        <option value="HEAT TREATMENT">HEAT TREATMENT</option>
                                                        <option value="Metaullurgy">Metaullurgy</option>
                                                        <option value="MKTG">Marketing</option>
                                                        <option value="SALES">SALES</option>
                                                        <option value="SCM">SCM</option>
                                                        <option value="Design">Design</option>
                                                        <option value="D&D">Design & Development</option>
                                                        <option value="R&D">Research And Development</option>
                                                        <option value="NPD">New Product Development</option>
                                                        <option value="Testing">Testing</option>
                                                        <option value="MFG">Manufacturing</option>
                                                        <option value="Interpreter">Interpreter</option>
                                                        <option value="Civil">Civil Construction</option>
                                                        <option value="Maint">Maintenance</option>
                                                        <option value="F&A">Finance & Account</option>
                                                        <option value="EHS">Environment Health & Safety</option>
                                                        <option value="Project">Project</option>
                                                        <option value="Operation">Operation</option>
                                                        <option value="O&M">Operation & Maintenance</option>
                                                        <option value="PPC">Production Planning & Control</option>
                                                        <option value="HR">Human Resource</option>
                                                        <option value="Security">Security</option>
                                                        <option value="IT">IT</option>
                                                        <option value="Software">Software</option>
                                                        <option value="CAE">CAE</option>
                                                        <option value="Data Operator">Data Operator</option>
                                                        <option value="Computer Operator">Computer Operator</option>
                                                        <option value="Chemist">Chemist</option>
                                                        <option value="INST">Instrument</option>
                                                        <option value="Tool Room">Tool Room</option>
                                                        <option value="Draughtsman">Draughtsman</option>
                                                        <option value="Service">Service</option>
                                                        <option value="Legal">Legal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden" name="oldresume" value="<?= $resume ?>">
                                        <label class="col-sm-3 col-form-label">File Upload</label>
                                        <input type="file" name="resume" value="<?= $resume;  ?>"
                                            class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled=""
                                                placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php if ($update == true) { ?>
                                        <input type="submit" name="updateduplicate" class="btn btn-success btn-block"
                                            value="Update Record">
                                        <?php } else { ?>
                                        <input type="submit" name="add" class="btn btn-primary btn-block"
                                            value="Add Record">
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <?php
include('../shared/footer.php')
?>