  <!-- Header -->
  <?php include './views/layout/Header.php' ?>

  <!-- Navbar -->
  <?php include './views/layout/Navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layout/Sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Admin Account Management</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Modify Admin Account: <?= $admin['ho_ten'] ?></h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=Edit-Admin' ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                              <div class="card-body">
                                  <div class="form-group col-12">
                                      <label>Full Name</label>
                                      <input type="text" class="form-control" name="ho_ten" value="<?= $admin['ho_ten'] ?>" placeholder="Enter Full name">
                                      <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="form-group col-12">
                                      <label>Email</label>
                                      <input type="email" class="form-control" name="email" value="<?= $admin['email'] ?>" placeholder="Enter Email">
                                      <?php if (isset($_SESSION['error']['email'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="form-group col-12">
                                      <label>Phone Number</label>
                                      <input type="text" class="form-control" name="so_dien_thoai" value="<?= $admin['so_dien_thoai'] ?>" placeholder="Enter Phone Number">
                                      <?php if (isset($_SESSION['error']['email'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="form-group col-12">
                                      <label>Status</label>
                                      <Select id="inputStatus" name="trang_thai_tai_khoan" class="form-control custom-select">
                                        <Option <?= $admin['trang_thai'] == 1 ? 'Select': ''?> value="1">Active</Option>
                                        <Option <?= $admin['trang_thai'] == 2 ? 'Select': ''?> value="2">Inctive</Option>
                                      </Select>
                                  </div>
                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Footer -->
  <?php include './views/layout/Footer.php' ?>
  <!-- End Footer -->

  </body>

  </html>