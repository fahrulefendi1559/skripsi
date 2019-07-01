<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css"> -->
	<title>Surat Keluar PDF</title>

	<link rel="shortcut icon" href="{{ asset('asset/img/Logo_UnivLampung.png') }}" />
</head>
<body>
	<div>
        <div class="disp">
            <h3> </h3>
			<h3><strong></strong></h3>
			<div class="container">
	            <div class="disp">
	               <img class="logo" src="{{ asset('asset/img/Logo_UnivLampung.png') }}"/>

	               <h6 class="up">KEMENTRIAN RISET, TEKNOLOGI DAN PERGURUAN TINGGI</h6>

	               <h6 class="up">BADAN PELAKSANA KULIAH KERJA NYATA (BP-KKN)</h6>

	               <h6 class="up1" id="nama">UNIVERSITAS LAMPUNG</h6><br/>

	               <span id="alamat">Sekretariat : JL. Prof. Dr. Soemantri Brojonegoro No.1 Gedung Meneng - Bandar Lampung, 35145 </span><br/>
                   <span id="alamat2">Fax. (0721) 702767 www.unila.ac.id Email : bpkknunila@gmail.com </span>
	            </div>

	            <div class="separator">
	            </div>
                <br>
	            <h1>SURAT TUGAS</h1>
	        </div>
        </div>
    <div class="jarak2"></div>
</div>
	









	<style type="text/css">
    table {
        background: #fff;
        padding: 5px;
    }
    tr, td {
        bordered: table-cell;
    }
    tr,td {
        vertical-align: top!important;
    }
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
    .logo {
         float: left;
         position: relative;
         width: 110px;
         height: 110px;
         margin: 0 0 0 1rem;
     }
    #lead {
        width: auto;
        position: relative;
        margin: 25px 0 0 75%;
    }
    .lead {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: -10px;
    }
    .tgh {
        text-align: center;
    }
    #nama {
        font-size: 2rem;
        margin-bottom: -1.5rem;
    }
    #alamat {
        font-size: 12px;
    }
    #alamat2 {
        font-size: 12px;
    }

    .up {
        text-transform: uppercase;
        margin: 0;
        line-height: 2.1rem;
        font-size: 1.2rem;
        margin-bottom: -0.5rem;
    }
    .up1 {
        text-transform: uppercase;
        margin: 0;
        line-height: 2.6rem;
        font-size: 1.2rem;
        margin-bottom: -0.5rem;
    }

    .status {
        margin: 0;
        font-size: 1.3rem;
        margin-bottom: .5rem;
    }
    #lbr {
        font-size: 20px;
        font-weight: bold;
    }
    .separator {
        border-bottom: 2px solid #616161;
        margin: -1.3rem 0 1.5rem;
    }
    @media print{
        body {
            font-size: 12px;
            color: #212121;
        }
        table {
            width: 100%;
            font-size: 12px;
            color: #212121;
            bordered: table-cell;
        }
        tr, td {
            bordered: table-cell;
            
            padding: 8px!important;

        }
        tr,td {
            vertical-align: top!important;
        }
        #lbr {
            font-size: 20px;
        }
        .isi {
            height: 200px!important;
        }
        .tgh {
            text-align: center;
        }
        .disp {
            text-align: center;
            margin: -.5rem 0;
        }
        .logo {
            float: left;
            position: relative;
            width: 80px;
            height: 80px;
            margin: .5rem 0 0 .5rem;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 15px 0 0 75%;
        }
        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }
        #nama {
            font-size: 20px!important;
            font-weight: bold;
            text-transform: uppercase;
            margin: -10px 0 -20px 0;
        }
        .up {
            font-size: 17px!important;
            font-weight: normal;
        }
        .status {
            font-size: 17px!important;
            font-weight: normal;
            margin-bottom: -.1rem;
        }
        #alamat {
            margin-top: -15px;
            font-size: 13px;
        }
        #lbr {
            font-size: 17px;
            font-weight: bold;
        }
        .separator {
            border-bottom: 2px solid #616161;
            margin: -1rem 0 1rem;
        }

    }
</style>

</body>

</html>