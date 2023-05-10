  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Employee Management</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?=site_url('Home');?>">Home</a></li>
                          <li class="breadcrumb-item active">Employee Management</li>
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
                  <h3 class="card-title">Add New Employee</h3>
              </div>
              <div class="card-body col-12">
                  <form method="POST" action="<?=site_url('Emp/add');?>">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Department</label>
                              <input type="text" class="form-control" name="txtdeptname"
                                  placeholder="Enter Employee Department Name" required>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <input type="text" class="form-control" name="txtempname"
                                  placeholder="Enter Employee Name" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Email Id</label>
                              <input type="text" class="form-control" name="txtemail"
                                  placeholder="Enter Employee Email Id" required>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Whatsapp Number</label>
                              <input type="text" class="form-control" name="txtwnumber"
                                  placeholder="Enter Employee Whatsapp Number" required>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Role</label>
                              <select class="form-control select2" name="txtrole" id="txtrole" style="width: 100%;">
                                  <option>--Select--</option>
                                  <option value="1">Manager</option>
                                  <option value="2">Employee</option>
                              </select>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Password</label>
                              <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password"
                                  required>
                          </div>
                      </div>
                      <button class="btn btn-primary col-sm-3">
                          <i class="fas fa-plus"></i> Add
                      </button>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </section>
      <!-- /.Emp Form -->
      <!--EMP List -->
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Employee List</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example2" name="example2" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>Employee Name</th>
                                          <th>Department</th>
                                          <th>Email Id</th>
                                          <th>Whatsapp Number</th>
                                          <th>Employement Type</th>
                                          <th>Tools</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        foreach ($emp_lst as $emp_lst)
                                        {
                                        ?>
                                      <tr>
                                          <td><?=$emp_lst->empName?></td>
                                          <td><?=$emp_lst->deptName?></td>
                                          <td><?=$emp_lst->emailId?></td>
                                          <td><?=$emp_lst->whatsappNumber?></td>
                                          <td>
                                              <?php
                                                if($emp_lst->userLevel == 0)
                                                {
                                                    echo 'Boss';
                                                }
                                                elseif($emp_lst->userLevel == 1)
                                                {
                                                    echo 'Manager';
                                                }   
                                                else
                                                {
                                                    echo 'Employee';
                                                }
                                                ?>
                                          </td>
                                          <td>
                                              <button class="btn btn-warning" data-toggle="modal"
                                                  data-target="#modal-lg"><i class="fas fa-edit"></i></button>&nbsp
                                              <a href="<?=site_url('Emp/remove/');?><?=$emp_lst->userId?>"><button
                                                      class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                                          </td>
                                      </tr>
                                      <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <!-- /.EMP List -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Edit Model -->
  <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Update Detail</h4>
              </div>
              <?php
                    foreach ($emp_lst_id as $emp_lst_id) 
                    {
                ?>
              <form method="POST" action="<?=site_url('Emp/edit/');?><?=$emp_lst_id->userId?>">
                  <div class="modal-body">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Department</label>
                              <input type="text" class="form-control" name="txtdeptname"
                                  placeholder="Enter Employee Department Name" value="<?=$emp_lst_id->deptName?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <input type="text" class="form-control" name="txtempname"
                                  placeholder="Enter Employee Name" value="<?=$emp_lst_id->empName?>">
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Email Id</label>
                              <input type="text" class="form-control" name="txtemail"
                                  placeholder="Enter Employee Email Id" value="<?=$emp_lst_id->emailId?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Whatsapp Number</label>
                              <input type="text" class="form-control" name="txtwnumber"
                                  placeholder="Enter Employee Whatsapp Number" value="<?=$emp_lst_id->whatsappNumber?>">
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Role</label>
                              <select class="form-control select2" name="txtrole" id="txtrole" style="width: 100%;"
                                  value="<?=$emp_lst_id->userLevel?>">
                                  <option>--Select--</option>
                                  <option value="1">Manager</option>
                                  <option value="2">Employee</option>
                              </select>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Password</label>
                              <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password"
                                  value="<?=$emp_lst_id->passwords?>">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>
              <?php
                    }
              ?>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /Edit Model -->