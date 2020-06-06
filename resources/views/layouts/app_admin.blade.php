<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ionian | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!--file input master-->
        <link rel="stylesheet" href="{{ asset('/assets/bootstrap-fileinput-master/css/fileinput.min.css') }}">
        <!--Bootstrap toggle master-->
        <link rel="stylesheet" href="{{ asset('/assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css') }}">
        <!-- bootstrap datetimepicker -->
        <link href="{{ asset('/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <!--iCheck-->
        <link rel="stylesheet" href="{{ asset('/admin/plugins/iCheck/all.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('/admin/dist/css/skins/_all-skins.min.css') }}">
        <!--Custom css-->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">E</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>EStore</b> </span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"></li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                       
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-users text-aqua"></i>
                                                    <br>
                                                    <small class="text-muted"></small>
                                                    
                                                </a>
                                            </li>
                                        
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> No activity today.
                                                </a>
                                            </li>
                                        
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    
                                    
                                    <img src="{{ asset('/assets/images/user-placeholder.png') }}" class="user-image" alt="User Image">
                                    
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                       
                                        <img src="{{ asset('/assets/images/user-placeholder.png') }}" class="img-circle" alt="User Image">
                                        
                                    </li>
                                
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <!--<a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>-->
                                            <a href=""
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();
                                               " class="btn btn-default btn-flat">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('/assets/images/user-placeholder.png') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}</p>
                            <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li id="admin_dashboard"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="treeview" >
                            <a href="#">
                                <i class="fa fa-files-o"></i> <span>Category</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id='boatindex'><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category listing</a></li>
                                <li id="boatcreate"><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Add New Category</a></li>
                            </ul>
                        </li>

                        <li class="treeview" >
                            <a href="#">
                                <i class="fa  fa-cart-plus"></i> <span>Product</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="boattypeindex"><a href=""><i class="fa fa-circle-o"></i> <span>Manage Boat type</span></a></li>
                                <li id="boatmanufacturerindex"><a href=""><i class="fa fa-circle-o"></i> <span>Manage Boat Manufacturer</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            @yield('content')

            <footer class="main-footer">
                <!--                <div class="pull-right hidden-xs">
                                    <b>Version</b> 2.4.0
                                </div>-->
                <strong>Copyright &copy; 2020 <a href="#">Dhaval</a>.</strong> All rights reserved.
            </footer>


            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <!--<script src="{{ asset('/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!--Bootstrap toggle js-->
        <script src="{{ asset('/assets/bootstrap-toggle-master/js/bootstrap-toggle.min.js') }}"></script>
        <!-- sortable plugin for sorting/rearranging initial preview -->
        <!--<script src="{{ asset('/assets/bootstrap-fileinput-master/js/plugins/sortable.min.js') }}"></script>-->
        <!-- purify plugin for safe rendering HTML content in preview -->
        <script src="{{ asset('/assets/bootstrap-fileinput-master/js/plugins/purify.min.js') }}"></script>
        <!--File input js-->
        <script src="{{ asset('/assets/bootstrap-fileinput-master/js/fileinput.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        <!-- jvectormap  -->
        <script src="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

        <!-- ChartJS -->
        <!--<script src="{{ asset('/admin/bower_components/Chart.js') }}"></script>-->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="{{ asset('/admin/dist/js/pages/dashboard2.js') }}"></script>-->
        <!-- AdminLTE for demo purposes -->
        <!--<script src="{{ asset('/admin/dist/js/demo.js') }}"></script>-->
        @yield('custom_js')
        <script>
            /*
            $("#file-1").fileinput({
//                uploadUrl: $('#file-1').closest('form').attr('action'), // you must set a valid URL here else you will get an error
                uploadUrl: "#",
                showUpload: false,
                removeLabel: 'Remove all',
                //allowedFileExtensions: ['jpg', 'png', 'gif'],
                overwriteInitial: false,
//                maxFileSize: 1000,
//                maxFilesNum: 10,
                allowedFileTypes: ['image'],
                slugCallback: function (filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
            $("#file-2").fileinput({
//                uploadUrl: $('#file-1').closest('form').attr('action'), // you must set a valid URL here else you will get an error
                uploadUrl: "#",
                showUpload: false,
                removeLabel: 'Remove all',
                allowedFileExtensions: ['jpg', 'png', 'gif','pdf','docx','doc'],
                slugCallback: function (filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
            $(document).ready(function () {
                $('.file-preview').hide();
                $('#file-1').on('change', function (event) {
                    console.log("change");
                    $('.file-preview').show();
                });
//                $("button.kv-file-upload").hide();
                var current_route = $("#current_route").val();
//                current_route = current_route.replace(/[^a-zA-Z0-9]/g, '')
                current_route = current_route.replace(/[.]/g, '')
                $("#" + current_route).addClass('active');
                $("#" + current_route).closest('.treeview').addClass('active');
            });
            */
        </script>
    </body>
</html>