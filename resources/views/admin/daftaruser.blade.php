@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data User</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
                <i class="fa fa-plus"> Tambah Users</i>    
            </button>
            
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
                    <div class="alert alert-success col-lg-12">
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
                        <h5>Data Users</h5>
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

                        
                        <!-- Table users -->
	                    <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
		                    <thead>
		                    <tr>
		                        <th>Nama User</th>
		                        <th>Username</th>
                                <th>Role User</th>
		                        <th>Email</th>
		                        <th width="14%" class="text-center">Aksi</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($data_user as $user)
		                    <tr >
                               
		                        <td>{{$user->name}}</td>
		                        <td>{{$user->username}}</td>
                                <td>{{$user->namarole}}</td>
		                        <td>{{$user->email}}</td>
                                <td>
                                    <center>
                                    
                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <a href=" {{url ('admin/user/edit/'. $user->id)}}"><span class="btn btn-simple btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></span></a>
                                    
                                            <a href="{{url ('admin/user/delete/'. $user->id)}}"><span class="btn btn-simple btn-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini')" ><i class="glyphicon glyphicon-trash"></i></span></a>
                                            <br>
                                        </form>
                                    </center>
                                </td>
                               
		                    </tr>
		                   @endforeach
							</tbody>
		                    </table>
                        </div>
                        

                        <div class="modal inmodal " id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog">
                            	<div class="modal-content animated flipInY">
                                	<div class="modal-header">
                                    	<button type="button" class="close" data-dismiss="modal">
                                    		<span aria-hidden="true">&times;</span>
                                    		<span class="sr-only">Close</span>
                                    	</button>
                                        <h4 class="modal-title">Create Users</h4>
                                            <small class="font-bold">Sistem Informasi Digitalisasi Arsip Dokumen.</small>
                                    </div>
                                    <div class="modal-body">
                                    	<form role="form" method="POST" action="{{route('createusers')}}" >
                                    		{{csrf_field()}}
                                    		<div class="form-group">
		                                    	<label>Username</label> 
		                                    	<input type="text" placeholder="Enter Username" class="form-control" name="username">
		                                    </div>
		                                    <div class="form-group">
		                                    	<label>Name</label> 
		                                    	<input type="text" placeholder="Enter Your Name" class="form-control" name="name">
		                                    </div>


		                                    <div class="form-group">
		                                    	<label>Role Users</label>
			                                    	<select class="form-control " name="roles_id">
			                                    		@foreach ($role as $roles)
    			                                    		@if($roles->id != "999")
    				                                        <option value="{{ $roles->id }}">{{ $roles->namarole}}</option>
    				                                        @endif
				                                        @endforeach
			                                    	</select>
			                                </div>



		                                    <div class="form-group">
		                                    	<label>Email</label> 
		                                    	<input type="email" placeholder="Enter email" class="form-control" name="email">
		                                    </div>
		                                    <div class="form-group">
		                                    	<label>Password</label> 
		                                    	<input type="password" placeholder="Password" class="form-control" name="password">
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

<!-- sweet alert untuk aksi -->
    <script>

    $(document).ready(function () {

        $('.demo1').click(function(){
            swal({
                title: "Welcome in Alerts",
                text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
            });
        });

        $('.demo2').click(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success"
            });
        });

       $('.demo3').click(function () {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
});


    });
</script>

<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
                ]

            });

        });

    </script>

@endsection