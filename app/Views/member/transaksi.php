<?= $this->include('member/template/header'); ?>
<div class="row" ng-app="app" ng-controller="trxController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Traksasi</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered" id="konten" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th class="text-center">Kode Pemesanan</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">Tanggal Ambil</th>
              <th class="text-center">Tanggal Jemput</th>
              <th class="text-center">Jenis</th>
              <th class="text-center">Status Biaya</th>
              <th class="text-center">Berat (Kg/Potong)</th>
              <th class="text-center">Bayar</th>
              <th class="text-center">Ongkos Ambil</th>
              <th class="text-center">Ongkos Jemput</th>
              <th class="text-center">Total Bayar</th>
            </tr>
          </thead>
          <tbody >
            <?php if($dataTransaksi!= null):?>
              <?php 
              $no = 1; 
              foreach($dataTransaksi as $result):?>
            <tr>
              <td><?=$no?></td>
              <td><?=$result->kd_pemesanan?></td>
              <td><?=$result->nama?></td>
              <td><?=$result->alamat?></td>
              <td><?=$result->tgl_jemput?></td>
              <td><?=$result->tgl_ambil?></td>
              <td><?=$result->jenis?></td>
              <td><?=$result->statusbiaya?></td>
              <td><?=$result->berat?></td>
              <td>Rp<?= number_format($result->total, 0, ',', '.') ?></td>
              <td>Rp<?= number_format($result->biaya_ambil, 0, ',', '.') ?></td>
              <td>Rp<?= number_format($result->biaya_jemput, 0, ',', '.') ?></td>
              <td>Rp<?= number_format($result->total_bayar, 0, ',', '.') ?></td>
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
<?= $this->include('member/template/footer'); ?>
