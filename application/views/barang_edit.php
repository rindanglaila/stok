<?php //print_r($kategori); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/form-validation.css'); ?>" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Barang</h2>
        <p class="lead"><?php echo $title; ?></p>
      </div>

      <div class="row">
       
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Master Barang</h4>
          <form class="needs-validation" method="post" action="<?php echo base_url('index.php/barang/postEdit'); ?>" novalidate>
            <input type="hidden" name="id" value="<?php echo $barang['id']; ?>">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Nama</label>
                <input type="text" class="form-control" name="nama" id="firstName" placeholder="Nama Barang" value="<?php echo $barang['nama']; ?>" required>
              </div>
            </div>         
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Stok</label>
                <input type="text" class="form-control" name="stok" id="firstName" placeholder="Stok Barang" value="<?php echo $barang['stok']; ?>" required>
              </div>
            </div>         
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="country">Status</label>
                <select class="custom-select d-block w-100" name="status" id="country" required>
                  <option value="">[ Pilih ]</option>
                  <option value="1" <?php if ($barang['status'] == 1) echo ' selected'; ?>>Aktif</option>
                  <option value="0" <?php if ($barang['status'] == 0) echo ' selected'; ?>>Tidak Aktif</option>
                </select>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="state">Kategori</label>
                <select class="custom-select d-block w-100" name="kategori_id" id="state" required>
                  <option value="">[ Pilih ]</option>
                  <?php foreach ($kategori as $key => $value) {
                  if ($barang['kategori_id'] == $value['id']) { ?>
                  <option value="<?php echo $value['id']; ?>" selected><?php echo $value['nama']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
                  <?php }} ?>
                </select>
               
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Harga</label>
                <input type="text" class="form-control" name="harga" id="firstName" placeholder="Harga Barang" value="<?php echo $barang['harga']; ?>" required>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Expired Date</label>
                <input type="text" class="form-control" name="expired_date" id="firstName" placeholder="exp : <?php echo date('Y-m-d'); ?>" value="<?php echo $barang['expired_date']; ?>" required>
              </div>
            </div> 
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Purchasing Date</label>
                <input type="text" class="form-control" name="purchasing_date" id="firstName" placeholder="exp : <?php echo date('Y-m-d'); ?>" value="<?php echo  $barang['purchasing_date']; ?>" required>
              </div>
            </div> 
            
           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
          </form>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <!-- <script src="../../assets/js/vendor/popper.min.js"></script> -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
