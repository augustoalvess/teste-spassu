<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>Teste Spassu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="ERP multi-segmentos" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/images/favicon.ico">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="baseurl" content="{{ URL::to('/') }}">

        <link href="/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        <!-- jquery.vectormap css -->
        <link href="/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/libs/remixicon-health-medical/remixicon.css" rel="stylesheet" type="text/css" />

        <link href="/libs/toastr/build/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="/css/styles.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="/css/components/register.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <script src="/libs/jquery/jquery.min.js"></script>
    
    <body data-topbar="dark">
        @yield('body')
    </body>

    <!-- JAVASCRIPT -->
    <script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/libs/metismenu/metisMenu.min.js"></script>
    <script src="/libs/simplebar/simplebar.min.js"></script>
    <script src="/libs/node-waves/waves.min.js"></script>

    <script src="/libs/select2/js/select2.min.js"></script>
    <script src="/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
    <script src="/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    
    <script src="/js/pages/form-advanced.init.js"></script>

    <!-- jquery.vectormap map -->
    <script src="/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <!-- Required datatable js -->
    <script src="/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="/libs/inputmask/jquery.inputmask.min.js"></script>

    <!-- form mask init -->
    <script src="/js/pages/form-mask.init.js"></script>

    <script src="/libs/toastr/build/toastr.min.js"></script>
    <script src="/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="/js/scripts.js"></script>
    <script src="/components/register.js"></script>

    <script src="/js/loading.js"></script>

</html>