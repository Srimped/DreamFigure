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
          <div class="col-sm-11">
            <h1>Updating: <?= $product['ten_san_pham'] ?></h1>
          </div>
          <div class="col-sm-1">
            <a href="<?= BASE_URL_ADMIN . '?act=Product' ?>" class="nav-link">
              <button class="btn btn-secondary">Cancel</button>
            </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product Information</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=Edit-Product' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" name="san_pham_id" class="form-control" value="<?= $product['id'] ?>" hidden>
                  <label>Product Name</label>
                  <input type="text" name="ten_san_pham" class="form-control" value="<?= $product['ten_san_pham'] ?>">
                  <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label">Price</label>
                    <input type="number" name="gia_san_pham" class="form-control" value="<?= $product['gia_san_pham'] ?>">
                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="so_luong" class="form-control" value="<?= $product['so_luong'] ?>">
                  <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control custom-select" name="danh_muc_id">
                    <option selected disabled>------- Select Category -------</option>
                    <?php foreach ($listCategory as $category): ?>
                      <option <?= $category['id'] == $product['danh_muc_id'] ? 'selected' : '' ?> value="<?= $category['id'] ?>"><?= $category['ten_danh_muc'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control custom-select" name="trang_thai">
                    <option selected disabled>------- Status -------</option>
                    <option <?= $product['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Available</option>
                    <option <?= $product['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Out of stock</option>
                  </select>

                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="mo_ta" rows="4"><?= $product['mo_ta'] ?></textarea>
                </div>


              </div>

              <!-- /.card-body -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </div>
          </form>
          <!-- /.card -->
        </div>
        <div class="col-md-4">
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Product Album</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <form action="<?= BASE_URL_ADMIN . '?act=Edit-Album' ?>" method="POST" enctype="multipart/form-data">
                  <table id="faqs" class="table table-hover">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>File</th>
                        <th>
                          <div class="text-center"><button onclick="addfaqs();" class="badge badge-success" type="button"><i class="fa fa-plus"></i>Add</button></div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <input type="hidden" name="san_pham_id" value="<?= $product['id']?>">
                        <input type="hidden" id="img_delete" name="img_delete">
                        <?php foreach($listImage as $key=>$value): ?>
                      <tr id="faqs-row-<?= $key?>">
                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id']?>">
                        <td><img src="<?= BASE_URL . $value['link_hinh_anh']?>" width="50px" height="50px" alt=""></td>
                        <td><input type="file" name="img_array[]" placeholder="Product name" class="form-control"></td>
                        <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?= $key?>, <?= $value['id']?>)"><i class="fa fa-trash" ></i> Delete</button></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
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
    var faqs_row = <?= count($listImage)?>;

    function addfaqs() {
      html = '<tr id="faqs-row-' + faqs_row + '">';
      html += '<td><img src="https://yameteshop.vn/wp-content/uploads/2023/06/mohinh-herta-kuru-1.jpg" width="50px" height="50px" alt=""></td>';
      html += '<td><input type="file"name="img_array[]" class="form-control"></td>';
      html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

      html += '</tr>';

      $('#faqs tbody').append(html);

      faqs_row++;
    }

    function removeRow(rowID, imgID)
    {
      $('#faqs-row-' + rowID).remove()
      if(imgID !== null)
      {
        var imgDeleteInput = document.getElementById('img_delete')
        var currentValue = imgDeleteInput.value;
        imgDeleteInput.value = currentValue ? currentValue + ',' + imgID : imgID;
      }
    }
  </script>

  </html>