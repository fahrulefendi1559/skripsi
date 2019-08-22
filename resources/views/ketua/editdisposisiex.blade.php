@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Edit Data Surat Terdisposisi</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                 	<a>Edit Data Surat Terdisposisi</a>
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
				<h5>Edit Data Surat Terdisposisi</h5>
                	<div class="ibox-tools">
                        <a class="close-link">
                        	<i class="fa fa-times"></i>
                        </a>
                    </div>
		        </div>
                <div class="ibox-content">
                	<form method="post" action="" enctype="multipart/form-data">
                		{{csrf_field()}}

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Jenis Surat</label>
							<div class="col-sm-10">
                                <select class="form-control " name="id_sifat" autofocus required>
                                    <option disabled selected>Pilih Jenis Surat</option>
                                        @foreach ($sifatsurat as $sifat)                  
                                            <option value="{{ $sifat->id_sifat }}" autofocus required>Surat {{ $sifat->sifat}}</option>             
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Penerima</label>
							<div class="col-sm-10">
                                <select class="form-control " name="id_role" autofocus required>
                                    <option disabled selected>Pilih Bidang</option>
                                        @foreach ($role as $roles)
                                            @if($roles->id != "999" && $roles->id != "888" && $roles->id != "1")              
                                                <option value="{{ $roles->id }}" autofocus required>Bidang {{ $roles->namarole}}</option>
                                            @endif          
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Tanggal Disposisi</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control datepicker1" name="tgldispo" value="{{$dispo->tgldispo}}" autofocus required>
                                    <span class="help-block with-errors"></span>
                             </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Catatan</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control datepicker1" name="catatan" value="{{$dispo->catatan}}" autofocus required>
                                    <span class="help-block with-errors"></span>
                             </div>
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