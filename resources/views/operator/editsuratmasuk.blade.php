@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Edit Data Surat Masuk</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                 	<a>Edit</a>
                </li>
                <li class="breadcrumb-item active">
                	<strong>Data Surat Masuk</strong>
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
				<h5>Edit Data Surat Masuk </h5>
                	<div class="ibox-tools">
                        <a class="collapse-link">
                        	<i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        	<i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                        	<li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                        	<i class="fa fa-times"></i>
                        </a>
                    </div>
		        </div>
                <div class="ibox-content">
                	<form method="post" action="{{ route('opr.update', ['id' => $suratmasuk->id]) }}" enctype="multipart/form-data">
                		{{csrf_field()}}

                		<div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Nomor Surat</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="nomorsurat" value="{{$suratmasuk->nomorsurat}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Pengirim</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="pengirim" value="{{$suratmasuk->pengirim}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Penerima</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="penerima" value="{{$suratmasuk->penerima}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Prihal</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="prihal" value="{{$suratmasuk->prihal}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Tanggal Surat</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="tglsurat" value="{{$suratmasuk->tglsurat}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Nama File Lama </label>
							<div class="col-sm-10">
							<input type="text" disabled="" class="form-control"  name="old_file" value="{{$suratmasuk->namafile}}"></div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">File Baru</label>
							<div class="col-sm-10">
							     <input type="file" class="form-control" name="namafile" autofocus required>
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


@endsection