<?= $this->include('admin/template/header'); ?>
<div class="row">
  <div class="col-md-12">
    <a href="<?=base_url('registrasi')?>"><button class="btn btn-primary prosess mb-3"> Tambah data Pelanggan</button></a>
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
        <h3 class="card-title">Data Pelanggan</h3>
        
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Nama</th>
              <th>Kontak</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($dataPelanggan!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPelanggan as $result):?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result->nama?></td>
                <td><?=$result->no_hp?></td>
                <td><?=$result->jk?></td>
                <td><?=$result->alamat?></td>
                <td>
                  <button
                    class="btn btn-info btn-sm  "
                    data-toggle="modal" data-target="#edit<?= $result->kd_pelanggan;?>" value=""
                    title="Edit"><ion-icon name="create-outline"></ion-icon></button>
                    <button
                    class="btn btn-danger btn-sm  "
                    data-toggle="modal" data-target="#hapus<?=$result->kd_pelanggan?>" value=""
                    title="Hapus"><ion-icon name="trash-outline"></ion-icon></button>
							  </td>
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
    <!-- Modal update -->
<?php foreach($dataPelanggan as $result) : ?>
<div class="modal fade text-left" id="edit<?=$result->kd_pelanggan?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Pelanggan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data" action="<?=base_url("/admin/pelanggan/edit/". $result->kd_pelanggan)?>"
				method="post">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group floating-label-form-group">

						<div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" name="kd_pelanggan" id="kd_pelanggan">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" value="<?=$result->nama?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">Kontak (Hp.)</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Kontak Hp." value="<?=$result->no_hp?>"required>
            </div>
          </div>
          <div class="form-group floating-label-form-group">
						<label for="jabatan">Jenis Kelamin</label>
						<select name="jk" id="basicSelect" class="form-control">
							<option value="<?= $result->jk?>"><?= $result->jk?></option>
							<option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
						</select>
					</div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required><?= $result->alamat?></textarea>
            </div>
          </div>
          <div class="form-group row username">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <input type="hidden" value="<?=$result->iduser?>" name="iduser">
            <div class="col-sm-9">
              <input type="text" class="form-control" name="username" id="username" value="<?= $result->username?>" readOnly placeholder="User Name" required>
            </div>
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
<?php foreach($dataPelanggan as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->kd_pelanggan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/admin/pelanggan/delete/". $value->kd_pelanggan)?>" method="post">
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Pegawai ini ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<button type="submit" class="btn btn-secondary">Hapus</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
</div>
<?= $this->include('admin/template/footer'); ?>



