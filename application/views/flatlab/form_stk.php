<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Input Data STK</li>
        </ul>
      </div>
    </div>

    <div class="row state-overview">
      <div class="col-md-12">
        <div class="panel" id="panel">
          <div id="p-head" class="panel-heading">
            <h4>Input Data</h4>
          </div>
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="<?=site_url()?>/Action/Action_watermark/tb_stk">
              <div class="row" style="padding-left: 5%;padding-right: 5%; ">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">PIlih File</div>
                      <div class="col-md-9">
                        <input type="file" id="file" class="form-control" name="file">
                        <span class="text-danger" style="font-style: italic;">* pastikan file tidak dalam keadaan protected (read only)</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Jenis</div>
                      <div class="col-md-9">
                        <select class="form-control" name="jenis">
                          <option value="Pedoman">Pedoman</option>
                          <option value="TKO">TKO</option>
                          <option value="TKI">TKI</option>
                        </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Fungsi</div>
                      <div class="col-md-9">
                        <select class="form-control" name="fungsi">
                          <option value="Direktur Management Asset">Direktur Management Asset</option>
                          <option value="VIP Procurement Excellent Center">VIP Procurement Excellent Center</option>
                          <option value="Director Upstream">Director Upstream</option>
                        </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Nomer</div>
                      <div class="col-md-9"><input type="" class="form-control" name="nomer" required=""></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Perihal</div>
                      <div class="col-md-9"><input type="" class="form-control" name="perihal" required=""></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Catatan</div>
                      <div class="col-md-9">
                        <textarea class="form-control" name="catatan"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Kelompok</div>
                      <div class="col-md-9">
                        <select name="id_kelompok" class="form-control">
                          <?php foreach ($kelompok as $d): ?>
                            <option value="<?=$d['id_kelompok']?>"><?=$d['nama_kelompok']?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Fungsi</div>
                      <div class="col-md-9">
                        <select name="id_fungsi" class="form-control">
                          <?php foreach ($fungsi as $d): ?>
                            <option value="<?=$d['id_fungsi']?>"><?=$d['nama_fungsi']?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">Bisnis</div>
                      <div class="col-md-9">
                        <select name="id_bisnis" class="form-control">
                          <?php foreach ($bisnis as $d): ?>
                            <option value="<?=$d['id_bisnis']?>"><?=$d['nama_bisnis']?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div style="float: right">
                    <button  class="btn btn-danger" type="submit" id="insert">Insert Data</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>
</section>