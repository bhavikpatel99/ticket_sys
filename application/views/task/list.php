  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Task Management</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?=site_url('Home');?>">Home</a></li>
                          <li class="breadcrumb-item active">Task Management</li>
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
                  <h3 class="card-title">Assign a Task to Employee</h3>
              </div>
              <div class="card-body col-12">
                  <form method="POST" action="">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <select class="form-control select2" name="txtemp" id="txtemp" style="width: 100%;">
                                  <option>--Select--</option>
                                  <option>EMP1</option>
                                  <option>EMP2</option>
                              </select>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Task</label>
                              <input type="text" class="form-control" name="txttask" placeholder="Assign a Task"
                                  required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-3">
                              <label>Assign Date</label>
                              <input type="date" class="form-control" name="txtduedate" required />
                          </div>
                          <div class="form-group col-sm-3">
                              <label>Due Date</label>
                              <input type="date" class="form-control" name="txtduedate" required>
                          </div>
                      </div>
                      <button class="btn btn-primary col-sm-3">
                          <i class="fas fa-tasks"></i> Assign
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
                              <h3 class="card-title">Task List</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example_task" name="example_task" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>Employee Name</th>
                                          <th>Assign Task</th>
                                          <th>Assign Date</th>
                                          <th>Due Date</th>
                                          <th>Tools</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>ABCD</td>
                                          <td>TASK1</td>
                                          <td>8-5-2023</td>
                                          <td>8-5-2023</td>
                                          <td>
                                              <button class="btn btn-warning"><i class="fas fa-edit"></i></button>&nbsp
                                              <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                          </td>
                                      </tr>
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