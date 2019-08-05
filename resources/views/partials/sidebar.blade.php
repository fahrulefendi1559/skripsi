<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
    <!-- foto user -->
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('asset/img/profile_small.jpg')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="login.html">Change Password</a></li>
                        </ul>
                </div>
                <div class="logo-element">
                SIDAS+
                </div>
            </li>
            <!-- MENU DARI SISTEM -->
            @if(Auth::user()->roles_id == 999)
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Manajemen Surat</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.suratmasuk')}}">Surat Masuk</a></li>         
                        <li><a href="{{route('admin.suratkeluar')}}">Surat Keluar</a></li>
                        <li><a href="{{route('admin.getsurattugas')}}">Surat Tugas</a></li>
                    </ul>
            </li>


            <li>
                <a href="{{ route('admin.kelolatanggal') }}"><i class="fa fa-calendar"></i><span class="nav-label">Kelola Periode Surat</span></a>
            </li>

            <li>
                <a href="{{ route('admin.laporan') }}"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span></a>
            </li>
            <li>
                <a href="{{ route('admin.struktur') }}"><i class="fa fa-address-book"></i> <span class="nav-label">Struktur Organisasi</span></a>
            </li>
            <li>
                <a href="{{route('createuser')}}"><i class="fa fa-users"></i> <span class="nav-label">Manajemen User</span></a>
            </li>



            <!-- menu untuk operator -->
            @elseif(Auth::user()->roles_id == 888)
            <li>
                <a href="{{ route('opr.home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Manajemen Surat</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('opr.getsuratmasuk')}}">Surat Masuk</a></li>         
                        <li><a href="{{ route('opr.suratkeluar') }}">Surat Keluar</a></li>
                        <li><a href="{{route('operator.tugas')}}">Surat Tugas</a></li>
                    </ul>
            </li>

            <li>
                <a href="{{ route('opr.laporan') }}"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span></a>
            </li>

            <!-- ini menu dari Kepala KKN -->
            @elseif(Auth::user()->roles_id == 1)
            <li>
                <a href="{{ route('ketua.home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li>
                <a href="{{route('ketua.viewdisposisi')}}"><i class="fa fa-send"></i> <span class="nav-label">Disposisi</span></a>
            </li>

            <li>
                <a href="{{ route('ketua.laporan') }}"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 2)
            <li>
                <a href="{{route('sekre.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('sekre.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 3)
            <li>
                <a href="{{route('pendikpel.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('pendikpel.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 4)
            <li>
                <a href="{{route('operasional.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('operasional.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 5)
            <li>
                <a href="{{route('pengembangan.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('pengembangan.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 6)
            <li>
                <a href="{{route('teknologi.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('teknologi.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 7)
            <li>
                <a href="{{route('evaluasi.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('evaluasi.lihatsurat')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>
            @endif


        </ul>            

    </div>
</nav>