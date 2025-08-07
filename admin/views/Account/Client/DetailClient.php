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
                      <h1>Client Account Management</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-6">
                      <img src="<?= BASE_URL . $client['anh_dai_dien'] ?>" style="width: 70%" alt=""
                          onerror="this.onerror=null; this.src='https://www.pngplay.com/wp-content/uploads/12/Anime-Girl-Pfp-PNG-HD-Quality.png'">
                  </div>
                  <div class="col-6">
                      <div class="container">
                          <table class="table table-borderless">
                              <tbody style="font-size: large;">
                                  <tr>
                                      <th>Full Name: </th>
                                      <td><?= $client['ho_ten'] ?? '' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Date of Birth: </th>
                                      <td><?= $client['ngay_sinh'] ?? '' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Email: </th>
                                      <td><?= $client['email'] ?? '' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Phone Number: </th>
                                      <td><?= $client['so_dien_thoai'] ?? '' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Sex: </th>
                                      <td><?= $client['gioi_tinh'] == 1 ? 'Male' : 'Femail' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Address: </th>
                                      <td><?= $client['dia_chi'] ?? '' ?></td>
                                  </tr>
                                  <tr>
                                      <th>Status: </th>
                                      <td><?= $client['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="col-12">
                      <h2>Shopping History</h2>
                      <div>
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
                                          <td><?= $order['tong_tien'] ?></td>
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
                  </div>


                  <div class="col-12">
                      <hr>
                      <h2>Comment History</h2>
                      <div>
                          <table id="example2" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Product</th>
                                      <th>Content</th>
                                      <th>Post Date</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($commentList as $key => $comment): ?>
                                      <tr>
                                          <td><?= $key + 1 ?></td>
                                          <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=Detail-Product&Product-id=' . $comment['san_pham_id'] ?>"><?= $comment['ten_san_pham']  ?></a></td>
                                          <td><?= $comment['noi_dung'] ?></td>
                                          <td><?= $comment['ngay_dang'] ?></td>
                                          <td><?= $comment['trang_thai'] == 1 ? 'Showed' : 'Hidden' ?></td>
                                          <td>
                                              <form action="<?= BASE_URL_ADMIN . '?act=Update-Status-Comment' ?>" method="POST">
                                                  <input type="hidden" name="Comment-id" value="<?= $comment['id'] ?>">
                                                  <input type="hidden" name="name_view" value="Client Detail">
                                                  <button type="submit" onclick="return confirm('Do you want to hide this comment?')" class="btn btn-warning">
                                                    <?= $comment['trang_thai'] == 1 ? 'Hide' : 'Show'?>
                                                  </button>
                                              </form>
                                          </td>
                                      </tr>
                                  <?php endforeach ?>
                              </tbody>
                          </table>
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