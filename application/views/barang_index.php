    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Daftar List Barang</h2>
        <p class="lead">Berikut adalah tabel daftar stok barang :</p>
      </div>

 	<table class="table table-hover">
		<thead>
		    <tr>
		      <th scope="col">No.</th>
          <th scope="col">Nama Barang</th>
		      <th scope="col">Stok</th>
		      <th scope="col">Status</th>
		      <th scope="col">Kategori</th>
		      <th scope="col">Harga</th>
		      <th scope="col">Expired Date</th>
          <th scope="col">Purchasing Date</th>
		      <th scope="col">Action</th>
		    </tr>
		</thead>
		<tbody>
			
			
			<?php 
			$i=0; 
			foreach ($barang as $b) : 
			$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
        <td><?php echo $b['nama']; ?></td>
				<td><?php echo $b['stok']; ?></td>
				<td><?php if ($b['status']=='1') {
          echo "Aktif";
        } else {
          echo "Tidak Aktif";
        }?>
        </td>
				<td><?php echo $b['kategori']; ?></td>
				<td>Rp <?php echo number_format($b['harga'], 2, ',', '.'); ?></td>
				<td><?php echo $b['expired_date']; ?></td>
        <td><?php echo $b['purchasing_date']; ?></td>
				<td><a href='<?php echo base_url('index.php/barang/kartu_stok/' . $b['id']); ?>'><span class='badge badge-primary'>Cetak</span></a> &nbsp; <a href='<?php echo base_url('index.php/barang/edit/' . $b['id']); ?>'><span class='badge badge-primary'>Edit</span></a> &nbsp; <a href='barang/delete/<?php echo $b['id'];?>'><span class='badge badge-danger'>Delete</span></td>
			</tr>
			<?php endforeach; ?>
			
		</tbody>
	</table>

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
