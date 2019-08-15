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
    <div class="row">
        <div class="col-sm-3 m-b-xs">
            <form action="laporan/cari" method="GET">
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
    <!-- AWAL ROW -->
    <div class="row">
        <!-- AWAL DARI UKURAN KANVAS -->
        <div class="col-lg-12">
            <!-- AWAL CONTAINER TAB -->
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Surat Masuk Internal</a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-2"> Surat Masuk External</a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-3">Surat Keluar Internal</a>
                    </li>

                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-4">Surat Kelluar External</a>
                    </li>

                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-5">Surat Tugas</a>
                    </li>

                </ul>
                
                <!-- CONTENT DARI TAB  -->
                <div class="tab-content">
                <!--  PANEL TAB SURAT MASUK  -->
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">
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

                    <div role="tabpanel" id="tab-2" class="tab-pane">
                        <div class="panel-body">
                        <!-- laporan surat keluar -->
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
                                    @foreach($lapsuk_ex as $laporankeluar)
                                        <tr >
                                            <td>{{$laporankeluar->nomorsurat}}</td>
                                            <td>{{$laporankeluar->pengirim}}</td>
                                            <td>{{$laporankeluar->penerima}}</td>
                                            <td>{{$laporankeluar->prihal}}</td>
                                            <td>{{$laporankeluar->tglsurat}}</td>
                                            <td>{{$laporankeluar->tglterima}}</td>
                                    @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- PANEL TAB SURAT KELUAR -->
                    <div role="tabpanel" id="tab-3" class="tab-pane">
                        <div class="panel-body">
                        <!-- laporan surat keluar -->
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
                    
                    <!-- PANEL TAB SURAT keluar external -->
                    <div role="tabpanel" id="tab-4" class="tab-pane">
                        <div class="panel-body">
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
                                         @foreach( $lapkel_ex as $laporankeluar_ex )
                                            <tr >
                                                <td>{{$laporankeluar_ex->nomorsurat}}</td>
                                                <td>{{$laporankeluar_ex->pengirim}}</td>
                                                <td>{{$laporankeluar_ex->penerima}}</td>
                                                <td>{{$laporankeluar_ex->prihal}}</td>
                                                <td>{{$laporankeluar_ex->tglsurat}}</td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <!-- AKHIR DARI PANEL LAPORAN SURAT TUGAS -->

                    <div role="tabpanel" id="tab-5" class="tab-pane">
                        <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables" >
                                        <thead>
                                            <tr>
                                                <th>Nomor Surat</th>
                                                <th>Prihal</th>
                                                <th>Tgl Surat</th>
                                                <th>Kabupaten</th>
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laptug as $tugas)
                                        <tr >
                                            <td>{{$tugas->nomorsurat}}</td>
                                            <td>{{$tugas->prihal}}</td>
                                            <td>{{$tugas->tglsurat}}</td>
                                            <td>{{$tugas->kabupaten}}</td>
                                            <td>{{$tugas->kecamatan}}</td>
                                            <td>{{$tugas->desa}}</td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
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


