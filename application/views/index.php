  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Welcome To Hemratna Jewellers <b><?php echo $this->session->empName;?></b></h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="nav-icon fas fa-tasks"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Incomplete Task</span>
                          <span class="info-box-number text-red">
                              <?php
                            $this->db->select('*');
                            $this->db->from('tbltask');
                            $this->db->where('taskStatus',1);
                            echo $this->db->count_all_results();
                            ?>
                          </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="nav-icon fas fa-tasks   "></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Complete Task</span>
                          <span class="info-box-number text-green">
                              <?php
                            $this->db->select('*');
                            $this->db->from('tbltask');
                            $this->db->where('taskStatus',0);
                            echo $this->db->count_all_results();
                            ?>
                          </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="nav-icon fas fa-user"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Employees</span>
                          <span class="info-box-number">
                              <?php
                            $this->db->select('*');
                            $this->db->from('tbluser');
                            $this->db->where('userLevel',1);
                            echo $this->db->count_all_results();
                            ?>
                          </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="nav-icon fas fa-user"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Manager</span>
                          <span class="info-box-number">
                              <?php
                            $this->db->select('*');
                            $this->db->from('tbluser');
                            $this->db->where('userLevel',2);
                            echo $this->db->count_all_results();
                            ?>
                          </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
          </div>

          <!-- /.col -->
          <!--Task List -->
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
                                              <th>Task Status</th>
                                              <th>Assign Task</th>
                                              <th>Assign Date</th>
                                              <th>Due Date</th>
                                              <th>Tools</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                                foreach ($task_lst as $task_lst)
                                                {
                                            ?>
                                          <tr>
                                              <td><?=$task_lst->empName?></td>
                                              <td> <?php   
                                                if($task_lst->taskStatus == 1)
                                                {
                                              ?>
                                                  <span class="text-red">Incomplete</span>
                                                  <?php
                                                }
                                                else
                                                {
                                              ?>
                                                  <span class="text-green">Complete</span>
                                                  <?php
                                              }
                                              ?>
                                              </td>
                                              <td><?=$task_lst->task?></td>
                                              <td><?=$task_lst->assignDate?></td>
                                              <td><?=$task_lst->dueDate?></td>
                                              <td>
                                                  <a href="<?=base_url('Task/delete/');?><?=$task_lst->taskId?>"><button
                                                          class="btn btn-danger"><i
                                                              class="fas fa-trash"></i></button></a>
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
          <!-- /.Task List -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->