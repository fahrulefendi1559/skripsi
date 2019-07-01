@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Edit Struktur</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="">Home</a>
                </li>
               
                <li class="breadcrumb-item active">
                	<strong>Edit Struktur</strong>
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
                <h5>Edit Data Struktur </h5>
                    <div class="ibox-tools">   
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
            </div>

            <div class="ibox-content">
                <form method="post" action="{{route('admin.editketua',['id_detail_struktur' => $struktur->id_detail_struktur])}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="{{$struktur->nama}}" required=""></div>
                    </div>

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nip" value="{{$struktur->nip}}" required=""></div>
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