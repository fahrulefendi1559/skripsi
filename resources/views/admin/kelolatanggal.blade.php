@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
    	<h2>Kelola Periode Surat</h2>
        	<ol class="breadcrumb">
            	<li class="breadcrumb-item">
                	<a href="index.html">Home</a>
                </li>

                <li class="breadcrumb-item active">
                	<strong>Kelola Periode Surat</strong>
                </li>
            </ol>
    </div>
   
</div>

<br>

<div class="row">

    @if(session('sukses'))
            <div class="alert alert-success col-lg-12">
                <strong>Sukses </strong>
                {{session('sukses')}}
            </div>
        @endif

        @if(session('gagal'))
            <div class="alert alert-danger col-lg-12">
                <strong>Gagal! </strong>
                {{session('gagal')}}
            </div>
        @endif

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Kelola Periode Surat</h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="{{ route('admin.createperiode') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Periode</label>
                            <select class="form-control" name="periode">
                                <option value="" disabled selected>Pilih Periode Surat</option>
                                <option value="januari">Januari</option>
                                <option value="juli">Juli</option>
                            </select>
                        </div>

                          <?php
                            date_default_timezone_get("Asia/Jakarta");
                            date("Y");
                        ?>
                      
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="" disabled selected>Pilih Tahun</option>
                                <?php

                                    $Thnlalu=date("Y")-1;
                                    echo "<option value=".$Thnlalu.">".$Thnlalu."</option>";

                                    $ThnSekarang=date("Y");
                                    echo "<option value=".$ThnSekarang.">".$ThnSekarang."</option>";
                                    $ThnDepan=date("Y")+1;
                                    echo "<option value=".$ThnDepan.">".$ThnDepan."</option>";
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </div>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection