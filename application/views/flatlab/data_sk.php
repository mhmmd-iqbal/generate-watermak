<!--main content start--> 
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class=""><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><a href="#"></i> Data SK</a></li>
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
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-2">Nomer</div>
              <div class="col-lg-10"><input type="" class="form-control" id="nomer" placeholder="Cari berdasarkan nomer..." name=""></div>
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
            <h4>Surat Keputusan</h4>
          </div>
          <div class="panel-body">
            <div class="table-responsive">              
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produk Hukum</th>
                  <th>Nomor</th>
                  <th>Perihal</th>
                  <th>TMT Berlaku</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <tbody id="hasil-tabel">
                <?php foreach ($data_sk as $d ): ?>
                <tr>
                  <td><?=$d['produk']?></td>
                  <td><a href="#modal" onclick="prosesmodalsk('<?=$d['id_sk']?>')" class="modal_sk" style="color: orange"><?=$d['nomer']?></a></td>
                  <td><?=$d['perihal']?></td>
                  <td><?=date('d M Y',strtotime($d['tmt']))?></td>
                  <td><?=$d['catatan']?></td>
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
  function prosesmodalsk(id){
    $.ajax({
      url     : '<?=site_url('Action/pdf_sk/')?>'+id,
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
  var nomer     = $('#nomer').val();
  var html      = '';
  var ttl       ='';
  $.ajax({
    url     : '<?=site_url('Action/search_sk')?>',
    type    : 'POST',
    dataType: 'json',
    data    : {
      id_kelompok: kelompok,
      nomer: nomer,
    },
    success : function(data){
      console.log(data);
      no = 1;
      $('#hasil-tabel').html('');
      $.each(data, function(i, d){
        html += '<tr>'+
                  '<td>'+d.produk+'</td>'+
                  '<td><a href="#modal" onclick="prosesmodalsk('+d.id_sk+')" class="modal_sk" style="color: orange">'+d.nomer+'</a></td>'+
                  '<td>'+d.perihal+'</td>'+
                  '<td>'+d.tmt+'</td>'+
                  '<td>'+d.catatan+'</td>'+
                '</tr>';
                no++;
      }); 
      $('#hasil-tabel').html(html);
    }
  });

});
</script>