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
                          <li class="breadcrumb-item"><a href="<?=site_url('Task');?>">Task Management</a></li>
                          <li class="breadcrumb-item active">Recive Task List</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!--Task List -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- send task list -->
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Recive Task List</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example_task" name="example_task" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>Sr.No</th>
                                          <th>Assign By</th>
                                          <th>Task</th>
                                          <th>Assign Date</th>
                                          <th>Due Date</th>
                                          <th>Status</th>
                                          <th>Tools</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $counter = 1;
                                        foreach ($task_lst_id as $task_lst)
                                        {
                                    ?>
                                      <tr>
                                          <td><?= $counter?></td>
                                          <td><?=$task_lst->assign_By?></td>
                                          <td><?=$task_lst->task?></td>
                                          <td><?=$task_lst->assignDate?></td>
                                          <td><?=$task_lst->dueDate?></td>
                                          <td>
                                              <?php   
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
                                          <td>
                                              <?php   
                                                if($task_lst->taskStatus == 1)
                                                {
                                              ?>
                                              <a href="<?=base_url('Task/toggle_status/');?><?=$task_lst->taskId?>"><button
                                                      class="btn btn-primary"><i
                                                          class="fas fa-thumbs-up"></i></button></a>
                                              <?php
                                                }
                                                else
                                                {
                                              ?>
                                              <a href="<?=base_url('Task/toggle_status/');?><?=$task_lst->taskId?>"><button
                                                      class="btn btn-danger"><i
                                                          class="fas fa-thumbs-down"></i></button></a>
                                              <?php
                                              }
                                              ?>
                                          </td>
                                      </tr>
                                      <?php
                                        $counter++;
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
                  <!-- /send task list -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->