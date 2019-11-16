@extends('layouts.adminlte')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Tambah Nelayan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nelayan</a></li>
              <li class="breadcrumb-item active">Tambah Nelayan</li>
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
                <h3 class="card-title">Form Tambah Nelayan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('storeNelayan') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nelayan">Nelayan</label>
                    <select name="nelayan" id="" class="form-control center select2bs4" required > 
                        <option selected="selected" hidden value="" disabled selected >Pilih Nelayan</option> 
                      @foreach ($nelayans as $nelayan)
                        <option value="{{$nelayan->name}}">{{$nelayan->name}}</option>
                      @endforeach
                      </select> 
                      @error('nelayan')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="tess">
                    <div class="row" >
                      <div class="col-md-6" >
                        <div class="form-group" >
                          <label for="tambahIkan">Jenis Ikan</label>
                          <select name="tambahIkan[0][jenis]" id="" class="form-control center select2bs4" required > 
                            <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> 
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
                          </select> 
                          @error('tambahIkan')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-4" >
                        <div class="form-group" >
                        <label for="jumlahIkan">Jumlah</label>
                          <div class="row" >
                            <div class="col-md-7" style="padding-right:0px" >
                              <input name="tambahIkan[0][jumlah]" type="number" class="form-control">
                            </div>
                            <div class="input-group-append col-md-3" style="padding-left:0px; padding-right:30px" >
                              <span class="input-group-text">Ton</span>
                            </div>
                            <div class="col-md-2"  style="padding-left:19px;">
                              <button type="button" style="padding-left:0.5rem;padding-right:0.5rem" name="tambah" id="tambah" class="tambah btn btn-success">Tambah</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="copy hide">
                    <div class="row roww" >
                      <div class="col-md-6" >
                        <div class="form-group" >
                          <label for="jenisIkan">Jenis Ikan</label>
                          <select name="jenisIkan[]" id="" class="form-control center select2bs4" required > 
                            <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> 
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
                          </select> 
                          @error('jenisIkan')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-4" >
                        <div class="form-group" >
                        <label for="jumlahIkan">Jumlah</label>
                          <div class="row" >
                            <div class="col-md-7" style="padding-right:0px" >
                              <input name="jumlahIkan[]" type="number" class="form-control">
                            </div>
                            <div class="input-group-append col-md-3" style="padding-left:0px; padding-right:30px" >
                              <span class="input-group-text">Ton</span>
                            </div>
                            <div class="col-md-2"  style="padding-left:19px;">
                              <button type="button" style="padding-left:0.5rem;padding-right:0.5rem" name="hapus" id="hapus" class="hapus btn btn-danger">Hapus</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <table class="table table-bordered" id="dynamicTable">  
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <tr>  
                            <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name" class="form-control" /></td>  
                            <td><input type="text" name="addmore[0][qty]" placeholder="Enter your Qty" class="form-control" /></td>  
                            <td><select name="jenisIkan[]" id="" class="form-control center select2bs4" required > 
                            <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> 
                            <option value="Tongkol Abu-Abu">Tongkol Abu-Abu</option>
                            <option value="Tongkol Komo">Tongkol Komo</option>
                            </select>  
                            </td>
                            <td><button type="button" name="add" id="add" class="add btn btn-success">Add More</button></td>  
                        </tr>  
                    </table> 

                    <div id="a">
                      <input id="Text1" type="text" />
                    </div>
                    <input id="btnAdd" type="button" value="Add" />

                  
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
<script type="text/javascript">


$(document).ready(function() {
  

  $(".tambah").click(function(){ 
    //Initialize Select2 Elements
    
    var html = $(".copy").html();
    $(".tess").after(html);
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    });
  });


  $("body").on("click",".hapus",function(){ 
      $(this).parents(".roww").remove();
  });


});


</script>
<!-- <script type="text/javascript">
  var j = 0;
  $("#tambah").on('click',function(){
    ++j;
    
    console.log("hihi");
    $(".tess").append('<div class="row" ><div class="col-md-6" ><div class="form-group"><label for="tambahIkan">Jenis Ikan</label><select name="tambahIkan['+j+'][jenis]" id="" class="form-control center select2bs4" required > <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> <option value="Tongkol Abu-Abu">Tongkol Abu-Abu</option><option value="Tongkol Komo">Tongkol Komo</option><option value="Tongkol Krai">Tongkol Krai</option><option value="Tongkol Lisong">Tongkol Lisong</option><option value="Tuna Albakora">Tuna Albakora</option><option value="Tuna Cakalang">Tuna Cakalang</option><option value="Tuna Madidihang">Tuna Madidihang</option><option value="Tuna Mata Besar">Tuna Mata Besar</option><option value="Tuna Neritik">Tuna Neritik</option><option value="Tuna Sirip Biru Selatan">Tuna Sirip Biru Selatan</option><option value="Tenggiri">Tenggiri</option><option value="Tenggiri Papan">Tenggiri Papan</option></select> </div><div class="col-md-4" ><div class="form-group" ><label for="jumlahIkan">Jumlah</label><div class="row" ><div class="col-md-7" style="padding-right:0px" ><input name="tambahIkan[0][jumlah]" type="number" class="form-control"></div><div class="input-group-append col-md-3" style="padding-left:0px; padding-right:30px" ><span class="input-group-text">Ton</span></div><div class="col-md-2"  style="padding-left:19px;"><button type="button" style="padding-left:0.5rem;padding-right:0.5rem" name="hapus" id="hapus" class="hapus btn btn-danger">Hapus</button></div></div></div></div></div></div>');
    console.log("hehe");
    $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
  });
</script> -->

<script type="text/javascript">
   
   var i = 0;
      
   $("#add").click(function(){
  
       ++i;
        
       $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><select name="jenisIkan[]" id="" class="form-control center select2bs4" required > <option selected="selected" hidden value="" disabled selected >Pilih Jenis Ikan</option> <option value="Tongkol Abu-Abu">Tongkol Abu-Abu</option><option value="Tongkol Komo">Tongkol Komo</option></select>  </td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
       $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
      });
  
   $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
   });  
  
$(document).ready(function() {
  $("#btnAdd").click(function() {
    $("#a").append('<div class="con"><input type="text" id="Text1" value="" />' + '<input type="button" class="btnRemove" value="Remove"/></div>');
  });
  $('body').on('click','.btnRemove',function() {
    $(this).parent('div.con').remove()

  });
});
</script>

@endsection