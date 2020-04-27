@extends('layouts.adminlte')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Data Tangkapan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Tangkapan</a></li>
              <li class="breadcrumb-item active">List Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row-md-12 justify-content-center">
            
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form role="form" method="POST" action="{{ route('storeData') }}">
                @csrf -->
                

                <div class="card-body">
                
                <table id="datatable2" class="table table-bordered table-striped">
                    <thead>
                    <div style="padding-bottom:20px; position:relative;text-align:left" class="">
                    <a  href="{{route('exportData')}}"><button style="" type="button" class="btn btn-success">Download Data</button>
                    </a>
                    </div>
                    <tr>
                      <th>No</th>
                      <th>Nelayan</th>
                      <th>Jenis TCT</th>
                      <th>Harga TCT</th>
                      <th>Bobot TCT</th>
                      <th>Jenis Ikan Lainnya</th>
                      <th>Harga Ikan Lainnya</th>
                      <th>Bobot Ikan Lainnya</th>
                      <th>Alat Tangkap</th>
                      <th>Jenis Kapal</th>
                      
                      <th>Nama Kapal</th>
                      <th>Nomor Kapal</th>
                      <th>Jumlah ABK</th>
                      <th>Daerah Penangkapan Ikan</th>
                      <th>Tempat Pendaratan Ikan</th>
                      <th>Tanggal Penangkapan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                        @foreach ($datas as $data)
                    <?php $i++?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$data->nelayan}}</td>
                      <td>{{$data->jenisTCT}}</td>
                      <td>{{$data->hargaTCT}}</td>
                      <td>{{$data->bobotTCT}}</td>
                      <td>{{$data->jenisIkanLainnya}}</td>
                      <td>{{$data->hargaIkanLainnya}}</td>
                      <td>{{$data->bobotIkanLainnya}}</td>
                      <td>{{$data->alattangkap}}</td>
                      <td>{{$data->jeniskapal}}</td>
                      
                      <td>{{$data->namakapal}}</td>
                      <td>{{$data->nokapal}}</td>
                      <td>{{$data->jumlahABK}}</td>
                      <td>{{$data->dpi}}</td>
                      <td>{{$data->tempatpendaratanikan}}</td>
                      <td>{{$data->tanggal}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      
                    </tr>
                    </tfoot>
                    
                  </table>
                
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
              <!-- </form> -->
            </div>
            <!-- /.card -->
            </div>
            
        </div>
    </div>
<!-- /.content-wrapper -->
</div>

<style>
.tes {
  padding-left: 10px;
}
</style>
<script>
  $(function () {
    $("#datatable1").DataTable();
    $('#datatable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(200, 0).slideUp(200, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
<style>
.b {
  position: relative;
  right: 0px;
  left: 100px;
  /* width: 100px; */
  /* height: 120px; */
  /* border: 3px solid blue; */
} 
</style>

@endsection