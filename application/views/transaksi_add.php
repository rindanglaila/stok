
    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Stok Barang</h2>
        <p class="lead"><?php echo $title; ?></p>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Input Stok Barang</h4>
          <?php if (isset($_SESSION['notif'])) { ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-<?php echo $_SESSION['notif']['type']; ?>" role="alert">
              <center><?php echo $_SESSION['notif']['message']; ?></center>
            </div>
            </div>
          </div>
          <?php 
            unset($_SESSION['notif']);
            }
          ?>
          <form class="needs-validation" method="post" action="<?php echo base_url('index.php/transaksi/submit'); ?>" novalidate>
            <div class="row">
              <div class="col-md-12 mb-3">
                  <label for="state">Nama Barang</label>
                  <select class="custom-select d-block w-100" name="barang_id" id="barang" required>
                    <option value="">[ Pilih ]</option>
                    <?php foreach ($barang as $key => $value) {?>
                    <?php if (isset($_SESSION['fields'])) { ?>                      
                    <option value="<?php echo $value['id']; ?>" <?php if ($_SESSION['fields']['barang_id'] == $value['id']) echo ' selected'; ?>><?php echo $value['nama'] ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['nama'] ?></option>
                    <?php }} ?>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="country">Jenis Transaksi Stok</label>
                <select class="custom-select d-block w-100" name="jenis_transaksi" id="country" required>
                  <option value="">[ Pilih ]</option>
                  <?php if (isset($_SESSION['fields'])) { ?>
                  <option value="1" <?php if ($_SESSION['fields']['jenis_transaksi'] == 1) echo ' selected'; ?>>Stok Masuk</option>
                  <option value="0" <?php if ($_SESSION['fields']['jenis_transaksi'] == 0) echo ' selected'; ?>>Stok Keluar</option>
                  <?php } else { ?>
                  <option value="1">Stok Masuk</option>
                  <option value="0">Stok Keluar</option>
                  <?php } ?>
                </select>                
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Jumlah Barang </label>
                <input type="text" class="form-control" name="jumlah_barang" id="firstName" placeholder="Jumlah Barang" value="" required>
              </div>
            </div>   
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
          </form>
          <?php
            if (isset($_SESSION['fields'])) {
              unset($_SESSION['fields']);
            }
          ?>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <!-- <script src="../../assets/js/vendor/popper.min.js"></script> -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <script type="text/javascript">
      // // Example starter JavaScript for disabling form submissions if there are invalid fields
      // (function() {
      //   'use strict';

      //   window.addEventListener('load', function() {
      //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
      //     var forms = document.getElementsByClassName('needs-validation');

      //     // Loop over them and prevent submission
      //     var validation = Array.prototype.filter.call(forms, function(form) {
      //       form.addEventListener('submit', function(event) {
      //         if (form.checkValidity() === false) {
      //           event.preventDefault();
      //           event.stopPropagation();
      //         }
      //         form.classList.add('was-validated');
      //       }, false);
      //     });
      //   }, false);
      // })();



    </script>
  </body>
</html>
