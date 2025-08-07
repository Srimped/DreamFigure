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
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12">
                <img src="<?= BASE_URL . $firstImage['link_hinh_anh'] ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php foreach ($listImage as $key => $img): ?>
                  <div class="product-image-thumb <?= $img[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $img['link_hinh_anh'] ?>" alt="Product Image"></div>
                <?php endforeach ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $product['ten_san_pham'] ?></h3>
              <h5><?= $product['mo_ta'] ?></h5>

              <hr>
              <h4 class="my-3">Quantity: <small><?= $product['so_luong'] ?></small></h4>
              <h4 class="my-3">Viewer: <small><?= $product['luot_xem'] ?></small></h4>
              <h4 class="my-3">Category: <small><?= $product['ten_danh_muc'] ?></small></h4>
              <h4 class="my-3">Status: <small><?= $product['trang_thai'] == 1 ? 'Available' : 'Out of stock' ?></small></h4>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Price: <?= $product['gia_san_pham'] ?>
                </h2>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="col-12">
            <hr>
            <h2>Comment</h2>
            <div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
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
                      <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=Detail-Client&Client-id=' . $comment['tai_khoan_id'] ?>"><?= $comment['ho_ten']  ?></a></td>
                      <td><?= $comment['noi_dung'] ?></td>
                      <td><?= $comment['ngay_dang'] ?></td>
                      <td><?= $comment['trang_thai'] == 1 ? 'Showed' : 'Hidden' ?></td>
                      <td>
                        <form action="<?= BASE_URL_ADMIN . '?act=Update-Status-Comment' ?>" method="POST">
                          <input type="hidden" name="Comment-id" value="<?= $comment['id'] ?>">
                          <input type="hidden" name="name_view" value="Product Detail">
                          <button type="submit" onclick="return confirm('Do you want to hide this comment?')" class="btn btn-warning">
                            <?= $comment['trang_thai'] == 1 ? 'Hide' : 'Show' ?>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    })
  </script>

  </html>