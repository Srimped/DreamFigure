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
                      <h1>Order Management</h1>
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
                              <h3 class="card-title">Edit Order: <?= $order['ma_don_hang'] ?></h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=Edit-Order' ?>" method="POST">
                              <div class="card-body">
                                  <div class="form-group">
                                      <input type="text" name="don_hang_id" value="<?= $order['id'] ?>" hidden>
                                      <label>Recipient name</label>
                                      <input type="text" class="form-control" value="<?= $order['ten_nguoi_nhan'] ?>" name="ten_nguoi_nhan" placeholder="Enter a name">
                                      <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['ten_nguoi_nhan'] ?></p>
                                      <?php } ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Phone number</label>
                                      <input type="text" class="form-control" value="<?= $order['sdt_nguoi_nhan'] ?>" name="sdt_nguoi_nhan" placeholder="Enter a phone number">
                                      <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['sdt_nguoi_nhan'] ?></p>
                                      <?php } ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" class="form-control" value="<?= $order['email_nguoi_nhan'] ?>" name="email_nguoi_nhan" placeholder="Enter email">
                                      <?php if (isset($_SESSION['error']['email_nguoi_nhan'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['email_nguoi_nhan'] ?></p>
                                      <?php } ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" class="form-control" value="<?= $order['dia_chi_nguoi_nhan'] ?>" name="dia_chi_nguoi_nhan" placeholder="Enter address">
                                      <?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['dia_chi_nguoi_nhan'] ?></p>
                                      <?php } ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Descriptions</label>
                                      <textarea type="text" class="form-control" name="ghi_chu" placeholder="Give some note..."><?= $order['ghi_chu'] ?></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Status</label>
                                      <select class="form-control custom-select" name="trang_thai_id">
                                          <?php foreach ($statusList as $status): ?>
                                              <option
                                                  <?php
                                                    if (
                                                        $order['trang_thai_id'] > $status['id']
                                                        || $order['trang_thai_id'] == 9
                                                        || $order['trang_thai_id'] == 10
                                                        || $order['trang_thai_id'] == 11
                                                    ) {
                                                        echo 'disabled';
                                                    }
                                                    ?>
                                                  <?= $status['id'] == $order['trang_thai_id'] ? 'Selected' : '' ?>
                                                  value="<?= $status['id'] ?>">
                                                  <?= $status['ten_trang_thai'] ?>
                                              </option>
                                          <?php endforeach ?>
                                      </select>
                                      <?php if (isset($_SESSION['error']['trang_thai_id'])) { ?>
                                          <p class="text-danger"><?= $_SESSION['error']['trang_thai_id'] ?></p>
                                      <?php } ?>
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