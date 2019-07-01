@extends('layouts.app')

@section('content')

 <div class="row">
	<div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$Tahun}}</span>
                <h5>Surat Masuk</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{ $countsurat }} Arsip</h1>
                   
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>

    <div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$Tahun}} Arsip</span>
                <h5>Surat Keluar</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{ $countkeluar }} Arsip</h1>
                    
					<small>Total Data Surat </small>
			</div>
        </div>
    </div>

    <div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$Tahun}}</span>
                <h5>Surat Tugas</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">40 886,200</h1>
                    
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>
</div>


@endsection