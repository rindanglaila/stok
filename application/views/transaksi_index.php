    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Daftar Keluar/Masuk Barang</h2>
        <p class="lead">Berikut adalah tabel daftar transaksi stok barang yang keluar dan masuk :</p>
      </div>

 	<table class="table table-hover">
		<thead>
		    <tr>
		      <th scope="col">No.</th>
          <th scope="col">Nama Barang</th>
		      <th scope="col">Jenis Transaksi</th>
		      <th scope="col">Jumlah Barang</th>
		      <th scope="col">Stok Barang saat ini</th>
		      <th scope="col">Tanggal Update Stok Barang</th>
		    </tr>
		</thead>
		<tbody>
			
			
			<?php 
			$i=0; 
			foreach ($transaksi as $t) : 
			$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
        <td><?php echo $t['nama']; ?></td>
				<td><?php if ($t['jenis_transaksi']=='1') {
          echo "Masuk";
        } else {
          echo "Keluar";
        }?>
        </td>
        <td><?php echo $t['jumlah_barang']; ?></td>
				<td><?php echo $t['stok_akhir']; ?></td>
				<td><?php echo $t['date_time']; ?></td>
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
