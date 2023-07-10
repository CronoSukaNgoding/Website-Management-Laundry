<?= $this->include('admin/template/header'); ?>
<div class="row" ng-app="app" ng-controller="transaksiController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Transaksi</h3>
      </div>
      <form action="/transaksi" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group floating-label-form-group">
            <label for="jabatan">Kode Pemesanan</label>
            <select name="kd_pemesanan" id="basicSelect" class="form-control">
              <option value="" selected>Pilih Kode Pemesanan</option>
              <?php foreach($dataPemesanan as $kode) : ?>
              <option value="<?= $kode->id?>"><?= $kode->kd_pemesanan?>, <?= $kode->jenis?>, <?= $kode->statusbiaya?>, <?= $kode->harga?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group floating-label-form-group">
            <label for="jabatan">Jenis Laundry</label>
            <select name="jenis" id="basicSelect" class="form-control">
              <option value="" selected>Pilih Jenis Laundry</option>
              <?php foreach($dataJenis as $kode) : ?>
              <option value="<?= $kode->idjenispakaian?>"><?= $kode->jenis?>, <?= $kode->statusbiaya?>,
                Rp<?= number_format($kode->harga, 0, ',', '.') ?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="input-group mb-3 form-group floating-label-form-group">
            <label for="jabatan">Biaya Laundry</label>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Rp</span>
            </div>
            <input type="text" class="form-control" value="" placeholder="masukan nominal sesuai harga pilihan diatas"
              name="harga_laundry" aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>
          <div class="input-group mb-3 form-group floating-label-form-group">
            <label for="jabatan">Biaya Ambil</label>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Rp</span>
            </div>
            <input type="text" class="form-control" value="" placeholder="Biaya Ambil" name="biaya_ambil"
              aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>
          <div class="input-group mb-3 form-group floating-label-form-group">
            <label for="jabatan">Biaya Antar</label>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Rp</span>
            </div>
            <input type="text" class="form-control" value="" placeholder="Biaya Antar" name="biaya_jemput"
              aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>
          <div class="input-group mb-3 form-group floating-label-form-group">
            <label for="jabatan">Berat</label>
            <input type="text" class="form-control" placeholder="Masukan berat dalam kilogram" name="berat"
              aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Kg/Potong</span>
            </div>
          </div>
          <div class="form-group floating-label-form-group">
            <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Antar</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" ng-model="model.tgl_ambil"
                required>
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="jabatan">Harga</label>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Rp</span>
            </div>
            <input type="text" class="form-control" placeholder="Total Harga" name="total"
              aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>
          <div class="input-group mb-3">
            <label for="jabatan">Total Harga</label>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Rp</span>
            </div>
            <input type="text" class="form-control" placeholder="Total Harga" name="total_harga"
              aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>



        </div>

        <div class="card-footer justify-content-between">
          <input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Simpan">
        </div>
    </div>

    </form>
  </div>
</div>
<div class="col-md-12">
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Detail</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pemesanan</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Status Biaya</th>
            <th>Berat</th>
            <th>Tanggal Antar</th>
            <th>Harga</th>
            <th>Biaya Ambil</th>
            <th>Biaya Antar</th>
            <th>Total Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataTransaksi!= null):?>
          <?php 
              $no = 1; 
              foreach($dataTransaksi as $result):?>
          <tr>
            <td><?=$no?></td>
            <td><?= $result->kd_pemesanan?></td>
            <td><?=$result->nama?></td>
            <td><?=$result->jenis?></td>
            <td><?=$result->statusbiaya?></td>
            <td><?=$result->berat?></td>
            <th><?=$result->tgl_ambil?></th>
            <td id="harga">
              Rp<?= number_format($result->total, 0, ',', '.') ?>
            </td>
            <td id="biayaantar">
              Rp<?= number_format($result->biaya_ambil, 0, ',', '.') ?>

            </td>
            <td id="biayajemput">
              Rp<?= number_format($result->biaya_jemput, 0, ',', '.') ?>
            </td>
            <td id="totalHarga">
              Rp<?= number_format($result->total_bayar, 0, ',', '.') ?>
            </td>
          </tr>
          <?php
                $no++;
              endforeach;
              ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<?= $this->include('admin/template/footer'); ?>
<!-- <script>
  // Ambil elemen input berat dan harga
  var inputBerat = document.querySelector('input[name="berat"]');
  var inputHarga = document.querySelector('input[name="total"]');
  

  // Tambahkan event listener pada input berat
  inputBerat.addEventListener('input', function() {
    // Ambil nilai berat
    var berat = parseFloat(inputBerat.value);
  
   // Hitung total harga
    var totalHarga = berat * 7000;
  
    // Format total harga sebagai mata uang Rupiah
    // var formattedHarga = 'Rp' + totalHarga.toLocaleString('id-ID');
    
    // Tampilkan total harga di kolom harga
    inputHarga.value = totalHarga;

  });
</script> -->

<script>
  var inputBerat = document.querySelector('input[name="berat"]');
  var inputHarga = document.querySelector('input[name="total"]');
  var inputBiayaAmbil = document.querySelector('input[name="biaya_ambil"]');
  var inputBiayaLaundry = document.querySelector('input[name="harga_laundry"]');
  var inputBiayaJemput = document.querySelector('input[name="biaya_jemput"]');
  var inputTotalHarga = document.querySelector('input[name="total_harga"]');

  inputBerat.addEventListener('input', function () {
    var berat = parseFloat(inputBerat.value);
    var harga = parseFloat(inputHarga.value);
    var biayaAmbil = parseFloat(inputBiayaAmbil.value);
    var biayaJemput = parseFloat(inputBiayaJemput.value);
    var biayaLaundry = parseFloat(inputBiayaLaundry.value);

    var total = berat * biayaLaundry;
    inputHarga.value = total;
    var totalHarga = total + biayaAmbil + biayaJemput;
    inputTotalHarga.value = totalHarga;
  });
</script>



<!-- <script>
  // Ambil elemen-elemen yang diperlukan
  var hargaElements = document.querySelectorAll('#harga');
  var biayaAntarElements = document.querySelectorAll('#biayaantar');
  var biayaJemputElements = document.querySelectorAll('#biayajemput');
  var totalHargaElements = document.querySelectorAll('#totalHarga');

  // Iterasi melalui setiap elemen
  for (var i = 0; i < hargaElements.length; i++) {
    // Ambil nilai dari elemen-elemen tersebut
    var harga = parseFloat(hargaElements[i].textContent);
    var biayaAntar = parseFloat(biayaAntarElements[i].textContent);
    var biayaJemput = parseFloat(biayaJemputElements[i].textContent);

    // Hitung total harga
    var totalHarga = harga + biayaAntar + biayaJemput;

    // Format total harga sebagai mata uang Rupiah
    var formattedHarga = 'Rp. ' + totalHarga.toLocaleString('id-ID');

    // Tampilkan total harga di elemen totalHarga
    totalHargaElements[i].textContent = formattedHarga;
  }
</script> -->