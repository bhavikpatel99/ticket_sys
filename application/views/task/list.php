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
                          <?php
                                if($this->session->userLevel == 0)
                                {
                            ?>
                          <li class="breadcrumb-item"><a href="<?=site_url('Home');?>">Home</a></li>
                          <?php
                                }
                          ?>
                          <li class="breadcrumb-item active">Task Management</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <?php
        if($this->session->userLevel == 0)
        {
    ?>
      <!-- Task list view buttons -->
      <section class="content">
          <a class="btn btn-primary" href="<?=site_url('Task/send_task')?>"><i class="fas fa-upload"></i> Send Task
              List</a>
      </section>
      <br>
      <?php
        }
        else
        {
      ?>
      <!-- Task list view buttons -->
      <section class="content">
          <a class="btn btn-primary" href="<?=site_url('Task/send_task')?>"><i class="fas fa-upload"></i> Send Task
              List</a>
          <a class="btn btn-primary" href="<?=site_url('Task/recive_task')?>"><i class="fas fa-download"></i> Recive
              Task List</a>
      </section>
      <br>
      <?php
      }
        if ($this->session->flashdata('alert')) {
            echo '<script>alert("' . $this->session->flashdata('alert') . '");</script>';
        }
      ?>
      <!-- Task Form -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Assign a Task to Employee</h3>
              </div>
              <div class="card-body col-12">
                  <form method="POST" action="<?=base_url('Task/add');?>">
                      <div class="row">
                          <div class="form-group col-sm-6">
                              <label>Employee Name</label>
                              <select class="form-control select2" name="txtemp" id="txtemp" style="width: 100%;">
                                  <option>--Select--</option>
                                  <?php
                                    foreach ($emp_lst as $emp_lst)
                                    {
                                    ?>
                                  <option value="<?=$emp_lst->userId?>"><?=$emp_lst->empName?></option>
                                  <?php
                                    }
                                  ?>
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
                              <input type="date" class="form-control" name="txtassigndate"
                                  value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
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
      <!-- /.Task Form -->
  </div>
  <!-- /.content-wrapper -->