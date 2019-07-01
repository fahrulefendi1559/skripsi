@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Disposisi Surat Masuk</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Disposisi</strong>
                </li>
            </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    	<div class="col-lg-8 col-lg-offset-4">
            <div class="ibox ">
                <div class="ibox-title">
                	<h5>Disposisi Surat</h5>
                	<div class="ibox-tools">
                        <a class="collapse-link">
                        	<i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        	<i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                        </ul>
                        <a class="close-link">
                        	<i class="fa fa-times"></i>
                        </a>
                    </div>

				<div class="ibox-content">
                	<form method="post" action="" enctype="multipart/form-data">
                		{{csrf_field()}}

                		<div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Nomor Surat</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control" name=""  autofocus required>
                                    <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Diteruskan Kepada</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control" name="diteruskan" autofocus required>
                                    <span class="help-block with-errors"></span>
                             </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Isi Disposisi</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control" name="isi_disposisi" autofocus required>
                                    <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Batas Waktu</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control datepicker1" name="batas_waktu" autofocus required>
                                    <span class="help-block with-errors"></span>
                             </div>
                        </div>

                        <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Sifat</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control"  name="sifat" autofocus required>
                                    <span class="help-block with-errors"></span>
                            </div>
                        </div>

                         <div class="form-group  row">
                			<label class="col-sm-2 col-form-label">Catatan</label>
							<div class="col-sm-10">
							     <input type="text" class="form-control"  name="catatan"  autofocus required>
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
</div>

@endsection