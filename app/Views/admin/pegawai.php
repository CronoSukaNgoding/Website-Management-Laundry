<?= $this->include('admin/template/header'); ?>
<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <?php if(session()->getFlashData("sukses-simpan")): ?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 <?=session()->getFlashData("sukses-simpan")?>
				</div>
        <?php elseif(session()->getFlashData("sukses-edit")): ?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 <?=session()->getFlashData("sukses-edit")?>
				</div>
			<?php elseif(session()->getFlashData("sukses-hapus")): ?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?=session()->getFlashData("sukses-hapus")?>
				</div>
			<?php endif; ?>
      <div class="card-header">
        <h3 class="card-title">Input Pegawai</h3>
        
      </div>
      <form action="/admin/pegawai/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="namaPegawai" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" id="namaPegawai" placeholder="Nama pegawai" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="bagian" class="col-sm-3 col-form-label">Bagian</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Bagian" required>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary prosess">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Pegawai</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Nama</th>
              <th>Bagian</th>
              <th  style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($dataPegawai!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPegawai as $result):?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $result->nama_pegawai ?></td>
                <td><?= $result->bagian ?></td>
                <td>
                  <button
                    class="btn btn-info btn-sm  "
                    data-toggle="modal" data-target="#edit<?= $result->kd_pegawai;?>" value=""
                    title="Edit"><ion-icon name="create-outline"></ion-icon></button>
                    <button
                    class="btn btn-danger btn-sm  "
                    data-toggle="modal" data-target="#hapus<?=$result->kd_pegawai?>" value=""
                    title="Hapus"><ion-icon name="trash-outline"></ion-icon></button>
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
  <!-- Modal update -->
<?php foreach($dataPegawai as $result) : ?>
<div class="modal fade text-left" id="edit<?=$result->kd_pegawai?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Pegawai</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data" action="<?=base_url("/admin/pegawai/edit/". $result->kd_pegawai)?>"
				method="post">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group floating-label-form-group">

						<div class="form-group floating-label-form-group">
							<label for="edit_nama">Nama Pegawai</label>
							<input type="hidden" id="karyawan_id" name="id" value="<?=$result->kd_pegawai?>">
							
							<input type="text" class="form-control" name="nama_pegawai" id="edit_nama"
								placeholder="Kode Kelas" value="<?=$result->nama_pegawai;?>" autocomplete="off">
						</div>
            <div class="form-group floating-label-form-group">
							<label for="edit_nama">Bagian</label>
							
							
							<input type="text" class="form-control" name="bagian" id="edit_nama"
								placeholder="Kode Kelas" value="<?=$result->bagian;?>" autocomplete="off">
						</div>

					</div>
					<div class="modal-footer">
						<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
							value="Tutup">
						<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan"
							value="Simpan">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach($dataPegawai as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->kd_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/admin/pegawai/delete/". $value->kd_pegawai)?>" method="post">
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Pegawai ini ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<button type="submit" class="btn btn-primary btn-bg-gradient-x-red">Hapus</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
</div>
<?= $this->include('admin/template/footer'); ?>

<script>
$(function () {
    $(document).ready(function () {
      var tombol;
      var kd_pegawai;
      var nama_pegawai;
      var bagian;
      if(document.getElementById("kd_pegawai").value == ""){
        $('.prosess').val('Simpan');
      }else{
        $('.prosess').val('Ubah');
      }
        // get Edit Product
        $('.ubahPegawai').on('click', function () {
            // get data from button edit
            kd_pegawai = $(this).data('kd_pegawai');
            nama_pegawai = $(this).data('nama_pegawai');
            bagian = $(this).data('bagian');
            // Set data to Form Edit
            $('#kd_pegawai').val(kd_pegawai);
            $('#namaPegawai').val(nama_pegawai);
            $('#bagian').val(bagian);
            $('.prosess').val('Ubah');
        });

        // get Delete Product
        $('.hapuspegawai').on('click', function () {
            // get data from button edit
            const Url = $(this).data('url');
            // Set data to Form Edit
            // $('.edit-kategori').val(idkategori);
            swal({
                title: "Anda Yakin?",
                text: "Akan Melakukan Penghapusan data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: Url,
                            success: function (data) {
                                swal("Information!", "Berhasil di Hapus", "success")
                                    .then((value) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

        $('.btn-delete-wisata').on('click', function () {
            // get data from button edit
            const id = $(this).data('id');
            const Url = $(this).data('url');
            // Set data to Form Edit
            // $('.edit-kategori').val(idkategori);
            swal({
                title: "Anda Yakin?",
                text: "Akan Melakukan Penghapusan data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'POST',
                            url: Url,
                            data: { 'id': id },
                            success: function (data) {
                                swal("Information!", "Berhasil di Hapus", "success")
                                    .then((value) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });
    });
})
</script>