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
            <h4>Data Operator</h4>
          </div>
          <div class="panel-body">
            <button class="btn btn-success btn-sm text-right" id="tambah" style="margin-bottom: 10px" >Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="hasil-tabel">
                <?php $no=1; foreach ($operator as $d ): ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$d['nama']?></td>
                  <td><?=$d['email']?></td>
                  <td>
                    <button class="btn btn-danger btn-sm hapus" value="<?=$d['id']?>"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm edit" nama="<?=$d['nama']?>" email="<?=$d['email']?>" value="<?=$d['id']?>"><i class="fa fa-pencil"></i></button>
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
        <div class="row form-group" style="padding-top: 20px">
          <div class="col-md-3">
            <label>Nama User</label>
          </div>
          <div class="col-md-9">
            <input type="text" id="nama" class="form-control" name="">
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3">
            <label>Email</label>
          </div>
          <div class="col-md-9">
            <input type="email" id="email" class="form-control" name="">
            <p style="font-style: italic;color: red">Password default adalah 12345</p>
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
    url : '<?=site_url('Action/data_operator/add')?>',
    type: 'POST',
    dataType: 'json',
    data: {nama: $('#nama').val(), email: $('#email').val()},
    success: function(data){
      swal({ 
          title: "Berhasil",
          text: "Operator Baru Telah Ditambahkan",
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
    $('#kelompok').val('');
    $('#simpan').show();
    $('#submit-edit').hide();
    $('#modalbox').modal('toggle');
  });

  $(".hapus").click(function() {
    var id   = $(this).val();
    swal({ 
      title: "Perhatian",
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
            url     : '<?=site_url('Action/data_operator/del/')?>'+id,
            type    : 'GET',
            dataType: 'json',
            success : function(data){
              swal({ 
                title  : "Berhasil",
                text   : "Data Berhasil Dihapus",
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
    var id    = $(this).val();
    var nama  = $(this).attr('nama');
    var email = $(this).attr('email');
    $('#simpan').hide();
    $('#submit-edit').show();
    $('#nama').val(nama);
    $('#email').val(email);
    $('#modalbox').modal('toggle');    
    
    $("#submit-edit").click(function() {
      var nama = $('#nama').val();
      var email = $('#email').val();
      $.ajax({
        url: '<?=site_url('Action/data_operator/update/')?>'+id,
        type: 'POST',
        dataType: 'json',
        data: {nama: nama, email: email},
        success: function(data){
          swal({ 
            title: "Berhasil",
            text: "Data Operator Telah Ditambahkan",
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