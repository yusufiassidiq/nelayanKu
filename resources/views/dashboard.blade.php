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
            <div class="col-md-12 span12" style="float: none; margin: 0 auto;">
            
            <div class="card card-primary">
            <div class="card-body">
                    <!-- Small Box (Stat card) -->
                    <h5 class="mb-2 ">Data Insight</h5>
                        <div class="row">
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3>{{$totalNelayan}} Orang</h3>

                                <p>Total Nelayan</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-ship"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3>{{$bobotTangkapan}} Ton</h3>

                                <p>Total Bobot Tangkapan</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3>{{$jumlahTangkapan}} Ekor</h3>

                                <p>Total Jumlah Tangkapan</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-balance-scale"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3>{{$nelayanTerbaik}}</h3>

                                <p>Nelayan Terbaik</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                        </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="card card-primary">
              <div class="card-body">
                <div class="chart">
                  <canvas id="bar-chart" style="height: 400px; max-height: 400px;"></canvas>
                </div>
              </div>
            </div>
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form role="form" method="POST" action="{{ route('storeData') }}">
                @csrf -->
                

                
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
// Bar chart
  var jumlahperbulan = {!! json_encode($jumlahperbulan) !!};
  var tahun = {!!json_encode($year) !!};
  var jumlah = new Array(12).fill(0);

  for (var i = 0; i < jumlahperbulan.length; i++){
    var dt = jumlahperbulan[i].tanggal.split("-");
    console.log(dt);
    jumlah[parseInt(dt[1])-1] = jumlahperbulan[i].jumlah;
  }
  new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
       "September", "Oktober", "November", "Desember"],
      datasets: [
        {
          label: "Jumlah (ton)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#f5c57d","#a230c2","#d12d2a","#7471d9","#396639",
          "#D6B8CE","#D6D640"],
          // data: [2478,5267,734,8784,433,10100,3214,7362,8352,4356,1573,3125]
          data : jumlah,
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Grafik Jumlah Tangkapan Pada Tahun '+tahun,
      }
    }
});
</script>
<style>
.tes {
  padding-left: 10px;
}
</style>

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