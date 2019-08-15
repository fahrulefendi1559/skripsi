@extends('layouts.app')

@section('content')

 <div class="row">
	<div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$periode}} {{ $Tahun }}</span>
                <h5>Surat Masuk Internal</h5>
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
            	<span class="label label-success float-right">{{$periode}} {{ $Tahun }}</span>
                <h5>Surat Masuk External</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{ $countsurat_ex }} Arsip</h1>
                   
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>

    <div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$periode}} {{$Tahun}}</span>
                <h5>Surat Keluar Internal</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{$countkeluar}} Arsip</h1>
                    
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>

	<div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$periode}} {{$Tahun}}</span>
                <h5>Surat Keluar External</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{$countkeluarex}} Arsip</h1>
                    
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>

    <div class="col-lg-4">
    	<div class="ibox ">
        	<div class="ibox-title">
            	<span class="label label-success float-right">{{$periode}} {{$Tahun}}</span>
                <h5>Surat Tugas</h5>
            </div>
            <div class="ibox-content">
            	<h1 class="no-margins">{{$counttugas}} Arsip</h1>
            
					<small>Total Data Surat</small>
			</div>
        </div>
    </div>
</div>


@endsection