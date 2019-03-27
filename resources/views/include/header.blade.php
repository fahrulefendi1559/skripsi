<div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.9.1/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
</div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Welcome to SIDAS</span>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope"></i>  <span class="label label-warning">1</span>
            </a>

            <!-- info jumlah pesan yang belum di baca -->
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <div class="dropdown-messages-box">
                        <a class="dropdown-item float-left" href="profile.html">
                            <img alt="image" class="rounded-circle" src="{{ asset('asset/img/a7.jpg')}}">
                        </a>
                        <div>
                            <small class="float-right">46h ago</small>
                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                        </div>
                    </div>
                </li>
                          
                <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html" class="dropdown-item">
                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
            </ul>
        </li>

        <!-- Info jumlah pemberitahuan yang belum di baca -->
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <!-- Pemberitahuan berkas yang harus divalidasi -->
                <li>
                    <a href="mailbox.html" class="dropdown-item">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> 16 Validasi
                        </div>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                    <li>
                        <a href="grid_options.html" class="dropdown-item">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> 21 Surat Masuk
                        </div>
                        </a>
                    </li>

                    <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    </li>

                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                   
                </ul>