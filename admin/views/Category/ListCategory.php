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
            <h1>Category Management</h1>
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
                <a href="<?= BASE_URL_ADMIN . '?act=Add-Category-Form'?>">
                  <button class="btn btn-success">New Category</button>
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
                    <th>Category</th>
                    <th>Descriptions</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($categoryList as $key=>$category): ?>
                  <tr>
                    <td><?= $key+1?></td>
                    <td><?=$category['ten_danh_muc']?></td>
                    <td><?=$category['mo_ta']?></td>
                    <td>
                      <a href="<?= BASE_URL_ADMIN . '?act=Edit-Category-Form&Category-id=' . $category['id']?>">
                        <button class="btn btn-warning">Edit</button>
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=Delete-Category&Category-id=' . $category['id']?>" 
                      onclick="return confirm('Do you want to delete this category?')">
                        <button class="btn btn-danger">Delete</button>
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