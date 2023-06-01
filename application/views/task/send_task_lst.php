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
                          <li class="breadcrumb-item active">Send Task List</li>
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
                              <h3 class="card-title">Send Task List</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example_task" name="example_task" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>Sr.No</th>
                                          <th>Employee</th>
                                          <th>Task</th>
                                          <th>Assign Date</th>
                                          <th>Due Date</th>
                                          <th>Tools</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        foreach ($task_lst_id as $task_lst)
                                        {
                                        ?>
                                      <tr>
                                          <td>1</td>
                                          <td><?=$task_lst->empName?></td>
                                          <td><?=$task_lst->task?></td>
                                          <td><?=$task_lst->assignDate?></td>
                                          <td><?=$task_lst->dueDate?></td>
                                          <td>
                                              <a href="<?=base_url('Task/edit/');?><?=$task_lst->taskId?>"><button
                                                      class="btn btn-warning"><i
                                                          class="fas fa-edit"></i></button></a>&nbsp
                                              <a href="<?=base_url('Task/delete/');?><?=$task_lst->taskId?>"><button
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
                  <!-- /send task list -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->