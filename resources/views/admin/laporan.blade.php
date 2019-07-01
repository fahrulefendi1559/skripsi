@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Laporan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
               
                <li class="breadcrumb-item active">
                    <strong>Laporan</strong>
                </li>
            </ol>
    </div>
</div>

<!-- AWAL DARI WRAPPER CONTENT -->
<div class="wrapper wrapper-content animated fadeIn">
    <!-- AWAL ROW -->
    <div class="row">
        <!-- AWAL DARI UKURAN KANVAS -->
        <div class="col-lg-12">
            <!-- AWAL CONTAINER TAB -->
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Surat Masuk</a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-2">Surat Keluar</a>
                    </li>

                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-3">Surat Kelluar</a>
                    </li>

                </ul>
                
                <!-- CONTENT DARI TAB  -->
                <div class="tab-content">
                <!--  PANEL TAB SURAT MASUK  -->
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="col-md-2 pull-left">
                                <a href="{{ url('admin/laporan/suratmasuk/') }}" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-download"></i> Cetak PDF</a></b>
                            </div>
                            <br> <br>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables" >
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Pengirim</th>
                                            <th>Penerima</th>
                                            <th>Prihal</th>
                                            <th>Tgl Surat</th>
                                            <th>Tgl Terima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($laporan as $datalaporan)
                                        <tr >
                                            <td>{{$datalaporan->nomorsurat}}</td>
                                            <td>{{$datalaporan->pengirim}}</td>
                                            <td>{{$datalaporan->penerima}}</td>
                                            <td>{{$datalaporan->prihal}}</td>
                                            <td>{{$datalaporan->tglsurat}}</td>
                                            <td>{{$datalaporan->tglterima}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- PANEL TAB SURAT KELUAR -->
                    <div role="tabpanel" id="tab-2" class="tab-pane">
                        <div class="panel-body">
                        <!-- laporan surat keluar -->
                            <div class="col-md-2 pull-left">
                                <a href="{{ url('admin/laporan/suratkeluar/') }}" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-download"></i> Cetak PDF</a></b>
                            </div>
                            <br> <br>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables" >
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Pengirim</th>
                                            <th>Penerima</th>
                                            <th>Prihal</th>
                                            <th>Tgl Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lapkel as $laporankeluar)
                                        <tr >
                                            <td>{{$laporankeluar->nomorsurat}}</td>
                                            <td>{{$laporankeluar->pengirim}}</td>
                                            <td>{{$laporankeluar->penerima}}</td>
                                            <td>{{$laporankeluar->prihal}}</td>
                                            <td>{{$laporankeluar->tglsurat}}</td>
                                    @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- PANEL TAB SURAT TUGAS -->
                    <div role="tabpanel" id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <div class="col-md-2 pull-left">
                                <a href="{{ url('admin/laporan/suratkeluar/') }}" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-download"></i> Cetak PDF</a></b>
                            </div>
                            <br> <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables" >
                                        <thead>
                                            <tr>
                                                <th>Nomor Surat</th>
                                                <th>Pengirim</th>
                                                <th>Penerima</th>
                                                <th>Prihal</th>
                                                <th>Tgl Surat</th>
                                                <th>Tgl Terima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            <tr >
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                         
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <!-- AKHIR DARI PANEL LAPORAN SURAT TUGAS -->

                </div>
                <!-- AKHIR CONTENT TAB -->

            </div>
            <!-- AKHIR CONTAINER TAB -->

        </div>
        <!-- AKHIR ROW -->

    </div>
    <!-- AKHIR DARI CONTENT WRAPPER -->
    
</div>

@endsection


