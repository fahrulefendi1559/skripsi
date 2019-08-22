@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Disposisi Surat Masuk External</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Disposisi</strong>
                </li>
            </ol>
    </div>
</div>

<br>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-lg-offset-2">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Disposisi Surat</h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>

                <div class="ibox-content">
                    <form method="post" action="{{route('ketua.dispoex')}}">
                        {{csrf_field()}} 

                        <input type="hidden" id="id_suratmasuk" name="id_suratmasuk" value="{{$masuk->id}}" ></input>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sifat Surat</label>
                                <div class="col-sm-10">
                                    <select class="form-control " name="id_sifat" autofocus required>
                                        <option disabled selected>Pilih Jenis Surat</option>
                                        @foreach ($sifatsurat as $sifat)                  
                                            <option value="{{ $sifat->id_sifat }}" autofocus required>Surat {{ $sifat->sifat}}</option>             
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Disposisi Ke</label>
                                <div class="col-sm-10">
                                    <select class="form-control " name="id_role" autofocus required>
                                        <option disabled selected>Pilih Bidang</option>
                                        @foreach ($roles as $role)
                                            @if($role->id != "999" && $role->id != "888" && $role->id != "1")              
                                                <option value="{{ $role->id }}" autofocus required>Bidang {{ $role->namarole}}</option>
                                            @endif          
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="email" autofocus required>
                                        <span class="help-block with-errors"></span>
                                </div>
                        </div> -->

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Tanggal Disposisi</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control datepicker1" name="tgldispo" autofocus required>
                                    <span class="help-block with-errors"></span>
                             </div>
                        </div>

                         <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control"  name="catatan"  autofocus required>
                                    <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="submit">Disposisi</button>
                        </div>
                                
                    </form>
                </div>

                </div>
            </div>
        </div>
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
 </script>

@endsection