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
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row-md-6 justify-content-center">
            <div class="col-md-6 span6" style="float: none; margin: 0 auto;">

            @if ($message = Session::get('success'))
            <div id="messageAlert" class="alert alert-success alert-dismissible">
              <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
              {{ $message }}
            </div>
            @endif

            @if (count($errors) > 0)
            <div id="messageAlert" class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-close"></i> Gagal!</h4>
              @foreach ($errors->all() as $error)
              <label class="failed form-control alert alert-danger" >
                <li>{{ $error }}</li>
              </label>
              @endforeach
            </div>
            @endif

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('storeData') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nelayan">Nelayan</label>
                    <select name="nelayan" id="nelayan" class="form-control center select2bs4" required > 
                        <option selected="selected" hidden value="" disabled selected >Pilih Nelayan</option> 
                      @foreach ($nelayans as $nelayan)
                        <option value="{{$nelayan->name}}" data-umur="{{$nelayan->umur}}" data-jenis="{{$nelayan->jenis}}">{{$nelayan->name}}</option>
                      @endforeach
                      </select> 
                      @error('nelayan')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group" >
                    <label for="umur">Umur</label>
                    <input readonly id="umur" type="text" value="{{ old('umur') }}" class="form-control @error('umur') is-invalid @enderror" name="umur" required >
                      @error('umur')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group" >
                    <label for="jenisNelayan">Jenis Nelayan</label>
                    <input readonly id="jenisNelayan" type="text" value="{{ old('jenisNelayan') }}" class="form-control @error('jenisNelayan') is-invalid @enderror" name="jenisNelayan" required >
                      @error('jenisNelayan')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <!-- <div class="form-group"> -->
                  <table id="tambahIkanTable">
                    <tr>
                      <th style="font-weight: normal;">Jenis TCT</th>
                      <th id="hide3" style="font-weight: normal;">Harga Ikan</th>
                      <th id="hide4" style="font-weight: normal;">Bobot Ikan</th>
                      <th style="font-weight: normal;"></th>
                    </tr>
                    <tr>
                        <td width="210"  style="padding-right:0px"  >
                          <select name="tambahIkan[0][jenis]" id="pilihanikan" class="form-control pilihanikan center select2bs4" required > 
                            <option selected="selected" hidden value="Lainnya" disabled selected>Pilih Jenis Ikan</option> 
                            <option value="Tongkol Abu-Abu">Tongkol Abu-Abu</option>
                            <option value="Tongkol Komo">Tongkol Komo</option>
                            <option value="Tongkol Krai">Tongkol Krai</option>
                            <option value="Tongkol Lisong">Tongkol Lisong</option>
                            <option value="Tuna Albakora">Tuna Albakora</option>
                            <option value="Tuna Cakalang">Tuna Cakalang</option>
                            <option value="Tuna Madidihang">Tuna Madidihang</option>
                            <option value="Tuna Mata Besar">Tuna Mata Besar</option>
                            <option value="Tuna Neritik">Tuna Neritik</option>
                            <option value="Tuna Sirip Biru Selatan">Tuna Sirip Biru Selatan</option>
                            <option value="Tenggiri">Tenggiri</option>
                            <option value="Tenggiri Papan">Tenggiri Papan</option>
                            <option value="Lainnya">Lainnya</option>
                          </select> 
                          @error('tambahIkan')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </td>
                        <td id="hide1" width="170" style="padding-right:20px">
                          <input name="tambahIkan[0][jumlah]" type="number" class="form-control" >
                        </td>
                        <td id="hide2" width="170" style="padding-right:20px">
                          <input name="tambahIkan[0][bobot]" type="number" class="form-control" >
                        </td>
                        <td>
                        <button type="button" style="padding-left:0.5rem;padding-right:0.5rem" name="tambah" id="tambah" class="tambah btn btn-success">Tambah</button>
                        </td>
                    </tr>
                  </table>
                  <div id="div1"></div>
                  

                  <div class="form-group" style="padding-top:15px;">
                    <label for="alatTangkap">Alat Tangkap</label>
                    <select name="alatTangkap" id="" class="form-control center select2bs4" required > 
                        <option selected="selected" hidden value="" disabled selected >Pilih Alat Tangkap</option> 
                      
                        <option value="Pukat Tarik Udang Ganda">Pukat Tarik Udang Ganda</option>
                        <option value="Pukat Tarik Udang Tunggal">Pukat Tarik Udang Tunggal</option>
                        <option value="Pukat Pantai (Jaring Arad)">Pukat Pantai (Jaring Arad)</option>
                        <option value="Pukat Cincin">Pukat Cincin</option>
                        <option value="Jaring Insang Hanyut">Jaring Insang Hanyut</option>
                        <option value="Jaring Klitik">Jaring Klitik</option>
                        <option value="Jaring Insang Tetap">Jaring Insang Tetap</option>
                        <option value="Bagan Tancap">Bagan Tancap</option>
                        <option value="Jaring Angkat Lainnya">Jaring Angkat Lainnya</option>
                        <option value="Pancing Ulur">Pancing Ulur</option>
                        <option value="Pancing Tonda">Pancing Tonda</option>
                        <option value="Pancing Cumi">Pancing Cumi</option>
                        <option value="Pancing Lainnya">Pancing Lainnya</option>
                        <option value="Sero (Termasuk Kelong)">Sero (Termasuk Kelong)</option>
                        <option value="Bubu (Termasuk Bubu Ambal)">Bubu (Termasuk Bubu Ambal)</option>
                        <option value="Perangkap Lainnya">Perangkap Lainnya</option>
                        <option value="Alat Penangkap Kepiting">Alat Penangkap Kepiting</option>
                        <option value="Garpu dan Tombak, dan lain-lain">Garpu dan Tombak, dan lain-lain</option>
                      </select> 
                      @error('alatTangkap')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group" >
                    <label for="jenisKapal">Armada Kapal</label>
                    <select name="jenisKapal" id="" class="form-control center select2bs4" required > 
                        <option selected="selected" hidden value="" disabled selected >Pilih Armada Kapal</option> 
                      
                        <option value="Perahu Papan Jukung">Perahu Papan Jukung</option>
                        <option value="Perahu Papan Kecil">Perahu Papan Kecil</option>
                        <option value="Perahu Papan Sedang">Perahu Papan Sedang</option>
                        <option value="Perahu Papan Besar">Perahu Papan Besar</option>
                        <option value="Motor Tempel">Motor Tempel</option>
                        <option value="Kapal Motor 0-5 GT">Kapal Motor 0-5 GT</option>
                        <option value="Kapal Motor 5-10 GT">Kapal Motor 5-10 GT</option>
                        <option value="Kapal Motor 10-20 GT">Kapal Motor 10-20 GT</option>
                        <option value="Kapal Motor 20-30 GT">Kapal Motor 20-30 GT</option>
                        <option value="Kapal Motor 30-50 GT">Kapal Motor 30-50 GT</option>
                        <option value="Kapal Motor 50-100 GT">Kapal Motor 50-100 GT</option>
                        <option value="Kapal Motor 100-200 GT">Kapal Motor 100-200 GT</option>
                        <option value="Kapal Motor >200 GT">Kapal Motor >200 GT</option>
                      </select> 
                      @error('jenisKapal')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="jenisIkanLainnya">Jenis Ikan Lainnya</label>
                    <input id="jenisIkanLainnya" type="text" class="form-control @error('jenisIkanLainnya') is-invalid @enderror" name="jenisIkanLainnya" value="{{ old('jenisIkanLainnya') }}"  >
                      @error('jenisIkanLainnya')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="namaKapal">Nama Kapal</label>
                    <input id="namaKapal" type="text" class="form-control @error('namaKapal') is-invalid @enderror" name="namaKapal" value="{{ old('namaKapal') }}" required >
                      @error('dpi')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="noKapal">Nomor Kapal</label>
                    <input id="noKapal" type="text" class="form-control @error('noKapal') is-invalid @enderror" name="noKapal" value="{{ old('noKapal') }}" required >
                      @error('dpi')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="jumlahABK">Jumlah ABK</label>
                    <input id="jumlahABK" type="number" class="form-control @error('jumlahABK') is-invalid @enderror" name="jumlahABK" value="{{ old('jumlahABK') }}" required >
                      @error('dpi')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="dpi">Daerah Penangkapan Ikan</label>
                    <input id="dpi" type="text" class="form-control @error('dpi') is-invalid @enderror" name="dpi" value="{{ old('dpi') }}" required >
                      @error('dpi')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group" >
                    <label for="tempatpendaratanikan">Tempat Pendaratan Ikan</label>
                    <input id="tempatpendaratanikan" type="text" class="form-control @error('tempatpendaratanikan') is-invalid @enderror" name="tempatpendaratanikan" value="{{ old('tempatpendaratanikan') }}" required >
                      @error('tempatpendaratanikan')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  <!-- </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
  window.setTimeout(function() {
    $(".alert").fadeTo(200, 0).slideUp(200, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
<script>
$(function() {
  $('#pilihanikan').on("change", function(){
    console.log("tes");
    if($(this).val() == "Lainnya"){
        document.getElementById('div1').innerHTML='<table  ><tr><th style="font-weight: normal;">Jenis TCT</th><th style="font-weight: normal;">Jumlah Ikan</th><th style="font-weight: normal;">Bobot Ikan</th></tr><tr><td style="padding-right:10px" ><input id="jenisIkanLain" type="text" class="form-control @error('jenisIkanLain') is-invalid @enderror" name="jenisIkanLain" value="{{ old('jenisIkanLain') }}" required >@error('jenisIkanLain')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td style="padding-right:10px" ><input id="jumlahIkanLain" type="number" class="form-control @error('jumlahIkanLain') is-invalid @enderror" name="jumlahIkanLain" value="{{ old('jumlahIkanLain') }}" required >@error('jumlahIkanLain')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td style="padding-right:10px" ><input id="bobotIkanLain" type="number" class="form-control @error('bobotIkanLain') is-invalid @enderror" name="bobotIkanLain" value="{{ old('bobotIkanLain') }}" required >@error('bobotIkanLain')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td></tr></table>';
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
      }
      else 
      {
        document.getElementById('div1').innerHTML='';
        $('#hide1').show();
        $('#hide2').show();
        $('#hide3').show();
        $('#hide4').show();
      }
  });
});
</script>
<script>
$(function() {
   $('#nelayan').on('change', function(){

       var umur = $(this).children('option:selected').data('umur');
       var jenis = $(this).children('option:selected').data('jenis');
       document.getElementById("umur").value = umur;
       document.getElementById("jenisNelayan").value = jenis;
   });
});
</script>
<script type="text/javascript">
   
   var i = 0;
      
   $("#tambah").click(function(){
       ++i;
       $("#tambahIkanTable").append('<tr id="tr1"><th style="font-weight: normal;">Jenis TCT</th><th style="font-weight: normal;">Jumlah Ikan</th><th style="font-weight: normal;">Bobot Ikan</th><th style="font-weight: normal;"></th></tr><tr id="tr2"><td width="210" style="padding-right:0px"   ><select name="tambahIkan['+i+'][jenis]" id="" class="form-control center select2bs4" required > <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> <option value="Tongkol Abu-Abu">Tongkol Abu-Abu</option><option value="Tongkol Komo">Tongkol Komo</option><option value="Tongkol Krai">Tongkol Krai</option><option value="Tongkol Lisong">Tongkol Lisong</option><option value="Tuna Albakora">Tuna Albakora</option><option value="Tuna Cakalang">Tuna Cakalang</option><option value="Tuna Madidihang">Tuna Madidihang</option><option value="Tuna Mata Besar">Tuna Mata Besar</option><option value="Tuna Neritik">Tuna Neritik</option><option value="Tuna Sirip Biru Selatan">Tuna Sirip Biru Selatan</option><option value="Tenggiri">Tenggiri</option><option value="Tenggiri Papan">Tenggiri Papan</option></select> @error('tambahIkan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td width="170" style="padding-right:20px;"><input name="tambahIkan['+i+'][jumlah]" type="number" class="form-control"></td><td width="170" style="padding-right:20px"><input name="tambahIkan['+i+'][bobot]" type="number" class="form-control" required></td><td ><button type="button" style="padding-left:0.5rem;padding-right:0.5rem" name="hapus" id="hapus" class="hapus btn btn-danger">Hapus</button></td></tr>');
       $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
      });
  
   $(document).on('click', '.hapus', function(){  
        $('#tr1').remove();
        $('#tr2').remove();
        i--;
   });  
</script>

@endsection