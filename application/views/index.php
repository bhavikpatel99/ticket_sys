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
          <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="nav-icon fas fa-tasks"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Employees Assign Task</span>
                      <span class="info-box-number"><?=$this->db->count_all('tbltask');?></span>
                  </div>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->