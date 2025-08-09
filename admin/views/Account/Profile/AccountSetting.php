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
              <h1>Account Setting</h1>
          </div>
          <div class="row mb-2">
              <div class="col-sm-6">
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- /.row -->
          <div class="container">
              <hr>
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-3">
                      <div class="text-center">
                          <img src="<?= BASE_URL_ADMIN . $data['anh_dai_dien'] ?>" width="100px" class="avatar img-circle" alt="avatar"
                              onerror="this.onerror=null; this.src='https://www.pngplay.com/wp-content/uploads/12/Anime-Girl-Pfp-PNG-HD-Quality.png'">
                          <h4 class="mt-2"><strong><?= $data['ho_ten'] ?></strong></h4>
                          <h6 class="mt-2"><?= $data['chuc_vu_id'] == 1 ? 'Admin' : 'Client' ?? '' ?></h6>
                      </div>
                  </div>

                  <!-- edit form column -->
                  <div class="col-md-9 personal-info">
                      <hr>
                      <?php if (isset($_SESSION['information_changed'])) { ?>
                          <div class="alert alert-info alert-dismissable">
                              <a class="panel-close close" data-dismiss="alert">×</a>
                              <i class="fa fa-coffee"></i>
                              <?= $_SESSION['information_changed'] ?>
                              <?php unset($_SESSION['information_changed']) ?>
                          </div>
                      <?php } ?>
                      <h3>Personal info</h3>

                      <form class="form-horizontal" role="form" action="<?= BASE_URL_ADMIN . '?act=Update-Account' ?>" method="POST">
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Fullname:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="<?= $data['ho_ten'] ?? '' ?>" name="ho_ten">
                              </div>
                              <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Date of birth:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="date" value="<?= $data['ngay_sinh'] ?? '' ?>" name="ngay_sinh">
                              </div>
                              <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Email:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="email" value="<?= $data['email'] ?? '' ?>" name="email">
                              </div>
                              <?php if (isset($_SESSION['error']['email'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Phone number:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="<?= $data['so_dien_thoai'] ?? '' ?>" name="so_dien_thoai">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Sex:</label>
                              <div class="col-lg-12">
                                  <select class="form-control custom-select" name="gioi_tinh">
                                      <option selected disabled>Sex</option>
                                      <option <?= $data['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Male</option>
                                      <option <?= $data['gioi_tinh'] == 2 ? 'selected' : '' ?> value="2">Female</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Address:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="<?= $data['dia_chi'] ?? '' ?>" name="dia_chi">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Avatar:</label>
                              <div class="col-lg-12">
                                  <input type="file" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label"></label>
                              <div class="col-md-12">
                                  <input type="submit" class="btn btn-primary" value="Save Changes">
                              </div>
                          </div>
                      </form>

                      <hr>
                      <?php if (isset($_SESSION['password_changed'])) { ?>
                          <div class="alert alert-info alert-dismissable">
                              <a class="panel-close close" data-dismiss="alert">×</a>
                              <i class="fa fa-coffee"></i>
                              <?= $_SESSION['password_changed'] ?>
                              <?php unset($_SESSION['password_changed']) ?>
                          </div>
                      <?php } ?>
                      <h3>Change Password</h3>
                      <?php if (isset($_SESSION['error']['old_password_notify'])) { ?>
                          <p class="text-danger"><?= $_SESSION['error']['old_password_notify'] ?></p>
                      <?php } else { ?>
                          <p class="text-danger"><?= $_SESSION['error']['confirm_password_notify'] ?? '' ?></p>
                      <?php } ?>
                      <form action="<?= BASE_URL_ADMIN . '?act=Update-Password' ?>" method="POST">
                          <div class="form-group">
                              <label class="col-md-3 control-label">Old password</label>
                              <div class="col-md-12">
                                  <input class="form-control" name="old_password" type="password">
                              </div>
                              <?php if (isset($_SESSION['error']['old_password'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['old_password'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label">New password:</label>
                              <div class="col-md-12">
                                  <input class="form-control" name="new_password" type="password">
                              </div>
                              <?php if (isset($_SESSION['error']['new_password'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['new_password'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label">Confirm password:</label>
                              <div class="col-md-12">
                                  <input class="form-control" name="confirm_password" type="password">
                              </div>
                              <?php if (isset($_SESSION['error']['confirm_password'])) { ?>
                                  <p class="text-danger"><?= $_SESSION['error']['confirm_password'] ?></p>
                              <?php } ?>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label"></label>
                              <div class="col-md-12">
                                  <input type="submit" class="btn btn-primary" value="Save Changes">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <hr>

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
  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
          });
      });
  </script>

  </html>