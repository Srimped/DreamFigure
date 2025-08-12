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
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <?php if (isset($_SESSION['message'])) {
                  echo '<p class="text-success">' . $_SESSION['message'] . '</p>';
                  unset($_SESSION['message']);
                } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Order ID</th>
                      <th>Recipient Name</th>
                      <th>Phone Number</th>
                      <th>Order Date</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($orderList as $key => $order): ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $order['ma_don_hang'] ?></td>
                        <td><?= $order['ten_nguoi_nhan'] ?></td>
                        <td><?= $order['sdt_nguoi_nhan'] ?></td>
                        <td><?= $order['ngay_dat'] ?></td>
                        <td><?= PriceFormat($order['tong_tien']) ?> đ</td>
                        <td><?= $order['ten_trang_thai'] ?></td>
                        <td>
                          <a href="<?= BASE_URL_ADMIN . '?act=Detail-Order&Order-id=' . $order['id'] ?>">
                            <button class="btn btn-primary">Detail</button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN . '?act=Edit-Order-Form&Order-id=' . $order['id'] ?>">
                            <button class="btn btn-warning">Update</button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
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

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  </body>

  </html>