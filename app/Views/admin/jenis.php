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
        <h3 class="card-title">Input Jenis Laundry</h3>
      </div>
      <form action="/admin/jenis/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="jenis" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Laundry" required>
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
        <h3 class="card-title">Data Jenis Laundry</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Jenis Laundry</th>
              <th  style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
              <?php if($dataJenis!= null):?>
              <?php 
              $no = 1; 
              foreach($dataJenis as $result):?>
              <tr>
                <td style="width: 10px"><?=$no?></td>
                <td><?=$result->jenis?></td>
                <td>
                    <button
                    class="btn btn-info btn-sm  "
                    data-toggle="modal" data-target="#ubah<?=$result->idjenispakaian?>"
                    title="Edit"><ion-icon name="create-outline"></ion-icon></button>
                    <button
                    class="btn btn-danger btn-sm  "
                      onclick="cbModal1(<?=$result->idjenispakaian?>)"
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
<div class="modal fade" id="noticeDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                      <button type="button" class="btn-close" id="btnCloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="formDelete" method="POST">
                      <div class="modal-body">
                          <p>Are you sure want to delete this data?</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" data-dismiss="modal" id="btnCloseModal" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    <!-- Modal update -->
<?php foreach($dataJenis as $result) : ?>
<div class="modal fade text-left" id="ubah<?= $result->idjenispakaian;?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Jenis Pakaian</h3>
				<button type="button" class="close" id="btnCloseModal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data"  action="<?=base_url("/admin/jenis/update/". $result->idjenispakaian)?>" 
				method="post">
				<?= csrf_field(); ?>
				<div class="modal-body">
        <div class="form-group row">
            <label for="jenis" class="col-sm-3 col-form-label">Jenis Pakaian</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="<?=$result->jenis?>"name="jenis" id="jenis" placeholder="Jenis Laundry" required>
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
</div>
<?= $this->include('admin/template/footer'); ?>

<script>$("#btnCloseModal").on("click", function(){
        $("#noticeDelete").modal("hide");
    })
    function cbModal1(id){
        $("#noticeDelete").modal("show");
        $("#formDelete").attr("action", "<?= base_url('admin/jenis/delete'); ?>/" + id);
    }
   
    
    

</script>
