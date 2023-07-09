<?= $this->include('admin/template/header'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Pemesanan</h3>
      </div>
      <div class="card-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
              aria-controls="nav-home" aria-selected="true">Pending</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
              aria-controls="nav-profile" aria-selected="false">Proses</a>
              <a class="nav-item nav-link" id="nav-selesai-tab" data-toggle="tab" href="#nav-selesai" role="tab"
              aria-controls="nav-profile" aria-selected="false">Selesai</a>
            <a class="nav-item nav-link" id="nav-batal-tab" data-toggle="tab" href="#nav-batal" role="tab"
              aria-controls="nav-profile" aria-selected="false">Batal</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered">
              <thead class="bg-secondary">
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                  <th style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if($dataPesananPending!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPesananPending as $result):?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result->kd_pemesanan?></td>
                <td><?=$result->nama?></td>
                <td><?=$result->no_hp?></td>
                <td><?=$result->alamat?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($result->tglBuat) + (7 * 3600)) ?></td>
                <td><span class="badge badge-warning" style="color: black"><?=$result->status?></span></td>
                <td>
                  <a class="btn btn-danger btn-sm " onclick="cbModal(<?=$result->id?>)">
                 <a class="btn btn-info btn-sm " onclick="cbModal1(<?=$result->id?>)">
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
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <table class="table table-bordered">
              <thead class="bg-info">
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if($dataPesananProses!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPesananProses as $result):?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result->kd_pemesanan?></td>
                <td><?=$result->nama?></td>
                <td><?=$result->no_hp?></td>
                <td><?=$result->alamat?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($result->tglBuat) + (7 * 3600)) ?></td>
                <td><span class="badge badge-info" style="color: white"><?=$result->status?></span></td>
                <td>
                  <a class="btn btn-danger btn-sm " onclick="cbModal(<?=$result->id?>)">
                 <a class="btn btn-info btn-sm " onclick="cbModal2(<?=$result->id?>)">
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
          <div class="tab-pane fade" id="nav-selesai" role="tabpanel" aria-labelledby="nav-selesai-tab">
            <table class="table table-bordered">
              <thead class="bg-success">
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if($dataPesananSelesai!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPesananSelesai as $result):?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result->kd_pemesanan?></td>
                <td><?=$result->nama?></td>
                <td><?=$result->no_hp?></td>
                <td><?=$result->alamat?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($result->tglBuat) + (7 * 3600)) ?></td>
                <td><span class="badge badge-success" style="color: white"><?=$result->status?></span></td>
              </tr>
                <?php
                $no++;
              endforeach;
              ?>
            <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="nav-batal" role="tabpanel" aria-labelledby="nav-batal-tab">
            <table class="table table-bordered">
              <thead class="bg-danger">
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if($dataPesananGagal!= null):?>
              <?php 
              $no = 1; 
              foreach($dataPesananGagal as $result):?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result->kd_pemesanan?></td>
                <td><?=$result->nama?></td>
                <td><?=$result->no_hp?></td>
                <td><?=$result->alamat?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($result->tglBuat) + (7 * 3600)) ?></td>
                <td><span class="badge badge-danger" style="color: white"><?=$result->status?></span></td>
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
  </div>
</div>
<div class="modal fade" id="noticeDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formDelete" method="post">
                        <input value="DELETE" type="hidden" name="_method" name="id">
                        <div class="modal-body">
                            <p>Are you sure want to delete this data?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnCloseModal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">Edit Status</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="FormEdit" method="post" class="form-horizontal">
                     <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <?php foreach($dataPesananPending as $result) : ?>
                                    <option value="<?= $result->status?>"><?= $result->status?></option>
                                    <?php endforeach;?>
                                    <option value="Proses">Proses</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">                     
                            <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
               

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubahproses" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">Edit Status</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="FormEditProses" method="post" class="form-horizontal">
                     <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <?php foreach($dataPesananProses as $result) : ?>
                                    <option value="<?= $result->status?>"><?= $result->status?></option>
                                    <?php endforeach;?>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">                     
                            <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
               

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= $this->include('admin/template/footer'); ?>
<script>$("#btnCloseModal").on("click", function(){
        $("#noticeDelete").modal("hide");
    })
    function cbModal(id){
        $("#noticeDelete").modal("show");
        $("#formDelete").attr("action", "<?= base_url('admin/pemesanan/delete'); ?>/" + id);
    }
    function cbModal1(id){
        $("#ubah").modal("show");
        $("#FormEdit").attr("action", "<?= base_url('admin/pemesanan/edit'); ?>/" + id);
    }
    function cbModal2(id){
        $("#ubahproses").modal("show");
        $("#FormEditProses").attr("action", "<?= base_url('admin/pemesanan/editProses'); ?>/" + id);
    }
    

</script>
