@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Surat Terdisposisi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data Surat Terdisposisi</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus">Tambah Data</i></button>
            
        </div>
    </div>

</div>


<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        @if(session('update'))
            <div class="alert alert-info col-lg-12">
               <strong>Penting !</strong> {{session('update')}}
            </div>
        @endif

        <div class="col-lg-12">
        	<div class="ibox ">
            	<div class="ibox-title">
                	<h5>Data Surat Terdisposisi</h5>
                        <div class="ibox-tools">                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                </div>
                    
                <div class="ibox-content">    	
                        <!-- Table data suratmasuk-->
	                    <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
			                        <th><center>Nomor Surat </center></th>
			                        <th><center>Pengirim </center></th>
			                        <th><center>Penerima </center></th>
			                        <th><center>Prihal </center></th>
                                    <th><center>Sifat Surat </center></th>
			                        <th><center>Tgl Disposisi</center></th>
			                        <th><center>Catatan</center></th>
			                        <th width="14%"><center> Aksi</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @foreach($disposisi as $dispo)
		                    <tr >
		                        <td><center>{{$dispo->nomorsurat}}</center></td>
		                        <td><center>{{$dispo->pengirim}}</center></td>
		                        <td><center>{{$dispo->namarole}}</center></td>
		                        <td><center>{{$dispo->prihal}}</center></td>
		                        <td><center>{{$dispo->sifat}}</center></td>
		                        <td><center>{{$dispo->tgldispo}}</center></td>
                                <td><center>{{$dispo->catatan}}</center></td>
                                <td><center>
                                    
		                        	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <a href="{{url ('ketua/disposisi/edit/'. $dispo->id)}}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>
                                    </form>
                                </center></td>
		                    </tr>
                            @endforeach
							</tbody>
		                    </table>
                        </div>							
                    </div>
                </div>
            </div>
            </div>
        </div>

<script type="text/javascript">

 $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
                ]

            });

        });

</script>


@endsection