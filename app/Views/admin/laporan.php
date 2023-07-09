<?= $this->include('admin/template/header'); ?>
<div class="row" ng-app="app" ng-controller="laporanController">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
            </div>
            <div class="card-body">
                <div class="col-sm-5 d-flex justify-content-between">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <button class="btn btn-primary" onclick="exportToExcel()">Print Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="d-flex justify-content-start">
                            <!-- <button class="btn btn-primary" id="cetak" style="margin-right:12px;">Cetak</button>
                            <div id="tombolPdf"></div> -->
                            <!-- <button class="btn btn-primary pdfconvert" target="_blank"
                                data-Url="/admin/laporan/CetakPDF">PDF</button> -->
                        </div>
                    </div>
                </div>
                <div id="printElement">
                  <div class="print-header">
                    <center>
                    <h3>LAPORAN TRANSAKSI</h3>
                      <h4>Tanggal <span id="tgllaporan"></span> </h4>
                      <hr><br>
                    </center>
                  </div>
                  <table class="table table-bordered"  width="100%" id="tabeldata">
                      <thead>
                          <tr>
                              <th style="width: 10px">No</th>
                              <th class="text-center">Kode Pemesanan</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">Tanggal Ambil</th>
                              <th class="text-center">Tanggal Antar</th>
                              <th class="text-center">Jenis</th>
                              <th class="text-center">Berat (Kg)</th>
                              <th class="text-center">Harga Laundry</th>
                              <th class="text-center">Biaya Ambil</th>
                              <th class="text-center">Biaya Antar</th>
                              <th class="text-center">Total Bayar</th>
                          </tr>
                      </thead>
                      <?php if($dataLaporan!= null):?>
                        <?php 
                        $no = 1; 
                        foreach($dataLaporan as $value):?>
                      <tbody>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?=$value->kd_pemesanan?></td>
                                <td><?=$value->nama?></td>
                                <td><?=$value->alamat?></td>
                                <td><?=$value->tgl_jemput?></td>
                                <td><?=$value->tgl_ambil?></td>
                                <td><?=$value->jenis?></td>
                                <td><?=$value->berat?></td>
                                <td><?=$value->total?></td>
                                <td><?=$value->biaya_jemput?></td>
                                <td><?=$value->biaya_ambil?></td>
                                <td><?=$value->total_bayar?></td>
                            </tr>
                            
                      </tbody>
                       <?php
                            $no++;
                        endforeach;
                        ?>
                        <?php endif; ?>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/template/footer'); ?>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<!-- Print Excel -->
    <script>
        function exportToExcel() {
        // Membuat objek workbook
        var wb = XLSX.utils.book_new();

        // Mengambil tabel dengan id "tabeldata"
        var tabel1 = document.getElementById("tabeldata");
        

        // Membuat array data kosong untuk menyimpan data tabel
        var data1 = [];

        // Iterasi melalui baris tabel 1
        for (var i = 0; i < tabel1.rows.length; i++) {
            var row = tabel1.rows[i];
            var rowData = [];

            // Iterasi melalui sel dalam baris
            for (var j = 0; j < row.cells.length; j++) {
            var cell = row.cells[j];
            rowData.push(cell.innerText);
            }

            // Menambahkan data baris ke dalam array data tabel 1
            data1.push(rowData);
        }

        

        // Membuat worksheet 1 dari data tabel 1
        var ws1 = XLSX.utils.aoa_to_sheet(data1);


        // Menambahkan worksheet 1 ke dalam workbook dengan nama sheet "Tabel 1"
        XLSX.utils.book_append_sheet(wb, ws1, "Daftar Pesanan");


        // Menghasilkan file Excel
        XLSX.writeFile(wb, "Laporan_Keuangan_Laundry.xlsx");
        }
    </script>
