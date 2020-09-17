<!--main content start--> 
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class=""><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><a href="#"></i> Data STK</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-info">
          <b>Pemberitahuan</b>
        </div>
      </div>
    </div>
              
    <div class="panel" id="p-cari">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-3">Cari Berdasarkan</div>
              <div class="col-lg-9">
                <select id="kelompok" class="form-control">
                  <option value="">-- Pilih Kelompok --</option>
                  <?php foreach ($kelompok as $d): ?>
                    <option value="<?=$d['id_kelompok']?>"><?=$d['nama_kelompok']?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-lg-3">Fungsi</div>
              <div class="col-lg-9">
                <select id="fungsi" class="form-control">
                  <option value="">-- Pilih Fungsi --</option>
                  <?php foreach ($fungsi as $d): ?>
                  <option value="<?=$d['id_fungsi']?>"><?=$d['nama_fungsi']?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-lg-3">No. Pencarian Bisnis</div>
              <div class="col-lg-9">
                <select id="bisnis" class="form-control">
                  <option value="">-- Pilih Pencarian Bisnis --</option>
                  <?php foreach ($bisnis as $d): ?>
                  <option value="<?=$d['id_bisnis']?>"><?=$d['nama_bisnis']?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-2">Nomer</div>
              <div class="col-lg-10"><input type="" class="form-control" id="nomer" placeholder="Cari berdasarkan nomer..." name=""></div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-lg-2">Perihal</div>
              <div class="col-lg-10"><textarea class="form-control" id="perihal" placeholder="Cari berdasarkan perihal..." rows="3"></textarea></div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="div"  style="float: right;">
            <button class="btn btn-danger" id="search"><i class="fa fa-search"></i> Cari</button>
            <button class="btn btn-success"><i class="fa fa-download"></i>Download FIle Excel</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row state-overview">
      <div class="col-md-12">
        <div class="panel" id="panel">
          <div id="p-head" class="panel-heading">
            <h4>Sistem Tata Kerja</h4>
          </div>
          <div class="panel-body">
            <p>Jumlah Data : <b class="text-danger" id="sum"><?=$sum?></b></p>
            <div class="table-responsive">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th></th>
                  <th>Nomer</th>
                  <th>Revisi Ke-</th>
                  <th>Perihal</th>
                  <th>TMT Berlaku</th>
                  <th>Catatan</th>
                  <th>Info</th>
                </tr>
              </thead>
              <tbody id="hasil-tabel">
                <?php $no=1; foreach ($data_stk as $d ): ?>
                <tr>
                  <td><?=$no++?></td>
                  <td class="text-center"><i class="fa fa-circle text-success"></i></td>
                  <td><a href="#modalbox" onclick="prosesmodalstk('<?=$d['id_stk']?>')" class="" style="color: orange"><?=$d['nomer']?></a></td>
                  <td><?=$d['revisi']?></td>
                  <td><?=$d['perihal']?></td>
                  <td><?=date('d M Y',strtotime($d['tmt']))?></td>
                  <td><?=$d['catatan']?></td>
                  <td class="text-danger"><?=$d['info']?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page end-->
  </section>
</section>

<!--main content end-->
<div class="modal fade" id="modalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="embed">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function prosesmodalstk(id){
    $.ajax({
      url     : '<?=site_url('Action/pdf_stk/')?>'+id,
      type    : 'ajax',
      dataType: 'json',
      success : function(data){
        var embed   =  '<embed src = "<?=base_url()?>assets/upload/'+data.file+'" type = "application/pdf" width = "100%" height = "500px" />';
        $('#embed').html(embed);
        $('#modalbox').modal('toggle');
      }
    });
  }

$('#search').click(function() {
  var kelompok  = $('#kelompok').val();
  var fungsi    = $('#fungsi').val();
  var bisnis    = $('#bisnis').val();
  var nomer     = $('#nomer').val();
  var perihal   = $('#perihal').val();
  var html      = '';
  var ttl ='';
  $.ajax({
    url     : '<?=site_url('Action/search_stk')?>',
    type    : 'POST',
    dataType: 'json',
    data    : {
      id_kelompok: kelompok,
      id_fungsi: fungsi,
      id_bisnis: bisnis,
      nomer: nomer,
      perihal: perihal,
    },
    success : function(data){
      no = 1;
      $('#sum').html('');
      $('#hasil-tabel').html('');
      $.each(data, function(i, d){
        html += '<tr>'+
                  '<td>'+no+'</td>'+
                  '<td class="text-center"><i class="fa fa-circle text-success"></i></td>'+
                  '<td><a href="#modalbox" onclick="prosesmodalstk('+d.id_stk+')" class="" style="color: orange">'+d.nomer+'</a></td>'+
                  '<td>'+d.revisi+'</td>'+
                  '<td>'+d.perihal+'</td>'+
                  '<td>'+d.tmt+'</td>'+
                  '<td>'+d.catatan+'</td>'+
                  '<td class="text-danger">'+d.info+'</td>'+
                '</tr>';
                no++;
      }); 
      $('#hasil-tabel').html(html);
      $('#sum').html(no-1);
    }
  });

});
</script>