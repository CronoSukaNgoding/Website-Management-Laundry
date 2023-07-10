<?= $this->include('member/template/header'); ?>
<div class="row" ng-app="app" ng-controller="transaksiController">
    <div class="col-md-4">
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
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Input Transaksi</h3>
            </div>
            <form action="/pesan" method="POST"enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group floating-label-form-group">
                        <label for="jabatan">Kode Pemesanan</label>
                        <input name="kd_pemesanan" type="text" value="LNY-<?=time() ?>" class="form-control" readonly>
                        <input type="hidden" value="<?=$userid?>" name="user_id">
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="jabatan">Jenis Pakaian</label>
                        <select name="jenis" id="basicSelect" class="form-control">
                            <option value="" selected>Pilih Jenis Pakaian</option>
                            <optgroup label="--Perkilo--">
                            <?php foreach($dataJenis as $jenis) : ?>
                                <?php if($jenis->statusbiaya == "Perkilo"): ?>
                                    <option value="<?= $jenis->idjenispakaian?>"><?= $jenis->jenis?>, <?=$jenis->statusbiaya?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </optgroup>
                            
                            <optgroup label="--Perpotong--">
                                <?php foreach($dataJenis as $jenis) : ?>
                                    <?php if($jenis->statusbiaya == "Perpotong"): ?>
                                        <option value="<?= $jenis->idjenispakaian?>"><?= $jenis->jenis?>, <?=$jenis->statusbiaya?></option>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </optgroup>
                            
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan"
							value="Simpan">
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Data pesan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Pemesanan</th>
                            <th>Jenis</th>
                            <th>Status Biaya</th>
                            <th>Tanggal Booking</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($dataPesanan!= null):?>
                        <?php 
                        $no = 1; 
                        foreach($dataPesanan as $result):?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$result->kd_pemesanan?></td>
                            <td><?=$result->jenis?></td>
                            <td><?=$result->statusbiaya?></td>
                            <td><?= $result->tglbuat?></td>
                            <td>
                                <?php if($result->status == "Pending"):?>
                                        <span class="badge badge-pill badge-warning">
                                            <?= $result->status;?>
                                        </span>
                                        <?php elseif($result->status == "Proses"):?>
                                        <span class="badge badge-pill badge-info">
                                            <?= $result->status;?>
                                        </span>
                                        <?php elseif($result->status == "Selesai"):?>
                                             <span class="badge badge-pill badge-success">
                                            <?= $result->status;?>
                                        </span>
                                        <?php else:?>
                                             <span class="badge badge-pill badge-danger">
                                            <?= $result->status;?>
                                        </span>
                                        <?php endif?>

                            </td>
                            <!-- <td><span class="badge badge-warning" style="color: black"><?=$result->status?></span></td> -->
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
<?= $this->include('member/template/footer'); ?>
