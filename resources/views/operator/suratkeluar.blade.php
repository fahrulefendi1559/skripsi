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
                <strong>Data Surat Keluar</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"
                onclick="addForm()"><i class="fa fa-plus"> Internal</i>
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal3"
                onclick="addForm1()"><i class="fa fa-plus"> External</i>
            </button>
        </div>
    </div>
</div>


<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        @if(session('sukses'))
        <div class="alert alert-success col-lg-12">
            <strong>Sukses! </strong>
            {{session('sukses')}}
        </div>
        @endif

        @if(session('delete'))
        <div class="alert alert-info col-lg-12">
            <strong>Sukses! </strong>
            {{session('delete')}}
        </div>
        @endif

        @if(session('update'))
        <div class="alert alert-info col-lg-12">
            <strong>Sukses! </strong>
            {{session('update')}}
        </div>
        @endif

        <!-- AWAL DARI UKURAN KANVAS -->
        <div class="col-lg-12">
            <!-- AWAL CONTAINER TAB -->
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Surat Keluar Internal</a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-2">Surat Keluar Eksternal</a>
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
                                            <div class="row">
                                                <div class="col-sm-5 m-b-xs">
                                                    <select class="form-control-sm form-control input-s-sm inline">
                                                        <option value="0">Option 1</option>
                                                        <option value="1">Option 2</option>
                                                        <option value="2">Option 3</option>
                                                        <option value="3">Option 4</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input placeholder="Search" type="text" class="form-control form-control-sm">
                                                            <span class="input-group-append"> 
                                                            <button type="button" class="btn btn-sm btn-primary">Go!
                                                            </button> </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                    <tr>
                                                        <th><center>Nomor Surat</center></th>
                                                        <th><center>Pengirim</center></th>
                                                        <th><center>Penerima</center></th>
                                                        <th><center>Prihal</center></th>
                                                        <th><center>Tgl Surat</center></th>
                                                        <th width="20%"><center>Aksi</center></th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                                @foreach($data_surat_keluar as $keluar)
                                                <tr >
                                                    <td><center>{{$keluar->nomorsurat}}</center></td>
                                                    <td><center>{{$keluar->pengirim}}</center></td>
                                                    <td><center>{{$keluar->penerima}}</center></td>
                                                    <td><center>{{$keluar->prihal}}</center></td>
                                                    <td><center>{{$keluar->tglsurat}}</center></td>
                                                    <td><center>
                                                        
                                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            
                                                            <a href="{{ route('opr.keluarfilepdf', [ 'id' => $keluar->id]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-file-pdf-o"></i></a> |

                                                            @if($keluar->status == "1")
                                                            <a href="{{ route('opr.viewpdf', [ 'id' => $keluar->id]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-book"></i></a>
                                                            @endif
                
                                                            <a href="{{url('operator/suratkeluar/edit/'. $keluar->id) }}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>

                                                            <a href="{{ url('operator/suratkeluar/delete/'. $keluar->id) }}" class="btn btn-simple btn-danger btn-xs " ><i class="fa fa-trash"></i></a>

                                                            @if($keluar->status != "1")
                                                            | <button type="button" class="edit-modal btn btn-simple btn-warning btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-out"></i>
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
                                                                <form role="form" method="POST" action="{{route('opr.createfilekeluar')}}" enctype="multipart/form-data">
                                                                    {{csrf_field()}}  {{method_field('POST')}}
                                                                    <input type="" id="id_keluar" name="id_keluar" value="{{$keluar->id}}" ></input>
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

                    <!-- PANEL TAB SURAT KELUAR External -->
                    <div role="tabpanel" id="tab-2" class="tab-pane">
                        <div class="panel-body">
                        <!-- laporan surat keluar External -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox ">                                                
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-sm-5 m-b-xs">
                                                    <select class="form-control-sm form-control input-s-sm inline">
                                                        <option value="0">Option 1</option>
                                                        <option value="1">Option 2</option>
                                                        <option value="2">Option 3</option>
                                                        <option value="3">Option 4</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input placeholder="Search" type="text" class="form-control form-control-sm">
                                                            <span class="input-group-append"> 
                                                            <button type="button" class="btn btn-sm btn-primary">Go!
                                                            </button> </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                    <tr>
                                                        <th><center>Nomor Surat</center></th>
                                                        <th><center>Pengirim</center></th>
                                                        <th><center>Penerima</center></th>
                                                        <th><center>Prihal</center></th>
                                                        <th><center>Tgl Surat</center></th>
                                                        <th width="20%"><center>Aksi</center></th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                                @foreach($data_surat_keluar_ex as $keluar_ex)
                                                    <tr >
                                                        <td><center>{{$keluar_ex->nomorsurat}}</center></td>
                                                        <td><center>{{$keluar_ex->pengirim}}</center></td>
                                                        <td><center>{{$keluar_ex->penerima}}</center></td>
                                                        <td><center>{{$keluar_ex->prihal}}</center></td>
                                                        <td><center>{{$keluar_ex->tglsurat}}</center></td>
                                                        <td><center>
                                                        
                                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            
                                                            <a href="{{ route('opr.keluarfilepdf', [ 'id' => $keluar_ex->id]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-file-pdf-o"></i></a> |

                                                            @if($keluar_ex->status == "1")
                                                            <a href="{{ route('opr.viewpdf_ex', [ 'id' => $keluar_ex->id]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-book"></i></a>
                                                            @endif
                
                                                            <a href="{{url('operator/suratkeluar_ex/edit/'. $keluar_ex->id) }}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>

                                                            <a href="{{ url('operator/suratkeluar_ex/delete/'. $keluar_ex->id) }}" class="btn btn-simple btn-danger btn-xs " ><i class="fa fa-trash"></i></a>

                                                            @if($keluar_ex ->status != "1")
                                                            | <button type="button" class="edit-modal btn btn-simple btn-warning btn-xs" data-toggle="modal" data-target="#myModal4"><i class="fa fa-sign-out"></i>
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
                                            @foreach($data_surat_keluar_ex as $keluar_ex)
                                            <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                <form role="form" method="POST" action="{{route('opr.createfilekeluar_ex')}}" enctype="multipart/form-data">
                                                                    {{csrf_field()}}  {{method_field('POST')}}
                                                                    <input type="" id="id_keluar_ex" name="id_keluar_ex" value="{{$keluar_ex->id}}" ></input>
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
                                            <form role="form" method="POST" action="{{ route('opr.createsuratkeluar') }}" enctype="multipart/form-data">
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

                            <!-- modal tambah data External-->
                            <div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <form role="form" method="POST" action="{{ route('opr.createsuratkeluar_ex') }}" enctype="multipart/form-data">
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
        

    </div>
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
        $('.modal-title').text('Input Data Surat Keluar');
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


function deleteData(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Are You Sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: "#3085d6",
        canfirmButtonText: 'Yes Delete It! '

    }).then(function(){
        $.ajax({
            url: "{{url('suratkeluar/delete')}}" + '/' + id,
            type: "POST",
            data: {'_method': 'DELETE', '_token':csrf_token},
            success: function(data){
                table.ajax.reload();
                swal({
                    title: 'Success!',
                    text:'Data Has Been Deleted!',
                    type: 'success',
                    timer: '-1500'
                })
            },
            error : function(){
                swal({
                    title: 'Ooops...',
                    text: 'Something went wrong!',
                    type: 'error',
                    timer: '-1500'
                })
            }
        });
    });
}

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

<script type="text/javascript">
</script>
@endsection