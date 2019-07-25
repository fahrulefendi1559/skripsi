@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Struktur Organisasi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Daftar Struktur Organisasi</strong>
                </li>
            </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeIn">
    <!-- AWAL ROW -->
    <div class="row">
        <!-- awal dari alert  -->

        @if(session('update'))
            <div class="alert alert-info col-lg-12">
            <strong>Sukses !</strong>    {{session('update')}}
            </div>
        @endif
        <!-- akhir dari alert -->

        <!-- AWAL DARI UKURAN KANVAS -->
        <div class="col-lg-12">
            <!-- AWAL CONTAINER TAB -->
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Daftar Struktur Organisasi</a>
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
                                                <table class="table table-striped" >
                                                    <thead>
                                                    <tr>
                                                        <th><center>Nama</center></th>
                                                        <th><center>NIP</center></th>
                                                        <th><center>Jabatan</center></th>
                                                        <th ><center>Aksi</center></th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                                @foreach($struktur as $struk)
                                                <tr >
                                                    <td><center>{{ $struk->nama}}</center></td>
                                                    <td><center>{{ $struk->nip}}</center></td>
                                                    <td><center>{{ $struk->nama_struktur}}</center></td>
                                                    <td><center>
                                                        
                                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <a href="{{url ('admin/strukturorganisasi/edit/'. $struk->id_detail_struktur)}}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>
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
                    </div>
                </div>  <!-- AKHIR CONTENT TAB -->

            </div><!-- AKHIR CONTAINER TAB -->

        </div><!-- AKHIR ROW -->
        
    </div><!-- AKHIR DARI CONTENT WRAPPER -->
    
    
</div>
@endsection