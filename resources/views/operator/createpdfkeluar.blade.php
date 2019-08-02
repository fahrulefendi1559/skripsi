<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surat Keluar</title>

    <style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 0;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    div {
        word-wrap: break-word;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 5px 0 5px;
    }

    p.footer {
        text-align: right;
        font-size: 12px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
        text-align: center;
    }

    #container {
        margin: 10px;
        
        box-shadow: 0 0 8px #D0D0D0;
    }
    table {
        /*border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;*/
        margin-top: 5px;
        margin-right: 5px;
        /* margin-left: 5px; */
        font-size: 12px;
        background: #fff;
    }

    th, td {
        /* text-align: left; */
        padding: -0.11rem 0;
        background: #fff;
        font-size: 13px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    #right {
        border-right: none !important;
    }
    #left {
        border-left: none !important;
    }
    .isi {
        height: 300px!important;
    }
    .disp {
        text-align: center;
        padding: 1.5rem 0;
        margin-bottom: .5rem;
    }
    .logodisp {
        float: left;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 0 0 1rem;
    }

    #ttd {
        width: auto;
        margin: 10px;
        margin-left: -20px;
    }
    #tr {
        width: auto;
        padding: 7px;
        margin-left: 5px;
    }

    #tr2 {
        width: auto;
        padding-left: 30px;
        margin-left: 12px;
    }
    #tr3 {
        width: auto;
        padding-left: 10px;
        margin-left: 12px;
    }


    .tgh {
        text-align: center;
    }

    .text {
        text-align: left;
        margin-top: 0px;
        margin-left: 40px;
        margin-bottom: 0px;
        margin-right: 15px;
    }
    .tanggal {
        text-align: right;
        margin-top: 5px;
        margin-left: 40px;
        margin-bottom: 0px;
        margin-right: 15px;
    }

    .tanggal1 {
        text-align: left;
        margin-top: 5px;
        margin-left: 350px;
        margin-bottom: 0px;
        margin-right: 15px;
    }

    #nama {
        font-size: 1.7rem;
        margin-bottom: -1.5rem;
        margin-top: -0.6rem;

    }
    #nama2 {
        font-size: 1.3rem;
        margin-bottom: 0;
        margin-top: 0;

    }
    #mentri {
        font-size: 1.3rem;
        margin-bottom: -0.8rem;
        margin-top: 0;

    }
    #alamat {
        margin: -1rem;
        font-size: 13px;
    }
    .up {
        text-transform: uppercase;
        margin: 0;
        line-height: 2.2rem;
        font-size: 1.3rem;
    }
    .up2 {
        text-transform: uppercase;
        margin-top: 0;
        margin-bottom: 0;
        line-height: 2.2rem;
        font-size: 1.3rem;
    }

    #lbr {
        font-size: 15px;
        font-weight: bold;
    }
    #kpd {
        padding-top: 30px;
        margin-bottom: 0;
    }
    #kpd2 {
        margin-top: -0.3rem;
    }

    #lokasi {
        margin-top: -0.1rem;
    }

    #isi {
        text-align: justify;
    }

    #nip {
        margin-top: -0.9rem;
    }
    .separator {
        border-bottom: 2px solid #616161;
        margin: -0.5rem 0 1.7rem;
    }

    #nilai{
        margin-bottom: 0rem;
    }
    
    .col {
        float: left;
        width: 400px;
        padding: 5px;
        height: 100px; /* Should be removed. Only for demonstration */
    }

    .col-lg-2{
        float: left;
        width: 300px;
        padding: 5px;
        height: 160px; /* Should be removed. Only for demonstration */
    }

    .text-ceter{
        text-align: center;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {
        .col {
        width: 100%;
        }
    }
    </style>
    
</head>
<body>
<div id="body">
    <div id="container">
        <div class="disp">
            <img class="logodisp" alt="image" height="77" width="77" src="{{ asset('asset/img/Logo_UnivLampung.png') }}"/>
            <h6 class="up2" id="mentri">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</h6>
            <h6 class="up" id="nama2">BADAN PELAKSANA KULIAH KERJA NYATA (BP-KKN)</h6>
            <h5 class="up" id="nama">UNIVERSITAS LAMPUNG</h5>
            <!-- <h5 class="up" id="nama">BADAN PELAKSANA KULIAH KERJA NYATA (BP-KKN)</h5> -->
            <br/>
            <span id="alamat">Jl. Prof. Dr. Sumantri Brojonegoro No.1 Genung Meneng, Bandar Lampung 35145</span><br/>
            <span id="alamat">Telepon (0721) 702767 <strong>kkn.unila.ac.id</strong> e-mail: kkn@kpa.unila.ac.id</span>
        </div>
        <div class="separator"> 
        </div>

        <div id="body">
            <p class="tanggal">{{$tglsurat}}</p>
            <div>
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nomor</td>
                                <td id="tr2">:</td>
                                <td id="tr3">{{$nomorsurat}}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td id="tr2">:</td>
                                <td  id="tr3">{{$lampiran}}</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td id="tr2">:</td>
                                <td  id="tr3"><strong>{{$prihal}}</strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 id="kpd">Kepada Yth.</h4>
                    <h4 id="kpd2">{{$penerima}}</h4>
                    <p>di</p>
                    <ul>
                        <h4 id="lokasi">Bandar Lampung</h4>
                    </ul>
                    <p></p>
                    <div>
                        <div>
                            <p id="isi">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. If you want to do more with Bootstrap components, see our complete Bootstrap 4 JavaScript/jQuery reference - all with "Try it Yourself" examples:</p>
                            <ul>
                                <li>adasdasdsadasdasdasdasd</li>
                                <li>adasdasdsadasdasdasdasd</li>
                                <li>adasdasdsadasdasdasdasd</li>
                                <li>adasdasdsadasdasdasdasd</li>
                            </ul>

                            <p id="isi">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                            <p id="isi">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                            <p id="isi">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        </div>
                    </div>
                    <br><br>
                    <p class="tanggal1">Ketua BP-KKN</p>
                    <br><br><br>
                    <p class="tanggal1">{{$ketua}}</p>
                    <p class="tanggal1">{{$nip}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>