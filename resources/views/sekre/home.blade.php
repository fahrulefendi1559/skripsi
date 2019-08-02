@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"></span>
                <h5>Surat Masuk</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> Arsip</h1>

                <small>Total Surat Masuk</small>
            </div>
        </div>
    </div>

    

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