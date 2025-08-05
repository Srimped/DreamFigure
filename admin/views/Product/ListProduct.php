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
            <h1>Product Management</h1>
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
                <a href="<?= BASE_URL_ADMIN . '?act=Add-Product-Form'?>">
                  <button class="btn btn-success">New Product</button>
                </a>
                <?php if (isset($_SESSION['message'])) {
                  echo '<p class="text-success">' . $_SESSION['message'] . '</p>';
                  unset($_SESSION['message']);
                }?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <!-- <th>Discount</th> -->
                    <th>Image</th>
                    <th>Quantity</th>
                    <!-- <th>Views</th> -->
                    <!-- <th>Create Date</th> -->
                    <th>Descriptions</th>
                    <th>CategoryID</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($productList as $key=>$product): ?>
                  <tr>
                    <td><?= $key+1?></td>
                    <td><?=$product['ten_san_pham']?></td>
                    <td><?=$product['gia_san_pham']?></td>
                    <!-- <td><?=$product['gia_khuyen_mai']?></td> -->
                    <td>
                      <img src="<?= BASE_URL . $product['hinh_anh']?>" style="width: 100px" alt=""
                      onerror="this.onerror=null; this.src='https://yameteshop.vn/wp-content/uploads/2023/06/mohinh-herta-kuru-1.jpg'">
                    </td>
                    <td><?=$product['so_luong']?></td>
                    <!-- <td><?=$product['luot_xem']?></td> -->
                    <!-- <td><?=$product['ngay_nhap']?></td> -->
                    <td><?=$product['mo_ta']?></td>
                    <td><?=$product['danh_muc_id']?></td>
                    <td><?=$product['trang_thai'] == 1 ? 'Available':'Out of order' ?></td>
                    <td>
                      <a href="<?= BASE_URL_ADMIN . '?act=Detail-Product&Product-id=' . $product['id']?>">
                        <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=Edit-Product-Form&Product-id=' . $product['id']?>">
                        <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=Delete-Product&Product-id=' . $product['id']?>" 
                      onclick="return confirm('Do you want to delete this Product?')">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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