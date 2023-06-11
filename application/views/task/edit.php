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
                          <li class="breadcrumb-item"><a href="<?=site_url('Home');?>">Task Management</a></li>
                          <li class="breadcrumb-item active">Task Update</li>
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
                  <h3 class="card-title">Update a Assign Task</h3>
              </div>
              <div class="card-body col-12">
                  <?php
                    foreach ($taskinfo as $taskinfo)
                    {
                   ?>
                  <form method="POST" action="<?=base_url('Task/update/');?><?=$taskinfo->taskId?>">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <select class="form-control select2" name="txtemp" id="txtemp" style="width: 100%;"
                                  disabled>
                                  <option value="<?=$taskinfo->userId?>"><?=$taskinfo->empName?></option>
                              </select>
                          </div>
                          <div class="form-group col-sm-6">
                              <label>Task</label>
                              <input type="text" class="form-control" name="txttask" placeholder="Assign a Task"
                                  value="<?=$taskinfo->task?>" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-3">
                              <label>Assign Date</label>
                              <input type="date" class="form-control" name="txtassigndate"
                                  value="<?=$taskinfo->assignDate?>" required />
                          </div>
                          <div class="form-group col-sm-3">
                              <label>Due Date</label>
                              <input type="date" class="form-control" name="txtduedate" value="<?=$taskinfo->dueDate?>"
                                  required>
                          </div>
                      </div>
                      <button class="btn btn-primary col-sm-3">
                          <i class="fas fa-tasks"></i> Update
                      </button>
                  </form>
                  <?php
                    }
                  ?>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </section>
      <!-- /.Emp Form -->
  </div>
  <!-- /.content-wrapper -->