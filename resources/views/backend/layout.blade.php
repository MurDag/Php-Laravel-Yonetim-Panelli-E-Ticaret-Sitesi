<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('') }}/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('') }}/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('') }}/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('') }}/backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('') }}/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('') }}/backend/custom/css/custom.css" rel="stylesheet">


    <!-- Dropzone.js -->

    <link href="{{ asset('') }}/backend/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



    <!-- Dropzone.js -->

    <script src="{{ asset('') }}/backend/vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Ck Editör -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


    <!-- Custom Theme Style -->
    <link href="{{ asset('') }}/backend/build/css/custom.min.css" rel="stylesheet">


    <!-- Alertify CSS Start -->
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Alertify CSS End -->

    <!-- jQuery -->
    <script src="{{ asset('') }}/backend/vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>

<body class="nav-md" onload="init();">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('') }}images/backend/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{route('default.index')}}"><i class="fa fa-home"></i> Anasayfa </a></li>

                            <li><a><i class="fa fa-cogs"></i> Site Ayarları <span class="fa fa-cogs"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('genelAyarlar.index')}}">Genel Ayarlar</a></li>
                                    <li><a href="{{route('iletisimAyar.index')}}">İletişim Ayarlar</a></li>
                                    <li><a href="{{route('apiAyar.index')}}">Api Ayarlar</a></li>
                                    <li><a href="{{route('sosyalAyarlar.index')}}">Sosyal Ayarlar</a></li>
                                    <li><a href="{{route('mailAyar.index')}}">Mail Ayarlar</a></li>
                                </ul>
                            </li>

                            <li><a href="{{route('hakkimizda.index')}}"><i class="fa fa-info"></i> Hakkımızda </a></li>

                            <li><a href="{{route('kullanici.index')}}"><i class="fa fa-user"></i> Kullanıcılar </a></li>

                            <li><a href="{{route('urun.index')}}"><i class="fa fa-shopping-basket"></i> Ürünler </a></li>

                            <li><a href="{{route('siparis.index')}}"><i class="fa fa-pencil-square-o"></i> Siparişler </a></li>

                            <li><a href="{{route('menuler.index')}}"><i class="fa fa-list"></i> Menüler </a></li>

                            <li><a href="{{route('kategori.index')}}"><i class="fa fa-list"></i> Kategoriler </a></li>

                            <li><a href="{{route('slider.index')}}"><i class="fa fa-image"></i> Slider </a></li>

                            <li><a href="{{route('yorum.index')}}"><i class="fa fa-comments"></i> Yorumlar </a></li>

                            <li><a href="{{route('banka.index')}}"><i class="fa fa-bank"></i> Bankalar </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('') }}images/backend/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>



                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Site Yönetim Paneli by Murat DAĞ
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>





<!-- Bootstrap -->
<script src="{{ asset('') }}/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('') }}/backend/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{ asset('') }}/backend/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="{{ asset('') }}/backend/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('') }}/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ asset('') }}/backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('') }}/backend/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('') }}/backend/build/js/custom.min.js"></script>

<!-- Datatables -->
<script>
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>
<!-- /Datatables -->

<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



@if(session('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif

@if(session('error'))
    <script>alertify.error('{{session('error')}}')</script>
@endif

@foreach($errors->all() as $error)
    <script>
        alertify.error('{{$error}}');
    </script>
@endforeach
</body>
</html>
