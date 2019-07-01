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
                    <strong>Daftar Kepala Divisi</strong>
                </li>
            </ol>
    </div>

</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Struktur Organisasi</h5>
                        <span class="label label-primary">BP-KKN Universitas Lampung</span>
                        <div class="ibox-tools">
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                </div>

                <div class="ibox-content inspinia-timeline">
                <!-- menampilkan data struktur ketua kkn -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                            @foreach($dataketua as $struktur)  
                                <i class="fa fa-user-circle"></i>{{$struktur->nama }}<br/>
                                    <small class="text-navy">{{$struktur->nip}}</small>
                             @endforeach
                            </div>
                           

                            <div class="col-7 content no-top-border">
                            @foreach($dataketua as $struktur)  
                                <p class="m-b-xs"><strong>{{$struktur->nama_struktur}}</strong></p>
                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- menampilkan data struktur sekretaris kkn -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($datasekretaris as $sekretaris)  
                                <i class="fa fa-user"></i>{{$sekretaris->nama}}
                                        <br/>
                                    <small class="text-navy">{{$sekretaris->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($datasekretaris as $sekretaris)
                                <p class="m-b-xs"><strong>{{$sekretaris->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- menampilkan data kesekretariatan -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($datakrt as $krt)  
                                <i class="fa fa-user"></i>{{$krt->nama}}
                                        <br/>
                                    <small class="text-navy">{{$krt->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($datakrt as $krt)
                                <p class="m-b-xs"><strong>{{$krt->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- menampilkan data pendidikan dan pelatihan -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($datapenpel as $penpel)  
                                <i class="fa fa-user"></i>{{$penpel->nama}}
                                        <br/>
                                    <small class="text-navy">{{$penpel->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($datapenpel as $penpel)  
                                <p class="m-b-xs"><strong>{{$penpel->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- data menampilkan bidang operasional -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($dataop as $op)  
                                <i class="fa fa-user"></i>{{$op->nama}}
                                        <br/>
                                    <small class="text-navy">{{$op->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($dataop as $op)   
                                <p class="m-b-xs"><strong>{{$op->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- data menampilkan bidang pengembangan dan kerjasama -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($datapengker as $pengker)  
                                <i class="fa fa-user"></i>{{$pengker->nama}}
                                        <br/>
                                    <small class="text-navy">{{$pengker->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($datapengker as $pengker)   
                                <p class="m-b-xs"><strong>{{$pengker->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- data menampilkan bidang operasional -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($datati as $ti)  
                                <i class="fa fa-user"></i>{{$ti->nama}}
                                        <br/>
                                    <small class="text-navy">{{$ti->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($datati as $ti)    
                                <p class="m-b-xs"><strong>{{$ti->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- data menampilkan bidang evaluasi dan pengendalian -->
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                @foreach($dataeval as $eval)  
                                <i class="fa fa-user"></i>{{$eval->nama}}
                                        <br/>
                                    <small class="text-navy">{{$eval->nip}}</small>
                                @endforeach
                            </div>
                            <div class="col-7 content">
                            @foreach($dataeval as $eval)  
                                <p class="m-b-xs"><strong>{{$eval->nama_struktur}}</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="{{ route('admin.editstruktur', ['id_detail_struktur' => $struktur->id_detail_struktur]) }}" class="btn btn-simple btn-info btn-xs " ><i class="fa fa-edit"></i> Edit Data</a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>z


@endsection