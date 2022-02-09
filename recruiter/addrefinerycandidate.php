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

            <script>
            function checkemailAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'emailid=' + $("#emailid").val(),
                    type: "POST",
                    success: function(data) {
                        $("#email-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
            </script>
            <!-- partial -->
            <!-- Modal -->
            <div class="modal fade" id="renameaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Rename Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="actions/refinery/insertrefrenamecandidate.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
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
                                            <label class="col-sm-4 col-form-label">Employee Name</label>
                                            <div class="col-sm-8">
                                                <input name="uploaded" value="<?php echo $_SESSION['empid'] ?>"
                                                    readonly="readonly" class="form-group form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Client Name</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="clientname"
                                                    value="<?= $clientname;  ?>">
                                                    <option> <?php $records = mysqli_query($conn, "SELECT client_name From clients");  // Use select query here 
                                
                                                            while($data = mysqli_fetch_array($records))
                                                            {
                                                                echo "<option value='". $data['client_name'] ."'>" .$data['client_name'] ."</option>";  // displaying data in option menu
                                                            }?>

                                                    </option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">AdharCard No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="adharcardno" value="<?= $adharcardno;  ?>"
                                                    class="form-control" placeholder="Enter Aadhar Card No."
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" value="<?= $name;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="qualification" value="<?= $qualification;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Candidate Highest Qualification" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Company Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="companyname" value="<?= $companyname;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Company Name"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Phone No</label>
                                            <div class="col-sm-8">
                                                <input type="tel" name="phone" value="<?= $phone;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Mobile Number"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <div <?php if (isset($email_error)): ?> class="form_error"
                                                    <?php endif ?>>
                                                    <input type="email" name="email" id="emailid"
                                                        onBlur="checkemailAvailability()" value="<?php echo $email; ?>"
                                                        class="form-control" placeholder="Enter Candidate E-mail"
                                                        required="">
                                                    <tr>
                                                        <th width="24%" scope="row"></th>
                                                        <td> <span id="email-availability-status"></span> </td>
                                                    </tr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Unit and Working
                                                From</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cunit" value="<?= $cunit;  ?>"
                                                    class="form-control" placeholder="Current Unit and Working From"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <select class="form-control " name="department"
                                                    value="<?= $department;  ?>" required="">
                                                    <option value="">SELECT CANDIDATE DEPARTMENT</option>

                                                    <option value="Integrity">Integrity</option>

                                                    <option value="Operation">Operation</option>
                                                    <option value="Maint">Maint</option>
                                                    <option value="O&M">Operation & Maintenance</option>
                                                    <option value="Project">Project</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="CTS">CTS</option>
                                                    <option value="Chemist">Chemist</option>
                                                    <option value="Doctor">DOCTOR</option>
                                                    <option value="Purchase">Purchase</option>
                                                    <option value="Lab">Lab</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Integrity">Integrity</option>
                                                    <option value="Safety">Safety</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                                    <option value="SCM">SCM</option>
                                                    <option value="Risk Management">Risk Management</option>
                                                    <option value="R&D">R&D</option>
                                                    <option value="Reliability">Reliability</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Upload</label>
                                            <div class="col-sm-8">

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add" class="btn btn-primary">Save Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Refinery Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="actions/refinery/insertrefinerycandidate.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
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
                                            <label class="col-sm-4 col-form-label">Employee Name</label>
                                            <div class="col-sm-8">
                                                <input name="uploaded" value="<?php echo $_SESSION['empid'] ?>"
                                                    readonly="readonly" class="form-group form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Client Name</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="clientname"
                                                    value="<?= $clientname;  ?>">
                                                    <option> <?php $records = mysqli_query($conn, "SELECT client_name From clients");  // Use select query here 
                                
                                                            while($data = mysqli_fetch_array($records))
                                                            {
                                                                echo "<option value='". $data['client_name'] ."'>" .$data['client_name'] ."</option>";  // displaying data in option menu
                                                            }?>

                                                    </option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working Dept.</label>
                                            <div class="col-sm-8">
                                                <input type="month" id="bdaymonth" name="workingdept"
                                                    value="<?= $workingdept;  ?>" class="form-control"
                                                    placeholder="Working Dept." required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Erec No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="erecno" value="<?= $erecno;  ?>"
                                                    class="form-control" placeholder="Enter E-Rec Reference No."
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate No</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                <input type="text" name="candidateno" value="<?= $candidateno;  ?>"
                                                    class="form-control" placeholder="Candidate No" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Application No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="applicationno" value="<?= $applicationno;  ?>"
                                                    class="form-control" placeholder="Enter Application No."
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">AdharCard No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="adharcardno" value="<?= $adharcardno;  ?>"
                                                    class="form-control" placeholder="Enter Aadhar Card No."
                                                    required="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" value="<?= $name;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">DOB</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dob" value="<?= $dob;  ?>" class="form-control"
                                                    placeholder="Enter DOB" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Age</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="age" value="<?= $age;  ?>" class="form-control"
                                                    placeholder="Enter Age in Years" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Father Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fname" value="<?= $fname;  ?>"
                                                    class="form-control" placeholder="Enter Father's Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Mother Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="mname" value="<?= $mname;  ?>"
                                                    class="form-control" placeholder="Enter Mother's Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Marital Status</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="maritial" value="<?= $maritial;  ?>"
                                                    class="form-control" placeholder="Enter Maritial Status"
                                                    required="">
                                                    <option value="">Marital Status</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Unmarried">Unmarried</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address" value="<?= $address;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Current Location"
                                                    required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="peraddress" value="<?= $peraddress;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Permanent Address"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="experience" value="<?= $experience;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Candidate Experience in Years" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Total Petro/Refinery
                                                Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tpexp" value="<?= $tpexp;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Total Petro/Refinery Experience" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pannel Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pexp" value="<?= $pexp;  ?>"
                                                    class="form-control" placeholder="Pannel Experience" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Running Plant Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="rexp" value="<?= $rexp;  ?>"
                                                    class="form-control" placeholder="Running Plant Experience"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Unit and Working
                                                From</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cunit" value="<?= $cunit;  ?>"
                                                    class="form-control" placeholder="Current Unit and Working From"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Unit Handled</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="unit" value="<?= $unit;  ?>"
                                                    class="form-control" placeholder="Unit Handled" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Field Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fexp" value="<?= $fexp;  ?>"
                                                    class="form-control" placeholder="Field Experience" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Console Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cexp" value="<?= $cexp;  ?>"
                                                    class="form-control" placeholder="Console Experience" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Company Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="companyname" value="<?= $companyname;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Company Name"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Previous Company
                                                Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pcompanyname" value="<?= $pcompanyname;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Candidate Previous Comp Name" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working From</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="workingfrom" value="<?= $workingfrom;  ?>"
                                                    class="form-control" placeholder="Working From" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working To</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="workingto" value="<?= $workingto;  ?>"
                                                    class="form-control" placeholder="Working To" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Designation</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="designation" value="<?= $designation;  ?>"
                                                    class="form-control" placeholder="Enter Designation" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="qualification" value="<?= $qualification;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Candidate Highest Qualification" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="qualificationtype"
                                                    value="<?= $qualificationtype;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Qualification Type" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">YOP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="yop" value="<?= $yop;  ?>" class="form-control"
                                                    placeholder="YOP" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Stream</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="stream" value="<?= $stream;  ?>"
                                                    class="form-control" placeholder="Stream" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Institute</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="institute" value="<?= $institute;  ?>"
                                                    class="form-control" placeholder="Institute" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Recruiter Remark</label>
                                            <div class="col-sm-8">
                                                <input type="textarea" name="premarks" value="<?= $premarks;  ?>"
                                                    class="form-control" placeholder="Recruiter Remarks" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Company Status</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="cstatus" value="<?= $cstatus;  ?>"
                                                    class="form-control" placeholder="Company Status">
                                                    <option value="">Select Company Status</option>
                                                    <option value="Shortlisted">Shortlisted</option>
                                                    <option value="Duplicate">Duplicate</option>
                                                    <option value="Rejected">Rejected</option>
                                                    <option value="Hold">Hold</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Salary</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currentsal" value="<?= $currentsal;  ?>"
                                                    class="form-control" placeholder="Gross Salary" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fixed Sal</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fctc" value="<?= $fctc;  ?>"
                                                    class="form-control" placeholder="Fixed CTC" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Expected Sal</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="expectedsal" value="<?= $expectedsal;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Expected Salary"
                                                    required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Notice Period</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="noticeperiod" id="myNumber"
                                                    value="<?= $noticeperiod;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Notice Period" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Phone No</label>
                                            <div class="col-sm-8">
                                                <input type="tel" name="phone" value="<?= $phone;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Mobile Number"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <div <?php if (isset($email_error)): ?> class="form_error"
                                                    <?php endif ?>>
                                                    <input type="email" name="email" id="emailid"
                                                        onBlur="checkemailAvailability()" value="<?php echo $email; ?>"
                                                        class="form-control" placeholder="Enter Candidate E-mail"
                                                        required="">
                                                    <tr>
                                                        <th width="24%" scope="row"></th>
                                                        <td> <span id="email-availability-status"></span> </td>
                                                    </tr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Selected</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="selected1" value="<?= $selected1; ?>"
                                                    class="form-control" placeholder="Selected">
                                                    <option value="">Selected</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Joined</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="joined1" value="<?= $joined1; ?>"
                                                    class="form-control" placeholder="Joined">
                                                    <option value="">Joined</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control " name="status" value="<?= $status;  ?>"
                                                    required="">
                                                    <option value="">SELECT STATUS</option>
                                                    <option value="OK">OK</option>
                                                    <option value="CALL AGAIN">CALL AGAIN</option>
                                                    <option value="NOT INTERESTED">Not Interested</option>
                                                    <option value="MISMATCH">MISMATCH</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <select class="form-control " name="department"
                                                    value="<?= $department;  ?>" required="">
                                                    <option value="">SELECT CANDIDATE DEPARTMENT</option>

                                                    <option value="Integrity">Integrity</option>

                                                    <option value="Operation">Operation</option>
                                                    <option value="Maint">Maint</option>
                                                    <option value="O&M">Operation & Maintenance</option>
                                                    <option value="Project">Project</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="CTS">CTS</option>
                                                    <option value="Chemist">Chemist</option>
                                                    <option value="Doctor">DOCTOR</option>
                                                    <option value="Purchase">Purchase</option>
                                                    <option value="Lab">Lab</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Integrity">Integrity</option>
                                                    <option value="Safety">Safety</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                                    <option value="SCM">SCM</option>
                                                    <option value="Risk Management">Risk Management</option>
                                                    <option value="R&D">R&D</option>
                                                    <option value="Reliability">Reliability</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Upload</label>
                                            <div class="col-sm-8">

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add" class="btn btn-primary">Save Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Employee Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="actions/refinery/updaterefinerycandidate.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="update_id" id="update_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">DAT</label>
                                            <div class="col-sm-8">
                                                <input name="dat" id="dat" value="<?php $dat ?>" readonly="readonly"
                                                    class="form-group form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">DATA</label>
                                            <div class="col-sm-8">
                                                <input name="data" id="data" value="<?php $data ?>" readonly="readonly"
                                                    class="form-group form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Employee Name</label>
                                            <div class="col-sm-8">
                                                <input name="uploaded" id="uploaded"
                                                    value="<?php echo $_SESSION['empid'] ?>" readonly="readonly"
                                                    class="form-group form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Client Name</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="clientname" id="clientname"
                                                    value="<?= $clientname;  ?>">
                                                    <option> <?php $records = mysqli_query($conn, "SELECT client_name From clients");  // Use select query here 
                                
                                                            while($data = mysqli_fetch_array($records))
                                                            {
                                                                echo "<option value='". $data['client_name'] ."'>" .$data['client_name'] ."</option>";  // displaying data in option menu
                                                            }?>

                                                    </option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working Dept.</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="workingdept" id="workingdept"
                                                    value="<?= $workingdept;  ?>" class="form-control"
                                                    placeholder="Working Dept." required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">POSITION NAME</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="positionname" id="positionname"
                                                    value="<?= $positionname;  ?>" class="form-control"
                                                    placeholder="Enter POSTION NAME." required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Erec No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="erecno" id="erecno" value="<?= $erecno;  ?>"
                                                    class="form-control" placeholder="Enter E-Rec Reference No."
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate No</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                <input type="text" name="candidateno" id="candidateno"
                                                    value="<?= $candidateno;  ?>" class="form-control"
                                                    placeholder="Candidate No" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Application No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="applicationno" id="applicationno"
                                                    value="<?= $applicationno;  ?>" class="form-control"
                                                    placeholder="Enter Application No." required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">AdharCard No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="adharcardno" id="adharcardno"
                                                    value="<?= $adharcardno;  ?>" class="form-control"
                                                    placeholder="Enter Aadhar Card No." required="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" id="name" value="<?= $name;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">CV POSITION</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cvposition" id="cvposition"
                                                    value="<?= $cvposition;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">DOB</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dob" id="dob" value="<?= $dob;  ?>"
                                                    class="form-control" placeholder="Enter DOB" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Age</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="age" id="age" value="<?= $age;  ?>"
                                                    class="form-control" placeholder="Enter Age in Years" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Father Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fname" id="fname" value="<?= $fname;  ?>"
                                                    class="form-control" placeholder="Enter Father's Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Mother Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="mname" id="mname" value="<?= $mname;  ?>"
                                                    class="form-control" placeholder="Enter Mother's Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Marital Status</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="maritial" id="maritial"
                                                    value="<?= $maritial;  ?>" class="form-control"
                                                    placeholder="Enter Maritial Status" required="">
                                                    <option value="">Marital Status</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Unmarried">Unmarried</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address" id="address" value="<?= $address;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Current Location"
                                                    required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="peraddress" id="peraddress"
                                                    value="<?= $peraddress;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Permanent Address" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="experience" id="experience"
                                                    value="<?= $experience;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Experience in Years" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Total Petro/Refinery
                                                Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tpexp" id="tpexp" value="<?= $tpexp;  ?>"
                                                    class="form-control"
                                                    placeholder="Enter Total Petro/Refinery Experience" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pannel Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pexp" id="pexp" value="<?= $pexp;  ?>"
                                                    class="form-control" placeholder="Pannel Experience" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Running Plant Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="rexp" id="rexp" value="<?= $rexp;  ?>"
                                                    class="form-control" placeholder="Running Plant Experience"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Unit and Working
                                                From</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cunit" id="cunit" value="<?= $cunit;  ?>"
                                                    class="form-control" placeholder="Current Unit and Working From"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Unit Handled</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="unit" id="unit" value="<?= $unit;  ?>"
                                                    class="form-control" placeholder="Unit Handled" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Field Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fexp" id="fexp" value="<?= $fexp;  ?>"
                                                    class="form-control" placeholder="Field Experience" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Console Experience</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cexp" id="cexp" value="<?= $cexp;  ?>"
                                                    class="form-control" placeholder="Console Experience" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">ECTC</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="ectc" id="ectc" value="<?= $ectc;  ?>"
                                                    class="form-control" placeholder="ECTC" required="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Company Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="companyname" id="companyname"
                                                    value="<?= $companyname;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Company Name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Candidate Previous Company
                                                Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pcompanyname" id="pcompanyname"
                                                    value="<?= $pcompanyname;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Previous Comp Name" required="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working From</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="workingfrom" id="workingfrom"
                                                    value="<?= $workingfrom;  ?>" class="form-control"
                                                    placeholder="Working From" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Working To</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="workingto" id="workingto"
                                                    value="<?= $workingto;  ?>" class="form-control"
                                                    placeholder="Working To" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">CLOCATION</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="clocation" id="clocation"
                                                    value="<?= $clocation;  ?>" class="form-control"
                                                    placeholder="Enter Designation" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Designation</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="designation" id="designation"
                                                    value="<?= $designation;  ?>" class="form-control"
                                                    placeholder="Enter Designation" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">GCTC</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="gctc" id="gctc" value="<?= $gctc;  ?>"
                                                    class="form-control" placeholder="Enter gctc" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">RELOCATE</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="relocate" id="relocate"
                                                    value="<?= $relocate;  ?>" class="form-control"
                                                    placeholder="Enter relocate" required="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="qualification" id="qualification"
                                                    value="<?= $qualification;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Highest Qualification" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Qualification Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="qualificationtype" id="qualificationtype"
                                                    value="<?= $qualificationtype;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Qualification Type" required="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">YOP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="yop" id="yop" value="<?= $yop;  ?>"
                                                    class="form-control" placeholder="YOP" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Stream</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="stream" id="stream" value="<?= $stream;  ?>"
                                                    class="form-control" placeholder="Stream" required="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Institute</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="institute" id="institute"
                                                    value="<?= $institute;  ?>" class="form-control"
                                                    placeholder="Institute" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">DSHARING</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dsharing" id="dsharing"
                                                    value="<?= $dsharing;  ?>" class="form-control"
                                                    placeholder="dsharing" required="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Recruiter Remark</label>
                                            <div class="col-sm-8">
                                                <input type="textarea" name="premarks" id="premarks"
                                                    value="<?= $premarks;  ?>" class="form-control"
                                                    placeholder="Recruiter Remarks" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Company Status</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="cstatus" id="cstatus"
                                                    value="<?= $cstatus;  ?>" class="form-control"
                                                    placeholder="Company Status">
                                                    <option value="">Select Company Status</option>
                                                    <option value="Shortlisted">Shortlisted</option>
                                                    <option value="Duplicate">Duplicate</option>
                                                    <option value="Rejected">Rejected</option>
                                                    <option value="Hold">Hold</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Salary</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currentsal" id="currentsal"
                                                    value="<?= $currentsal;  ?>" class="form-control"
                                                    placeholder="Gross Salary" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fixed Sal</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fctc" id="fctc" value="<?= $fctc;  ?>"
                                                    class="form-control" placeholder="Fixed CTC" required="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Expected Sal</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="expectedsal" id="expectedsal"
                                                    value="<?= $expectedsal;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Expected Salary" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Notice Period</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="noticeperiod" id="noticeperiod"
                                                    value="<?= $noticeperiod;  ?>" class="form-control"
                                                    placeholder="Enter Candidate Notice Period" required="">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Phone No</label>
                                            <div class="col-sm-8">
                                                <input type="tel" name="phone" id="phone" value="<?= $phone;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Mobile Number"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <div <?php if (isset($email_error)): ?> class="form_error"
                                                    <?php endif ?>>
                                                    <input type="email" name="email" id="email"
                                                        onBlur="checkemailAvailability()" value="<?php echo $email; ?>"
                                                        class="form-control" placeholder="Enter Candidate E-mail"
                                                        required="">
                                                    <tr>
                                                        <th width="24%" scope="row"></th>
                                                        <td> <span id="email-availability-status"></span> </td>
                                                    </tr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Selected</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="selected1" id="selected1"
                                                    value="<?= $selected1; ?>" class="form-control"
                                                    placeholder="Selected">
                                                    <option value="">Selected</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Joined</label>
                                            <div class="col-sm-8">
                                                <select type="text" name="joined1" id="joined1" value="<?= $joined1; ?>"
                                                    class="form-control" placeholder="Joined">
                                                    <option value="">Joined</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control " name="status" id="status"
                                                    value="<?= $status;  ?>" required="">
                                                    <option value="">SELECT STATUS</option>
                                                    <option value="OK">OK</option>
                                                    <option value="CALL AGAIN">CALL AGAIN</option>
                                                    <option value="NOT INTERESTED">Not Interested</option>
                                                    <option value="MISMATCH">MISMATCH</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">SOURCE</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="source" id="source" value="<?= $source;  ?>"
                                                    class="form-control" placeholder="Enter Candidate Source"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <select class="form-control " name="department" id="department"
                                                    value="<?= $department;  ?>" required="">
                                                    <option value="">SELECT CANDIDATE DEPARTMENT</option>

                                                    <option value="Integrity">Integrity</option>

                                                    <option value="Operation">Operation</option>
                                                    <option value="Maint">Maint</option>
                                                    <option value="O&M">Operation & Maintenance</option>
                                                    <option value="Project">Project</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="CTS">CTS</option>
                                                    <option value="Chemist">Chemist</option>
                                                    <option value="Doctor">DOCTOR</option>
                                                    <option value="Purchase">Purchase</option>
                                                    <option value="Lab">Lab</option>
                                                    <option value="IT">IT</option>
                                                    <option value="Integrity">Integrity</option>
                                                    <option value="Safety">Safety</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                                    <option value="SCM">SCM</option>
                                                    <option value="Risk Management">Risk Management</option>
                                                    <option value="R&D">R&D</option>
                                                    <option value="Reliability">Reliability</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Upload</label>
                                            <div class="col-sm-8">

                                                <input type="file" id="resume" name="resume" value="<?= $resume;  ?>"
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
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updaterrefinery" class="btn btn-primary">Update
                                    Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="actions/refinery/deleterefinerycandidate.php" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="delete_id" id="delete_id">

                                <h4> Do you want to Delete this Data ??</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                <button type="submit" name="deleterequirement" class="btn btn-primary"> Yes !! Delete
                                    it. </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4 float-left"
                                data-toggle="modal" data-target="#renameaddmodal">
                                <i class="mdi mdi-note-plus text-white mr-0 mr-sm-4 icon-lg"></i>
                                ADD REFINERY RENAME CANDIDATE
                            </button>
                            <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4 float-right"
                                data-toggle="modal" data-target="#studentaddmodal">
                                <i class="mdi mdi-note-plus text-white mr-0 mr-sm-4 icon-lg"></i>
                                ADD REFINERY CANDIDATE
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All REFINERY CANDIDATE</h4>
                                <div class="table-responsive">
                                    <?php 
                     
                                        $limit = 30;
                                        
                                        $page = ((isset($_GET['page'])) && ($_GET['page'] != ''))? $_GET['page'] : 1;
                                        $offset = ($page - 1) * $limit;
                                        $sql = "SELECT * FROM refinery ORDER BY id DESC LIMIT {$offset},{$limit}";
                                        $cnt=1;
                                        $result = mysqli_query($conn, $sql ) or die("Query failed");
                                        if(mysqli_num_rows($result) > 0){
                                    ?>
                                    <table id="example"
                                        class="table table-striped table-bordered display responsive nowrap"
                                        cellspacing="0" style="width:100%">

                                        <thead>
                                            <tr>

                                                <th>S.NO</th>
                                                <th>Date</th>
                                                <th>Date Of Working</th>
                                                <th>Employee Code</th>
                                                <th>Client Name</th>
                                                <th>Working Department</th>
                                                <th>POSITION NAME</th>
                                                <th>E-Rec Reference No</th>
                                                <th>Candidate No</th>
                                                <th>Application No</th>
                                                <th>Aadhar Card No</th>
                                                <th>Candidate Name</th>
                                                <th>CV POSITION</th>
                                                <th>DOB</th>
                                                <th>Age in Years</th>
                                                <th>Father's Name</th>
                                                <th>Mother's Name</th>
                                                <th>Maritial Status</th>
                                                <th>Current Location</th>
                                                <th>Permanent Residence(City)</th>
                                                <th>Total Yrs. of Exp.</th>
                                                <th>Total Petro/Refinery Exp.</th>
                                                <th>Pannel Exp.</th>
                                                <th>Exp. in Running Plant</th>
                                                <th>Current Unit and Working from</th>
                                                <th>Unit Handled</th>
                                                <th>Field Exp.</th>
                                                <th>Console Exp.</th>
                                                <th>ECTC</th>
                                                <th>Present Company</th>
                                                <th>Previous Company</th>
                                                <th>Working From</th>
                                                <th>Working To</th>
                                                <th>CLOCATION</th>
                                                <th>Designation</th>
                                                <th>GCTC</th>
                                                <th>RELOCATION</th>
                                                <th>Qualification</th>
                                                <th>Qualification Type</th>
                                                <th>YOP</th>
                                                <th>Stream</th>
                                                <th>Institute</th>
                                                <th>DSHARING</th>
                                                <th>Recruiter Remarks</th>
                                                <th>Company Status</th>
                                                <th>Current Salary</th>
                                                <th>Fixed CTC</th>
                                                <th>Expected Salary</th>
                                                <th>Notice Period</th>
                                                <th>Contact No.</th>
                                                <th>E-mail</th>
                                                <th>Selected</th>
                                                <th>Joined</th>
                                                <th>Status</th>
                                                <th>Source</th>
                                                <th>Candidate Department</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while ($row = $result->fetch_assoc()) {?>

                                            <tr>

                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['dat']; ?></td>
                                                <td><?= $row['data']; ?></td>
                                                <td><?= $row['uploaded']; ?></td>
                                                <td><?= $row['clientname']; ?></td>
                                                <td><?= $row['workingdept']; ?></td>
                                                <td><?= $row['positionname']; ?></td>
                                                <td><?= $row['erecno']; ?></td>
                                                <td><?= $row['candidateno']; ?></td>
                                                <td><?= $row['applicationno']; ?></td>
                                                <td><?= $row['adharcardno']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['cvposition']; ?></td>
                                                <td><?= $row['dob']; ?></td>
                                                <td><?= $row['age']; ?></td>
                                                <td><?= $row['fname']; ?></td>
                                                <td><?= $row['mname']; ?></td>
                                                <td><?= $row['maritial']; ?></td>
                                                <td><?= $row['address']; ?></td>
                                                <td><?= $row['peraddress']; ?></td>
                                                <td><?= $row['experience']; ?></td>
                                                <td><?= $row['tpexp']; ?></td>
                                                <td><?= $row['pexp']; ?></td>
                                                <td><?= $row['rexp']; ?></td>
                                                <td><?= $row['cunit']; ?></td>
                                                <td><?= $row['unit']; ?></td>
                                                <td><?= $row['fexp']; ?></td>
                                                <td><?= $row['cexp']; ?></td>
                                                <td><?= $row['ectc']; ?></td>
                                                <td><?= $row['companyname']; ?></td>
                                                <td><?= $row['pcompanyname']; ?></td>
                                                <td><?= $row['workingfrom']; ?></td>
                                                <td><?= $row['workingto']; ?></td>
                                                <td><?= $row['clocation']; ?></td>
                                                <td><?= $row['designation']; ?></td>
                                                <td><?= $row['gctc']; ?></td>
                                                <td><?= $row['relocate']; ?></td>
                                                <td><?= $row['qualification']; ?></td>
                                                <td><?= $row['qualificationtype']; ?></td>
                                                <td><?= $row['yop']; ?></td>
                                                <td><?= $row['stream']; ?></td>
                                                <td><?= $row['institute']; ?></td>
                                                <td><?= $row['dsharing']; ?></td>
                                                <td><?= $row['premarks']; ?></td>
                                                <td><?= $row['cstatus']; ?></td>
                                                <td><?= $row['currentsal']; ?></td>
                                                <td><?= $row['fctc']; ?></td>
                                                <td><?= $row['expectedsal']; ?></td>
                                                <td><?= $row['noticeperiod']; ?></td>
                                                <td><?= $row['phone']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['selected1']; ?></td>
                                                <td><?= $row['joined1']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td><?= $row['source']; ?></td>
                                                <td><?= $row['department']; ?></td>
                                                <td><a href="../recruiter/actions/refinery/<?php echo $row['resume']; ?>"
                                                        download="<?php echo $row['resume'] . $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>"
                                                        class="badge badge-danger p-2"><i class="fa fa-file-pdf-o"
                                                            aria-hidden="true">Document</i></a></td>
                                                <td>
                                                    <?php
                                                $_SESSION['name'];
                                                $query = mysqli_query($conn,"SELECT * FROM registration WHERE name='".$_SESSION['name']."'");
                                                while($row = mysqli_fetch_array($query)) {
                                                  $role = $row['role'];
                                                }
                                                if($role == 'SuperAdmin') { ?>
                                                    <button type="button" class="btn btn-danger deletebtn"> DELETE
                                                    </button>|
                                                    <?php } ?>
                                                    <button type="button" class="btn btn-success editbtn"> EDIT
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                    <?php } 
                                        $sql1 = "SELECT * FROM refinery";
                                        $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                                        if(mysqli_num_rows($result1) > 0) {
                                        $total_records = mysqli_num_rows($result1);
                                        $total_page = ceil($total_records / $limit);
                                        $total_pages = ceil($total_records / $limit);    
                                        echo '<nav>
                                        <ul class="pagination rounded-flat pagination-success">';
                                        if ($page > 1)
                                        echo '<li class="page-item"><a class="page-link" href="addrefinerycandidate.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>'; 

                                        $show = 0;
                                        for ($i = $page; $i <= $total_pages; $i++) {
                                        $show++;
                                        if($i == $page){
                                            $active = "active";
                                        }else{
                                            $active = "";
                                        }
                                        if ($page == $i)
                                        
                                        echo '<li class="page-item '.$active.' "><a class="page-link" href="addrefinerycandidate.php?page='.$i.'">'.$i.'</a></li>';
                                        else if (($show < 10) || ($total_pages == $i))
                                        echo '<li class="page-item '.$active.' "><a class="page-link" href="addrefinerycandidate.php?page='.$i.'">'.$i.'</a></li>';
                                        else
                                            echo "<li class='page-item dot'>.</li>";
                                        }

                                        if ($total_pages > $page)
                                        echo '<li class="page-item"><a class="page-link" href="addrefinerycandidate.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                                        echo '</ul>
                                        </nav>';
                                        }                  
                                    ?>
                                </div>
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
    <script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);

        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#dat').val(data[1]);
            $('#data').val(data[2]);
            $('#uploaded').val(data[3]);
            $('#clientname').val(data[4]);
            $('#workingdept').val(data[5]);
            $('#positionname').val(data[6]);
            $('#erecno').val(data[7]);
            $('#candidateno').val(data[8]);
            $('#applicationno').val(data[9]);
            $('#adharcardno').val(data[10]);
            $('#name').val(data[11]);
            $('#cvposition').val(data[12]);
            $('#dob').val(data[13]);
            $('#age').val(data[14]);
            $('#fname').val(data[15]);
            $('#mname').val(data[16]);
            $('#maritial').val(data[17]);
            $('#address').val(data[18]);
            $('#peraddress').val(data[19]);
            $('#experience').val(data[20]);
            $('#tpexp').val(data[21]);
            $('#pexp').val(data[22]);
            $('#rexp').val(data[23]);
            $('#cunit').val(data[24]);
            $('#unit').val(data[25]);
            $('#fexp').val(data[26]);
            $('#cexp').val(data[27]);
            $('#ectc').val(data[28]);
            $('#companyname').val(data[29]);
            $('#pcompanyname').val(data[30]);
            $('#workingfrom').val(data[31]);
            $('#workingto').val(data[32]);
            $('#clocation').val(data[33]);
            $('#designation').val(data[34]);
            $('#gctc').val(data[35]);
            $('#relocate').val(data[36]);
            $('#qualification').val(data[37]);
            $('#qualificationtype').val(data[38]);
            $('#yop').val(data[39]);
            $('#stream').val(data[40]);
            $('#institute').val(data[41]);
            $('#dsharing').val(data[42]);
            $('#premarks').val(data[43]);
            $('#cstatus').val(data[44]);
            $('#currentsal').val(data[45]);
            $('#fctc').val(data[46]);
            $('#expectedsal').val(data[47]);
            $('#noticeperiod').val(data[48]);
            $('#phone').val(data[49]);
            $('#email').val(data[50]);
            $('#selected1').val(data[51]);
            $('#joined1').val(data[52]);
            $('#status').val(data[53]);
            $('#source').val(data[54]);
            $('#department').val(data[55]);


        });
    });
    </script>
    <style>
    li.dot {
        display: block;
        color: white;
        text-align: center;
        padding: 16px;
        text-decoration: none;
    }
    </style>