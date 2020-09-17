<!--main content start--> 
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class=""><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><a href="#"></i> Data Bisnis</a></li>
        </ul>
      </div>
    </div>              
    
    <div class="row state-overview">
      <div class="col-md-12">
      </div>
      <div class="col-md-12">
        <div class="panel" id="panel">
          <div id="p-head" class="panel-heading">
            <h4>Data Kelompok</h4>
          </div>
          <div class="panel-body">
            <button class="btn btn-success btn-sm text-right" id="tambah" style="margin-bottom: 10px">Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Fungsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="hasil-tabel">
                <?php $no=1; foreach($fungsi as $d ): ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$d['nama_fungsi']?></td>
                  <td>
                    <button class="btn btn-danger btn-sm hapus" value="<?=$d['id_fungsi']?>"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm edit" nama="<?=$d['nama_fungsi']?>" value="<?=$d['id_fungsi']?>"><i class="fa fa-pencil"></i></button>
                  </td>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row" style="padding-top: 20px">
          <div class="col-md-3">
            <label>Fungsi</label>
          </div>
          <div class="col-md-9">
            <input type="text" id="fungsi" class="form-control" name="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" id="simpan" hidden="">Simpan</button>
        <button type="button" class="btn btn-info" id="submit-edit" hidden="">Edit</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $('#simpan').click(function() {
    $.ajax({
    url : '<?=site_url('Action/data_fungsi/add')?>',
    type: 'POST',
    dataType: 'json',
    data: {nama_fungsi: $('#fungsi').val()},
    success: function(data){
      swal({ 
          title: "Data Telah Ditambahkan",
          text: "Jurnal Anda Telah Ditambahkan",
          icon: "success",
          buttons: false,
        });
        setTimeout(function(){  
          window.location.reload();
        },1000);
    }
  });
  });
  
  $("#tambah").click(function() {
    $('#fungsi').val('');
    $('#simpan').show();
    $('#submit-edit').hide();
    $('#modalbox').modal('toggle');
  });

  $(".hapus").click(function() {
    var id   = $(this).val();
    swal({ 
      title: "Konfimasi Hapus Data",
      text: "Hapus Data ?",
      icon: "warning",
      buttons: {
        cancel: "Batal",
        Hapus: true,
      },
    }).then((value) =>{
      switch(value){
        case "Hapus":
          $.ajax({
            url     : '<?=site_url('Action/data_fungsi/del/')?>'+id,
            type    : 'GET',
            dataType: 'json',
            success : function(data){
              swal({ 
                title  : "Data Berhasil Dihapus",
                text   : "Data Baru Berhasil Dihapus",
                icon   : "success",
                buttons: false,
              });
              setTimeout(function(){  
                window.location.reload();
              },1000);
            }
          });
        break;
      }
    });
  });

  $(".edit").click(function() {
    var id   = $(this).val();
    var nama = $(this).attr('nama');
    $('#simpan').hide();
    $('#submit-edit').show();
    $('#fungsi').val(nama);
    $('#modalbox').modal('toggle');    
    
    $("#submit-edit").click(function() {
      var nama = $('#fungsi').val();
      $.ajax({
        url: '<?=site_url('Action/data_fungsi/update/')?>'+id,
        type: 'POST',
        dataType: 'json',
        data: {nama_fungsi: nama},
        success: function(data){
          swal({ 
            title: "Data Telah Diperbarui",
            text: "Data Anda Telah Ditambahkan",
            icon: "success",
            buttons: false,
          });
          setTimeout(function(){  
            window.location.reload();
          },1000);
        }
      });
    });
  });
  
</script>