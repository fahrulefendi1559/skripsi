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

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus">Tambah Data</i></button>
            
        </div>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
		@if(session('sukses'))
		    <div class="alert alert-success col-lg-12">
            	{{session('sukses')}}
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-info col-lg-12">
                {{session('delete')}}
            </div>
        @endif

        @if(session('update'))
            <div class="alert alert-info col-lg-12">
                {{session('update')}}
            </div>
        @endif

        <div class="col-lg-12">
        	<div class="ibox ">
            	<div class="ibox-title">
                	<h5>Data Surat Tugas</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            
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
			                        <th><center>Pengirim </center></th>
			                        <th><center>Penerima </center></th>
			                        <th><center>Prihal </center></th>
			                        <th><center>Tgl Surat </center></th>
			                        <th><center>Tgl Terima </center></th>
			                        <th width="14%"><center> Aksi</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @foreach($surat_tugas as $tugas)
		                    <tr >
		                        <td><center>{{$tugas->nomorsurat}}</center></td>
		                        <td><center>{{$tugas->prihal}}</center></td>
		                        <td><center>{{$tugas->tglsurat}}</center></td>
		                        <td><center>{{$tugas->kabupaten}}</center></td>
		                        <td><center>{{$tugas->kecamatan}}</center></td>
		                        <td><center>{{$tugas->desa}}</center></td>
                                <td><center>
                                    
		                        	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <a href="{{ route('admin.viewpdftugas', ['id' => $tugas->id]) }}" class="btn btn-simple btn-info btn-xs " target="blank"><i class="fa fa-file-pdf-o"></i></a>

                                        <a href="{{url ('admin/surattugas/edit/'. $tugas->id)}}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>

                                        <a href="{{url ('admin/surattugas/delete/'. $tugas->id)}}" class="btn btn-simple btn-danger btn-xs delete" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini')" ><i class="fa fa-trash"></i></a>

                                    </form>
                                </center></td>
		                    </tr>
		                   @endforeach
							</tbody>
		                    </table>
                        </div>

                        <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                            	<div class="modal-content animated flipInY">
                                	<div class="modal-header">
                                    	<button type="button" class="close" data-dismiss="modal">
                                    		<span aria-hidden="true">&times;</span>
                                    		<span class="sr-only">Close</span>
                                    	</button>
                                        <h4 class="modal-title"></h4>
                                            <small class="font-bold">Sistem Informasi Digitalisasi Arsip Dokumen.</small>
                                    </div>
                                    <div class="modal-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors-> all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        @endif
                                    	<form role="form" method="POST" action="{{route('admin.savetugas')}}" enctype="multipart/form-data">
                                    		{{csrf_field()}}  {{method_field('POST')}}

                                            <input type="hidden" id="id" name="id"></input>

                                            <div class="form-group">
                                                <label>Periode Surat</label> 
                                                <select class="form-control " name="id_periode" autofocus required>
                                                    <option disabled selected>Pilih Periode Surat</option>
                                                    @foreach ($suratperiode as $periode)
                                                       
                                                        <option value="{{ $periode->id_periode }}" autofocus required>Periode {{ $periode->periode}} {{ $periode->tahun }}</option>
                                                        
                                                    @endforeach
                                                </select>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Periode Surat</label> 
                                                <select class="form-control " name="id_tugas" autofocus required>
                                                    <option disabled selected>Pilih Jenis Tugas</option>
                                                    @foreach ($jenis_tugas as $jenistugas)
                                                       
                                                        <option value="{{ $jenistugas->id_jenis_tugas }}" autofocus required> {{ $jenistugas->nama_tugas }}</option>
                                                        
                                                    @endforeach
                                                </select>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                    		<div class="form-group">
		                                    	<label>Nomor Surat</label> 
		                                    	<input type="text" placeholder="Nomor Surat" class="form-control" name="nomorsurat" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>


		                                    <div class="form-group">
		                                    	<label>Prihal</label> 
		                                    	<input type="text" placeholder="Prihal Surat" class="form-control" name="prihal" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>

		                                    <div class="form-group">
		                                    	<label>Tgl Surat</label> 
		                                    	<input type="text"  class="form-control datepicker1" name="tglsurat" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>
		                                    
                                            <div class="form-group">
		                                    	<label>Kabupaten</label> 
		                                    	<input type="text" placeholder="Kabupaten" class="form-control" name="kabupaten" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>

                                            <div class="form-group">
		                                    	<label>Kecamatan</label> 
		                                    	<input type="text" placeholder="Kecamatan" class="form-control" name="kecamatan" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>

                                            <div class="form-group">
		                                    	<label>Desa</label> 
		                                    	<input type="text" placeholder="Desa" class="form-control" name="desa" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>

		                                    <div class="form-group">
		                                    	<label>File</label> 
		                                    	<input type="file" name="namafile" autofocus required>
                                                <span class="help-block with-errors"></span>
		                                    </div>

		                                
                                    </div>

                                    <div class="modal-footer">
                                    	<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
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