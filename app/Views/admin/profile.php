<?= $this->include('admin/template/header'); ?>
<div class="row">
  <div class="col-md-12">
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
        <h3 class="card-title">Data Profile</h3>
        
      </div>
      <form action="/admin/profile/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="namaLaundry" class="col-sm-2 col-form-label">Nama Laundry</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" name="kd_profile" id="namaLaundry" value="<?= isset($kd_profile) ? $kd_profile : null?>">
              <input type="text" class="form-control" name="nama_laundry" id="namaLaundry" value="<?= isset($nama_laundry) ? $nama_laundry :''?>" placeholder="Nama Laundry">
            </div>
          </div>
          <div class="form-group row">
            <label for="noTlp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="no_tlp" id="noTlp" value="<?= isset($no_tlp) ? $no_tlp :''?>" placeholder="No Telepon">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamatLaundri" class="col-sm-2 col-form-label">Alamat Laundry</label>
            <div class="col-sm-10">
              <textarea type="text" name="alamat_laundry" id="alamatLaundri" class="form-control" aria-describedby="helpId"><?= isset($alamat_laundry) ? $alamat_laundry :''?></textarea>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->include('admin/template/footer'); ?>