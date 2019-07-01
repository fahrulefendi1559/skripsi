@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Edit User</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="">Home</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="">Daftar User</a>
                </li>
               
                <li class="breadcrumb-item active">
                	<strong>Edit User</strong>
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
                <h5>Edit Data User </h5>
                    <div class="ibox-tools">   
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
            </div>

            <div class="ibox-content">
                <form method="post" action="{{ route('admin.updateuser', ['id' => $edituser->id]) }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$edituser->name}}" required=""></div>
                    </div>

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="{{$edituser->username}}" required=""></div>
                    </div>

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{$edituser->email}}" required=""></div>
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