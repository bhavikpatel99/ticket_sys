  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Employee</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?=site_url('Home');?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?=site_url('Emp');?>">Employee Management</a></li>
                          <li class="breadcrumb-item active">Edit Employee</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Emp Form -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Update Employee Detail</h3>
              </div>
              <div class="card-body col-12">
                  <?php
                        foreach ($userinfo as $userinfo)
                        {
                    ?>
                  <form method="POST" action="<?=base_url('Emp/update/');?><?=$userinfo->userId?>">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Department</label>
                              <input type="text" class="form-control" name="txtdeptname"
                                  placeholder="Enter Employee Department Name" value="<?=$userinfo->deptName?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <input type="text" class="form-control" name="txtempname"
                                  placeholder="Enter Employee Name" value="<?=$userinfo->empName?>">
                          </div>
                          <div class="form-group  col-sm-6">
                              <label>Employee Name</label>
                              <select class="form-control select2" name="txtemptype" id="txtemptype"
                                  style="width: 100%;">
                                  <option value="--Select--">--Select--</option>
                                  <option value="1">Employee</option>
                                  <option value="2">Manager</option>
                              </select>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Email Id</label>
                              <input type="text" class="form-control" name="txtemail"
                                  placeholder="Enter Employee Email Id" value="<?=$userinfo->emailId?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Whatsapp Number</label>
                              <input type="text" class="form-control" name="txtwnumber"
                                  placeholder="Enter Employee Whatsapp Number" value="<?=$userinfo->whatsappNumber?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Password</label>
                              <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password"
                                  value="<?=md5($userinfo->password)?>">
                          </div>

                      </div>
                      <?php
                            }
                      ?>
                      <button class="btn btn-primary col-sm-3">
                          Update
                      </button>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </section>
      <!-- /.Emp Form -->
  </div>
  <!-- /.content-wrapper -->