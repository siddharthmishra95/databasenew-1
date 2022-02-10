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
      <!-- Modal -->
      <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Joining Data </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/joining/insertjoining.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">DAT</label>
                      <div class="col-sm-8">
                        <input name="dat" value="<?php date_default_timezone_set('Asia/Kolkata');
                                                    $currentDateTime = date('d-M-Y H:i:s a');
                                                    echo $currentDateTime; ?>" readonly="readonly"
                          class="form-group form-control">
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
                      <label class="col-sm-4 col-form-label">Date Offer</label>
                      <div class="col-sm-8">
                        <input type="date" name="datoffer" value="<?= $datoffer;  ?>" required=""
                          class="form-group form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Month Offer</label>
                      <div class="col-sm-8">
                        <input type="month" name="month" value="<?= $month;  ?>" class="form-control"
                          placeholder="Month Offer" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Employee</label>
                      <div class="col-sm-8">
                        <input type="text" name="uploaded" value="<?= $_SESSION['name'];  ?>" class="form-control"
                          placeholder="uploaded" required="" readonly="readonly">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Employee Code</label>
                      <div class="col-sm-8">
                        <input type="text" name="empid" value="<?php echo $_SESSION['empid'] ?>" class="form-control"
                          required="" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Candidate Name</label>
                      <div class="col-sm-8">

                        <input type="text" name="candidatename" value="<?= $candidatename;  ?>" class="form-control"
                          placeholder="Candidate Name" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Selected Company</label>
                      <div class="col-sm-8">
                        <input type="text" name="selectedcomp" value="<?= $selectedcomp ?>" class="form-control"
                          required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Contact Person</label>
                      <div class="col-sm-8">
                        <input type="text" name="contactper" value="<?= $contactper;  ?>" class="form-control"
                          placeholder="Contact Person" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Previous Company</label>
                      <div class="col-sm-8">
                        <input type="text" name="precomp" value="<?= $precomp;  ?>" class="form-control"
                          placeholder="Previous Company" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Department</label>
                      <div class="col-sm-8">
                        <input type="text" name="dept" value="<?= $dept;  ?>" class="form-control"
                          placeholder="Department" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Salary</label>
                      <div class="col-sm-8">
                        <input type="text" name="sal" value="<?= $sal;  ?>" class="form-control"
                          placeholder="Department" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Contact Number</label>
                      <div class="col-sm-8">
                        <input type="text" name="contact" value="<?= $contact;  ?>" class="form-control"
                          placeholder="Contact Number" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date Of Joining</label>
                      <div class="col-sm-8">
                        <input type="date" name="doj" value="<?= $doj;  ?>" class="form-control"
                          placeholder="Date Of Joining" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Current Address</label>
                      <div class="col-sm-8">
                        <input type="text" name="currentadd" value="<?= $currentadd;  ?>" class="form-control"
                          placeholder="Current Address" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Permanent Address</label>
                      <div class="col-sm-8">
                        <input type="text" name="peradd" value="<?= $peradd;  ?>" class="form-control"
                          placeholder="Permanent Address" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select name="status" class="form-control" id="status" value="<?= $status; ?>">
                          <option value="">Status</option>
                          <option value="Joined">Pending</option>
                          <option value="NJ">NOT JOINED</option>
                          <option value="YTJ">YET TO JOINED</option>
                          <option value="Left">LEFT</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" name="remarks" value="<?= $remarks;  ?>" class="form-control"
                          placeholder="Remarks" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Upload</label>
                      <div class="col-sm-8">

                        <input type="file" name="resume" value="<?= $resume;  ?>" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled=""
                            placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
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

            <form action="actions/joining/updatejoining.php" method="POST" enctype="multipart/form-data">
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
                      <label class="col-sm-4 col-form-label">Date Offer</label>
                      <div class="col-sm-8">
                        <input type="date" id="datoffer" name="datoffer" value="<?= $datoffer;  ?>" required=""
                          class="form-group form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Month Offer</label>
                      <div class="col-sm-8">
                        <input type="month" id="month" name="month" value="<?= $month;  ?>" class="form-control"
                          placeholder="Month Offer" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Employee</label>
                      <div class="col-sm-8">
                        <input type="text" id="uploaded" name="uploaded" value="<?= $uploaded ?>" class="form-control"
                          placeholder="uploaded" required="" readonly="readonly">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Employee Code</label>
                      <div class="col-sm-8">
                        <input type="text" id="empid" name="empid" value="<?php $empid ?>" class="form-control"
                          required="" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Candidate Name</label>
                      <div class="col-sm-8">

                        <input type="text" id="candidatename" name="candidatename" value="<?= $candidatename;  ?>"
                          class="form-control" placeholder="Candidate Name" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Selected Company</label>
                      <div class="col-sm-8">
                        <input type="text" id="selectedcomp" name="selectedcomp" value="<?= $selectedcomp ?>"
                          class="form-control" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Contact Person</label>
                      <div class="col-sm-8">
                        <input type="text" id="contactper" name="contactper" value="<?= $contactper;  ?>"
                          class="form-control" placeholder="Contact Person" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Previous Company</label>
                      <div class="col-sm-8">
                        <input type="text" id="precomp" name="precomp" value="<?= $precomp;  ?>" class="form-control"
                          placeholder="Previous Company" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Department</label>
                      <div class="col-sm-8">
                        <input type="text" id="dept" name="dept" value="<?= $dept;  ?>" class="form-control"
                          placeholder="Department" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Salary</label>
                      <div class="col-sm-8">
                        <input type="text" id="sal" name="sal" value="<?= $sal;  ?>" class="form-control"
                          placeholder="Department" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Contact Number</label>
                      <div class="col-sm-8">
                        <input type="text" id="contact" name="contact" value="<?= $contact;  ?>" class="form-control"
                          placeholder="Contact Number" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date Of Joining</label>
                      <div class="col-sm-8">
                        <input type="date" id="doj" name="doj" value="<?= $doj;  ?>" class="form-control"
                          placeholder="Date Of Joining" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Current Address</label>
                      <div class="col-sm-8">
                        <input type="text" id="currentadd" name="currentadd" value="<?= $currentadd;  ?>"
                          class="form-control" placeholder="Current Address" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Permanent Address</label>
                      <div class="col-sm-8">
                        <input type="text" id="peradd" name="peradd" value="<?= $peradd;  ?>" class="form-control"
                          placeholder="Permanent Address" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select name="status" id="status" class="form-control" id="status" value="<?= $status; ?>">
                          <option value="">Status</option>
                          <option value="Joined" <?php  
                                                    if($row['status']=='Joined'){
                                                        echo "selected";
                                                    }
                                                    ?>>Joined</option>
                          <option value="NJ" <?php  
                                                    if($row['status']=='NJ'){
                                                        echo "selected";
                                                    }
                                                    ?>>NOT JOINED</option>
                          <option value="YTJ" <?php  
                                                    if($row['status']=='YTJ'){
                                                        echo "selected";
                                                    }
                                                    ?>>YET TO JOINED</option>
                          <option value="Left" <?php  
                                                    if($row['status']=='Left'){
                                                        echo "selected";
                                                    }
                                                    ?>>LEFT</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" id="remarks" name="remarks" value="<?= $remarks;  ?>" class="form-control"
                          placeholder="Remarks" required="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Upload</label>
                      <div class="col-sm-8">
                        <input type="hidden" name="oldresume" value="<?= $resume;  ?>" class="file-upload-default">
                        <input type="file" name="resume" value="<?= $resume;  ?>" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled=""
                            placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatejoining" class="btn btn-primary">Update
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

            <form action="actions/joining/deletejoining.php" method="POST">

              <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                <button type="submit" name="deletejoining" class="btn btn-primary"> Yes !! Delete
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
              <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4 float-right"
                data-toggle="modal" data-target="#studentaddmodal">
                <i class="mdi mdi-note-plus text-white mr-0 mr-sm-4 icon-lg"></i>
                ADD JOINING
              </button>
            </div>
          </div>

          <div class="col-12">
            <?php
                                                $_SESSION['name'];
                                                $query = mysqli_query($conn,"SELECT * FROM registration WHERE name='".$_SESSION['name']."'");
                                                while($row = mysqli_fetch_array($query)) {
                                                  $role = $row['role'];
                                                }
                                                if($role == 'SuperAdmin') { ?>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Joinings</h4>
                <div class="table-responsive">
                  <?php 
                     
                      $limit = 30;
                      
                      if(isset($_GET['page'])){
                        $page = $_GET['page'];
                      }else{
                        $page = 1;
                      }
                      $offset = ($page - 1) * $limit;
                      $sql = "SELECT * FROM products ORDER BY id DESC LIMIT {$offset},{$limit}";
                      $cnt=1;
                      $result = mysqli_query($conn, $sql ) or die("Query failed");
                      if(mysqli_num_rows($result) > 0){
                    ?>
                  <table id="example" class="table table-striped table-bordered display responsive nowrap"
                    cellspacing="0" style="width:100%">

                    <thead>
                      <tr>

                        <th>ID</th>
                        <th>DAT</th>
                        <th>DATA</th>
                        <th>Date Offer</th>
                        <th>Month Offer</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Candidate Name</th>
                        <th>Selected Company</th>
                        <th>Contact Person</th>
                        <th>Previous Company</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Contact Number</th>
                        <th>Date Of Joining</th>
                        <th>Current Address</th>
                        <th>Permanent Address</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Document</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php while ($row = $result->fetch_assoc()) {?>

                      <tr>

                        <td><?= $row['id']; ?></td>
                        <td><?= $row['dat']; ?></td>
                        <td><?= $row['data']; ?></td>
                        <td><?= $row['datoffer']; ?></td>
                        <td><?= $row['month']; ?></td>
                        <td><?= $row['uploaded']; ?></td>
                        <td><?= $row['empid']; ?></td>
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
                        <td><a href="../recruiter/actions/joining/<?php echo $row['resume']; ?>"
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
                                        $sql1 = "SELECT * FROM products";
                                        $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                                        if(mysqli_num_rows($result1) > 0) {
                                        $total_records = mysqli_num_rows($result1);
                                        $total_page = ceil($total_records / $limit);
                                        echo '<nav>
                                        <ul class="pagination rounded-flat pagination-success">';
                                        if($page > 1){
                                            echo '<li class="page-item"><a class="page-link" href="addjoining.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                                        }
                                        
                                        for($i = 1; $i <= $total_page; $i++) {
                                            if($i == $page){
                                            $active = "active";
                                            }else{
                                            $active = "";
                                            }
                                            echo '<li class="page-item '.$active.' "><a class="page-link" href="addjoining.php?page='.$i.'">'.$i.'</a></li>';
                                        }
                                        if($total_page > $page){
                                            echo '<li class="page-item"><a class="page-link" href="addjoining.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                                        }
                                        
                                        echo '</ul>
                                        </nav>';
                                        }
                                    ?>
                </div>
              </div>
            </div>
            <?php  } elseif($role == "users") { ?>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Joinings</h4>
                <div class="table-responsive">
                  <?php 
                     
                      $limit = 30;
                      
                      if(isset($_GET['page'])){
                        $page = $_GET['page'];
                      }else{
                        $page = 1;
                      }
                      $offset = ($page - 1) * $limit;
                      $sql = "SELECT * FROM products WHERE empid=$_SESSION[empid] ORDER BY id DESC LIMIT {$offset},{$limit}";
                      $cnt=1;
                      $result = mysqli_query($conn, $sql ) or die("Query failed");
                      if(mysqli_num_rows($result) > 0){
                    ?>
                  <table id="example" class="table table-striped table-bordered display responsive nowrap"
                    cellspacing="0" style="width:100%">

                    <thead>
                      <tr>

                        <th>ID</th>
                        <th>DAT</th>
                        <th>DATA</th>
                        <th>Date Offer</th>
                        <th>Month Offer</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Candidate Name</th>
                        <th>Selected Company</th>
                        <th>Contact Person</th>
                        <th>Previous Company</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Contact Number</th>
                        <th>Date Of Joining</th>
                        <th>Current Address</th>
                        <th>Permanent Address</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Document</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php while ($row = $result->fetch_assoc()) {?>

                      <tr>

                        <td><?= $row['id']; ?></td>
                        <td><?= $row['dat']; ?></td>
                        <td><?= $row['data']; ?></td>
                        <td><?= $row['datoffer']; ?></td>
                        <td><?= $row['month']; ?></td>
                        <td><?= $row['uploaded']; ?></td>
                        <td><?= $row['empid']; ?></td>
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
                        <td><a href="../recruiter/actions/joining/<?php echo $row['resume']; ?>"
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
                                        $sql1 = "SELECT * FROM products WHERE empid=$_SESSION[empid]";
                                        $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                                        if(mysqli_num_rows($result1) > 0) {
                                        $total_records = mysqli_num_rows($result1);
                                        $total_page = ceil($total_records / $limit);
                                        echo '<nav>
                                        <ul class="pagination rounded-flat pagination-success">';
                                        if($page > 1){
                                            echo '<li class="page-item"><a class="page-link" href="addjoining.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                                        }
                                        
                                        for($i = 1; $i <= $total_page; $i++) {
                                            if($i == $page){
                                            $active = "active";
                                            }else{
                                            $active = "";
                                            }
                                            echo '<li class="page-item '.$active.' "><a class="page-link" href="addjoining.php?page='.$i.'">'.$i.'</a></li>';
                                        }
                                        if($total_page > $page){
                                            echo '<li class="page-item"><a class="page-link" href="addjoining.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                                        }
                                        
                                        echo '</ul>
                                        </nav>';
                                        }
                                    ?>
                </div>
              </div>
            </div>
            <?php } ?>

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
      $('#datoffer').val(data[3]);
      $('#month').val(data[4]);
      $('#uploaded').val(data[5]);
      $('#empid').val(data[6]);
      $('#candidatename').val(data[7]);
      $('#selectedcomp').val(data[8]);
      $('#contactper').val(data[9]);
      $('#precomp').val(data[10]);
      $('#dept').val(data[11]);
      $('#sal').val(data[12]);
      $('#contact').val(data[13]);
      $('#doj').val(data[14]);
      $('#currentadd').val(data[15]);
      $('#peradd').val(data[16]);
      $('#status').val(data[17]);
      $('#remarks').val(data[18]);

    });
  });
  </script>