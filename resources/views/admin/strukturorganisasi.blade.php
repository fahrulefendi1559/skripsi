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
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">

                            <a href="" class="btn btn-simple btn-sucses btn-xs " >
                                <i class="fa fa-user-circle"></i>Sri Waluyo</a><br/>
                                    <small class="text-navy">19752532456225562</small>
                            </div>
                           

                            <div class="col-7 content no-top-border">
                                <p class="m-b-xs"><strong>Ketua BP-KKN</strong></p>
                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products.</p>
                            </div>
                        </div>
                    </div>
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-file-text"></i>
                                        7:00 am
                                        <br/>
                                        <small class="text-navy">3 hour ago</small>
                                    </div>
                                    <div class="col-7 content">
                                        <p class="m-b-xs"><strong>Send documents to Mike</strong></p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-coffee"></i>
                                        8:00 am
                                        <br/>
                                    </div>
                                    <div class="col-7 content">
                                        <p class="m-b-xs"><strong>Coffee Break</strong></p>
                                        <p>
                                            Go to shop and find some products.
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-phone"></i>
                                        11:00 am
                                        <br/>
                                        <small class="text-navy">21 hour ago</small>
                                    </div>
                                    <div class="col-7 content">
                                        <p class="m-b-xs"><strong>Phone with Jeronimo</strong></p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>z


@endsection