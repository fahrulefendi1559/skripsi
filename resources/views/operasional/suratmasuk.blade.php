@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Surat Masuk</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data Surat Masuk</strong>
                </li>
            </ol>
    </div>
</div>


<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        	<div class="ibox ">
            	<div class="ibox-title">
                	<h5>Data Surat Masuk</h5>
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
                        <!-- Table data suratmasuk-->
	                    <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
			                        <th><center>Nomor Surat </center></th>
			                        <th><center>Pengirim </center></th>
			                        <th><center>Prihal </center></th>
			                        <th><center>Tgl Surat </center></th>
			                        <th><center>Catatan </center></th>
			                        <th width="14%"><center> Aksi</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
                            @foreach($suratmasuk as $masuk)
		                    <tr >
		                        <td><center>{{$masuk->nomorsurat}}</center></td>
		                        <td><center>{{$masuk->pengirim}}</center></td>
		                        <td><center>{{$masuk->prihal}}</center></td>
		                        <td><center>{{$masuk->tglsurat}}</center></td>
		                        <td><center>{{$masuk->catatan}}</center></td>
                                <td><center>
                                    
		                        	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <a href="{{url ('operasional/suratmasuk/viewpdf/'. $masuk->id_suratmasuk)}}" class="btn btn-simple btn-primary btn-xs " target="blank"><i class="fa fa-eye"></i></a>

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