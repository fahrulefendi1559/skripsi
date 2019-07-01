@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">{{ $Tahun }}</span>
                <h5>Surat Masuk</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$countsurat}} Arsip</h1>

                <small>Total Surat Masuk</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">{{$Tahun}}</span>
                <h5>Surat Keluar</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$countkeluar}} Arsip</h1>

                <small>Total Surat Keluar</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">{{$Tahun}}</span>
                <h5>Surat Tugas</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$countkeluar}} Arsip</h1>

                <small>Total Surat Tugas</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">{{ $Periode }} {{$Tahun}}</span>
                <h5>Disposisi Aktif</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$disposisi}}</h1>
                <small>Anda Harus Mendisposisikan Surat</small>
            </div>
        </div>
    </div>
</div>

<!-- ini bagian surat yang harus di disposisikan -->
@if($disposisi != 0)
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="alert alert-info col-lg-12">
            <strong>Penting!</strong> Anda Memiliki Surat yang Harus Didisposisikan
        </div>

        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Disposisi Surat Masuk</h5>
                    <div class="ibox-tools">

                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <!-- Table users -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Nomor Surat </center>
                                    </th>
                                    <th>
                                        <center>Pengirim </center>
                                    </th>
                                    <th>
                                        <center>Penerima </center>
                                    </th>
                                    <th>
                                        <center>Prihal </center>
                                    </th>
                                    <th>
                                        <center>Tgl Surat </center>
                                    </th>
                                    <th>
                                        <center>Tgl Terima </center>
                                    </th>
                                    <th width="10%">
                                        <center> Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datasuratmasuk as $masuk)
                                <tr>
                                    <td>
                                        <center>{{ $masuk->nomorsurat }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $masuk->pengirim }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $masuk->penerima }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $masuk->prihal }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $masuk->tglsurat }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $masuk->tglterima }}</center>
                                    </td>
                                    <td>
                                        <center>

                                            <a href="{{ url('ketua/suratmasuk/disposisi/'. $masuk->id) }}"
                                                class="btn btn-simple btn-info btn-xs "><i class="fa fa-send"> Disposisi</i></a>
                                        </center>
                                    </td>
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
@endif




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