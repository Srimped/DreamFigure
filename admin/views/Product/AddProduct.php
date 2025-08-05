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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=Add-Product'?>" method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-12">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Enter Product">
                    <?php if(isset($_SESSION['error']['ten_san_pham']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['ten_san_pham']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Price</label>
                    <input type="number" class="form-control" name="gia_san_pham" placeholder="How much...">
                    <?php if(isset($_SESSION['error']['gia_san_pham']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['gia_san_pham']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Discount</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai" placeholder="Any discount?">
                  </div>
                  <div class="form-group col-6">
                    <label>Image</label>
                    <input type="file" class="form-control" name="hinh_anh">
                  </div>
                  <div class="form-group col-6">
                    <label>Album</label>
                    <input type="file" class="form-control" name="img_array[]" multiple>
                  </div>
                  <div class="form-group col-6">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="so_luong" placeholder="Enter Quantity">
                    <?php if(isset($_SESSION['error']['so_luong']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['so_luong']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Date</label>
                    <input type="Date" class="form-control" name="ngay_nhap">
                    <?php if(isset($_SESSION['error']['ngay_nhap']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['ngay_nhap']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Category</label>
                    <Select class="form-control" name="danh_muc_id">
                      <option selected disabled>------- Select Category -------</option>
                      <?php foreach($listCategory as $category): ?>
                      <option value="<?= $category['id']?>"><?= $category['ten_danh_muc']?></option>
                      <?php endforeach ?>
                    </Select>
                    <?php if(isset($_SESSION['error']['danh_muc_id']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['danh_muc_id']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Status</label>
                    <Select class="form-control" name="trang_thai">
                      <option selected disabled>------- Status -------</option>
                      <option value="1">Available</option>
                      <option value="2">Out or order</option>
                    </Select>
                    <?php if(isset($_SESSION['error']['trang_thai']))
                    { ?>
                        <p class="text-danger"><?=$_SESSION['error']['trang_thai']?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-12">
                    <label>Descriptions</label>
                    <textarea type="text" class="form-control" name="mo_ta" placeholder="Give some content..."></textarea>
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