@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Edit Data Surat Keluar External</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                 	<a>Edit</a>
                </li>
                <li class="breadcrumb-item active">
                	<strong>Data Surat Keluar External</strong>
                </li>
            </ol>
    </div>
   
</div>

<br>

<div class="container">
<div class="row row-centered">
    <div class="col-lg-12 col-centered ">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Edit Data Surat Keluar External </h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="{{ route('opr.updatekeluar_ex', ['id' => $keluar_ex->id]) }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Nomor Surat</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomorsurat" value="{{$keluar_ex->nomorsurat}}" required=""></div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Pengirim</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="pengirim" value="{{$keluar_ex->pengirim}}" required=""></div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Penerima</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="penerima" value="{{$keluar_ex->penerima}}" required=""></div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Prihal</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="prihal" value="{{$keluar_ex->prihal}}" required=""></div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control datepicker1" name="tglsurat" value="{{$keluar_ex->tglsurat}}" required=""></div>
                        </div>


                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        </div>
                                
                    </form>
                </div>
            </div>
        </div>
</div>
</div>
<script type="text/javascript">

 //datepicker tgl surat
 $(function(){
  $(".datepicker1").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });

</script>

@endsection