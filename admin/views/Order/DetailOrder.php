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
                  <div class="col-sm-10">
                      <h1>Order Management - Order: <?= $order['ma_don_hang'] ?></h1>
                  </div>
                  <div class="col-sm-2">
                      <form action="" method="POST">
                          <select name="" id="" class="form-group">
                              <?php foreach ($statusList as $key => $status): ?>
                                  <option <?= $status['id'] == $order['trang_thai_id'] ? 'selected' : '' ?> value="<?= $status['id'] ?>"><?= $status['ten_trang_thai'] ?></option>
                              <?php endforeach ?>
                          </select>
                      </form>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <?php
                        if ($order['trang_thai_id'] == 1) {
                            $colorAlert = 'warning';
                        } else if ($order['trang_thai_id'] >= 2 && $order['trang_thai_id'] <= 9) {
                            $colorAlert = 'primary';
                        } else if ($order['trang_thai_id'] == 10) {
                            $colorAlert = 'success';
                        } else {
                            $colorAlert = 'danger';
                        }
                        ?>
                      <div class="alert alert-<?= $colorAlert; ?>">Order: <?= $order['ten_trang_thai'] ?></div>

                      <!-- Main content -->
                      <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                              <div class="col-12">
                                  <h4>
                                      <i class="fas fa-globe"></i> ShopDAM.
                                      <small class="float-right">Date: <?= FormatDate($order['ngay_dat']) ?></small>
                                  </h4>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                              <div class="col-sm-4 invoice-col">
                                  From
                                  <address>
                                      <strong><?= $order['ho_ten'] ?></strong><br>
                                      <b>Email:</b> <?= $order['email'] ?><br>
                                      <b>Phone:</b> <?= $order['so_dien_thoai'] ?><br>
                                  </address>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  To
                                  <address>
                                      <strong><?= $order['ten_nguoi_nhan'] ?></strong><br>
                                      <b>Email:</b> <?= $order['email_nguoi_nhan'] ?><br>
                                      <b>Phone:</b> <?= $order['sdt_nguoi_nhan'] ?><br>
                                      <b>Address:</b> <?= $order['dia_chi_nguoi_nhan'] ?><br>
                                  </address>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  Invoice
                                  <address>
                                      <strong>ID: <?= $order['ma_don_hang'] ?></strong><br>
                                      <b>Total:</b> <?= PriceFormat($order['tong_tien']) ?> đ<br>
                                      <b>Note:</b> <?= $order['ghi_chu'] ?><br>
                                      <b>Payment:</b> <?= $order['ten_phuong_thuc'] ?><br>
                                  </address>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                              <div class="col-12 table-responsive">
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Product</th>
                                              <th>Unit Price</th>
                                              <th>Quantity</th>
                                              <th>Totals</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $total = 0; ?>
                                          <?php foreach ($orderProducts as $key => $product): ?>
                                              <tr>
                                                  <td><?= $key + 1 ?></td>
                                                  <td><?= $product['ten_san_pham'] ?></td>
                                                  <td><?= PriceFormat($product['don_gia']) ?> đ</td>
                                                  <td><?= $product['so_luong'] ?></td>
                                                  <td><?= PriceFormat($product['thanh_tien']) ?> đ</td>
                                              </tr>
                                              <?php $total += $product['thanh_tien']; ?>
                                          <?php endforeach ?>
                                      </tbody>
                                  </table>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <div class="row">
                              <!-- accepted payments column -->
                              <!-- /.col -->
                              <div class="col-6">
                                  <p class="lead">Order Date: <?= $order['ngay_dat'] ?></p>

                                  <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                              <th style="width:50%">Subotal: </th>
                                              <td>
                                                  <?= PriceFormat($total) ?> đ
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>Shipping:</th>
                                              <td>100.000 đ</td>
                                          </tr>
                                          <tr>
                                              <th>Total:</th>
                                              <td><?= PriceFormat($total + 100000) ?> đ</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                              <div class="col-12">
                                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                      Payment
                                  </button>
                                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                      <i class="fas fa-download"></i> Generate PDF
                                  </button>
                              </div>
                          </div>
                      </div>
                      <!-- /.invoice -->
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
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