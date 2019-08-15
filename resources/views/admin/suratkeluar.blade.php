@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Surat Keluar</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data Surat Keluar Internal</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus"> Tambah Data</i>
            </button>            
        </div>
    </div>
</div>


<!-- data tables -->

<!-- AWAL DARI WRAPPER CONTENT -->
<div class="wrapper wrapper-content animated fadeIn">
    <!-- AWAL ROW -->
    <div class="row">
        <!-- awal dari alert  -->
        @if(session('sukses'))
            <div class="alert alert-success col-lg-12">
            <strong>Sukses !</strong>    {{session('sukses')}}
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-info col-lg-12">
                <strong>Sukses !</strong>   {{session('delete')}}
            </div>
        @endif

        @if(session('update'))
            <div class="alert alert-info col-lg-12">
            <strong>Sukses !</strong>    {{session('update')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger col-lg-12">
                <strong>Penting ! </strong> {{session('error')}}
            </div>
        @endif

        <!-- akhir dari alert -->

        <!-- AWAL DARI UKURAN KANVAS -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-3 m-b-xs">
                    <form action="suratkeluar/cari" method="GET">
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
            <!-- AWAL CONTAINER TAB -->
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Surat Keluar Internal</a>
                    </li>
                </ul>
                

                <!-- CONTENT DARI TAB  -->
                <div class="tab-content">
                <!--  PANEL TAB SURAT Keluar Internal  -->
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox ">                                                
                                        <div class="ibox-content">
                                            

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th><center>Nomor Surat</center></th>
                                                        <th><center>Pengirim</center></th>
                                                        <th><center>Penerima</center></th>
                                                        <th><center>Prihal</center></th>
                                                        <th ><center>Aksi</center></th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                                @foreach($data_surat_keluar as $keluar)
                                                <tr >
                                                    <td><center>{{$keluar->nomorsurat}}</center></td>
                                                    <td><center>{{$keluar->pengirim}}</center></td>
                                                    <td><center>{{$keluar->penerima}}</center></td>
                                                    <td><center>{{$keluar->prihal}}</center></td>
                                                    <td><center>
                                                        
                                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            
                                                            <a href="{{ route('admin.keluarfilepdf', [ 'id' => $keluar->id]) }}" class="btn btn-simple btn-info btn-xs " target="blank"><i class="fa fa-file-pdf-o"></i></a>

                                                            @if($keluar->status == "1")
                                                            <a href="{{ route('admin.viewpdfsuratseluar', [ 'id' => $keluar->id]) }}" class="btn btn-simple btn-info btn-xs " target="blank"><i class="fa fa-book"></i></a>
                                                            @endif
                
                                                            <a href="{{url('admin/suratkeluar/edit/'. $keluar->id) }}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>

                                                            <a href="{{ url('admin/suratkeluar/delete/'. $keluar->id) }}" class="btn btn-simple btn-danger btn-xs " onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" ><i class="fa fa-trash"></i></a>

                                                            @if($keluar->status != "1")
                                                            <button type="button" class="edit-modal btn btn-simple btn-warning btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-out"></i>
                                                            </button>
                                                            @endif
                                                        </form>
                                                    </center></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                            </div>

                                            <!-- modal upload file -->
                                            @foreach($data_surat_keluar as $keluar)
                                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
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

                                                            @if($cek_keluar != 0)
                                                                <form role="form" method="POST" action="{{route('admin.createfilekeluar')}}" enctype="multipart/form-data">
                                                                    {{csrf_field()}}  {{method_field('POST')}}
                                                                    <input type="hidden" id="id_keluar" name="id_keluar" value="{{$keluar->id}}" ></input>
                                                                        <div class="alert alert-success ">
                                                                            <strong>Penting!</strong> File PDF yang telah di scan
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>File</label> 
                                                                                <input type="file" name="namafile" autofocus required>
                                                                                <span class="help-block with-errors"></span>
                                                                        </div>
                                                        

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                                                                </div>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- akhir dari modal upload file -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>  <!-- AKHIR CONTENT TAB -->

                            <!-- modal tambah data Internal-->
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
                                            <form role="form" method="POST" action="{{ route('admin.createsuratkeluar') }}" enctype="multipart/form-data">
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
                                                    <label>Nomor Surat</label> 
                                                        <input type="text" placeholder="Nomor Surat" class="form-control" name="nomorsurat" autofocus required>
                                                            <span class="help-block with-errors"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pengirim</label> 
                                                        <input type="text" placeholder="Pengirim Surat" class="form-control" name="pengirim" autofocus required>
                                                            <span class="help-block with-errors"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Penerima</label> 
                                                        <input type="text" placeholder="Penerima Surat" class="form-control" name="penerima" autofocus required>
                                                            <span class="help-block with-errors"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Prihal</label> 
                                                        <input type="text" placeholder="Prihal Surat" class="form-control" name="prihal" autofocus required>
                                                            <span class="help-block with-errors"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Lampiran</label> 
                                                        <input type="text" placeholder="Jumlah Lampiran Surat" class="form-control" name="lampiran" autofocus required>
                                                            <span class="help-block with-errors"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tgl Surat</label> 
                                                    <input type="text"  class="form-control datepicker1" name="tglsurat" autofocus required>
                                                            <span class="help-block with-errors"></span>
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

            </div><!-- AKHIR CONTAINER TAB -->

        </div><!-- AKHIR ROW -->
        
    </div><!-- AKHIR DARI CONTENT WRAPPER -->
    
    
</div>

<script type="text/javascript">

 //datepicker tgl surat
     $(function(){
      $(".datepicker1").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
      });
     });

     //modalscript
     function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST'); 
        $('#myModal2 form')[0].reset();
        $('.modal-title').text('Input Data Surat Keluar Internal');
     }

     function addForm1(){
        save_method = "add";
        $('input[name=_method]').val('POST'); 
        $('#myModal3 form')[0].reset();
        $('.modal-title').text('Input Data Surat Keluar External');
     }

     $ (function (){
        $ ('myModal2 form').validator().on('submit',function(e){
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('suratkeluar') }}";
                else url = "{{ url('suratkeluar'). '/' }}" + id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#myModal2 form').serialize(),
                    success : function ($data){
                        $('#modal-form').modal('hide');
                    },

                    error : function(){
                        alert('Oops! Something error!');
                    }
                });
                return false;
            }   
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
    
    $(document).ready(function(){
                $('.dataTables-example2').DataTable({
                    pageLength: 10,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                  
                    ]

                });

            });
    
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            
        });
    });

</script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#merks').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('merk')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#motors').empty();
                    $.each(data, function(index, element){
                        $('#motors').append("<tr><td>"+element.id_motor+"</td><td>"+element.id_merk+"</td>"+
                        "<td>"+element.nama_motor+"</td></tr>");
                    });
                });
            });
        });
    </script>



@endsection