<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
    <!-- foto user -->
            <li class="nav-header">
                <div class="dropdown profile-element">

                    <img alt="image" class="rounded-circle" height="50" width="50" src="{{ asset('asset/img/Logo_UnivLampung.png')}}"/>
                        <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="login.html">Change Password</a></li>
                        </ul> -->

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                        </span> <span class="text-muted text-xs block">Option <b class="caret"></b></span> </span> </a>

                        @if(Auth::user()->roles_id == 999 || Auth::user()->roles_id == 888 || Auth::user()->roles_id == 1 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 5 || Auth::user()->roles_id == 6 || Auth::user()->roles_id == 7 || Auth::user()->roles_id == 8 || Auth::user()->roles_id == 9)
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a data-toggle="modal" data-target="#gantiPassword">Change Password</a></li>
                        </ul>
                        @endif


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
                        <li>
                        <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Surat Internal</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{route('admin.suratmasuk')}}">Surat Masuk</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.suratkeluar')}}">Surat Keluar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Surat External</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{route('admin.suratmasuk_ex')}}">Surat Masuk</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.suratkeluar_ex')}}">Surat Keluar</a>
                                </li>
                            </ul>
                        </li>

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
                        <li>
                            <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Surat Internal </span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{route('opr.getsuratmasuk')}}">Surat Masuk</a>
                                </li>

                                <li>
                                    <a href="{{ route('opr.suratkeluar') }}">Surat Keluar</a>
                                </li>
                            </ul>
                        
                        </li> 

                        <li>
                            <a href="#"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Surat External </span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{route('opr.getsuratmasuk_ex')}}">Surat Masuk</a>
                                </li>

                                <li>
                                    <a href="{{route('opr.suratkeluar_ex')}}">Surat Keluar</a>
                                </li>
                            </ul>
                        </li>

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

            @elseif(Auth::user()->roles_id == 8)
            <li>
                <a href="{{route('sekretaris.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('sekretaris.lihatsuratsekretaris')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 9)
            <li>
                <a href="{{route('bendahara.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('bendahara.lihatsuratbendahara')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Masuk</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 666)
            <li>
                <a href="{{route('dpl.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('dpl.lihatsuratdpl')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Tugas</span></a>
            </li>

            @elseif(Auth::user()->roles_id == 777)
            <li>
                <a href="{{route('kdpl.home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{route('kdpl.lihatsuratkdpl')}}"><i class="fa fa-book"></i><span class="nav-label">Surat Tugas</span></a>
            </li>
            @endif


        </ul>            

    </div>
</nav>

<!-- Modal Ganti Password -->
<div class="modal inmodal" id="gantiPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
          <h4 class="modal-title" id="noteModalLabel">Ganti Password</h4>
        </div>

        <form class="form-horizontal" action="{{route('gantipassword')}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <br>

          
            <div class="form-group col-lg-12">
                <label>Password</label> 
		            <input type="password" placeholder="Password Baru Anda" class="form-control" name="pw1">
		    </div>

            <div class="form-group col-lg-12">
                <label>Password</label> 
		            <input type="password" placeholder="Ulangi Password Baru Anda" class="form-control" name="pw2">
		    </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>