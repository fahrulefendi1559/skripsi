@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Surat Tugas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data Surat Tugas</strong>
                </li>
            </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-3 m-b-xs">
                    <form action="surattugas/cari" method="GET">
                        <!-- get data periode surat -->
                        <select class="form-control-sm form-control input-s-sm inline" name="cari">
                            <option disabled selected>Pilih Periode Surat</option>
                                @foreach ($suratperiode as $periode)      
                                    <option value="{{ $periode->id_periode }}" autofocus required>Periode {{ $periode->periode}} {{ $periode->tahun }}</option>   
                                @endforeach
                        </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Go!
                </form>
            </div>
        	<div class="ibox ">
            	<div class="ibox-title">
                	<h5>Data Surat Tugas</h5>
                        <div class="ibox-tools">                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                </div>
                    
                <div class="ibox-content">    	
                        <!-- Table data tugas-->
	                    <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
			                        <th><center>Nomor Surat </center></th>
			                        <th><center>Prihal </center></th>
			                        <th><center>Tgl Surat </center></th>
                                    <th><center>Jenis Tugas</center></th>
			                        <th><center>Kabupaten </center></th>
			                        <th><center>Kecamatan </center></th>
			                        <th><center>Desa </center></th>
			                        <th width="14%"><center> Aksi</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @foreach($tugas1 as $tugas)
		                    <tr >
		                        <td><center>{{$tugas->nomorsurat}}</center></td>
		                        <td><center>{{$tugas->prihal}}</center></td>
		                        <td><center>{{$tugas->tglsurat}}</center></td>
                                <td><center>{{$tugas->nama_tugas}}</center></td>
		                        <td><center>{{$tugas->kabupaten}}</center></td>
		                        <td><center>{{$tugas->kecamatan}}</center></td>
		                        <td><center>{{$tugas->desa}}</center></td>
                                <td><center>
                                    
		                        	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <a href="{{ route('dpl.viewpdfdpl', ['id' => $tugas->id]) }}" class="btn btn-simple btn-info btn-xs " target="blank"><i class="fa fa-file-pdf-o"></i></a>

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
    function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST'); 
        $('#myModal2 form')[0].reset();
        $('.modal-title').text('Input Data Surat Tugas');
    }

    //datepicker tgl surat
    $(function(){
        $(".datepicker1").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

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