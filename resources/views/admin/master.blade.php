<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:18:54 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{asset('/')}}assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('/')}}assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
    <!-- Datatables css -->
    <link href="{{asset('/')}}assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Theme Config Js -->
    <script src="{{asset('/')}}assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="{{asset('/')}}assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<!-- Begin page -->
<div class="wrapper">


    <!-- ========== TopNavbar Start ========== -->
@include('admin.inlcude.navbar')
    <!-- ========== TopNavbar End ========== -->

    <!-- ========== Left Sidebar Start ========== -->
@include('admin.inlcude.leftsidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    @yield('content')

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings start -->
@include('admin.inlcude.themesettings')

<!-- Theme Settings End-->



<!-- Vendor js -->
<script src="{{asset('/')}}assets/js/vendor.min.js"></script>


<!-- Daterangepicker js -->
<script src="{{asset('/')}}assets/vendor/daterangepicker/moment.min.js"></script>
<script src="{{asset('/')}}assets/vendor/daterangepicker/daterangepicker.js"></script>

<!-- Apex Charts js -->
<script src="{{asset('/')}}assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Vector Map js -->
<script src="{{asset('/')}}assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>



<!-- Dashboard App js -->
<script src="{{asset('/')}}assets/js/pages/demo.dashboard.js"></script>

<!-- App js -->
<script src="{{asset('/')}}assets/js/app.js"></script>

<!-- Datatables js -->
<script src="{{asset('/')}}assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('/')}}assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Datatable Demo Aapp js -->
<script src="{{asset('/')}}assets/js/pages/demo.datatable-init.js"></script>

<!-- App js -->
<script src="{{asset('/')}}assets/js/app.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'long_description' );
</script>
</body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:19:47 GMT -->
<script>
    function getSubCategory(id) {
        $.ajax({
           type: "GET",
           url: "{{route('get-sub-category-by-category')}}",
           data:{id:id},
           dataType: "JSON",
           success: function(response){
               var option = '';
               option += '<option>--Select Sub Category--</option>';
               $.each(response, function(key, value){
                   option += '<option value=" '+value.id+' "> '+ value.name +' </option>';
               })
                var subCategorySelect = $('#subCategorySelect');
               subCategorySelect.empty();
               subCategorySelect.append(option);
           }
        });
    }

</script>
<script>
    function getchildCategory(id) {
        $.ajax({
            type: "GET",
            url: "{{route('get-child-category-by-sub-category')}}",
            data:{id:id},
            dataType: "JSON",
            success: function(response){
                var option = '';
                option += '<option>--Select Child Category--</option>';
                $.each(response, function(key, value){
                    option += '<option value=" '+value.id+' "> '+ value.name +' </option>';
                })
                var childCategorySelect = $('#childCategorySelect');
                childCategorySelect.empty();
                childCategorySelect.append(option);
            }
        });
    }

</script>

<script>
    $(function(){
        // alert('sdfsdf');
        // $('#datatable-buttons').DataTable();
        $(document).ready(function () {
            $('#datatable-buttons').DataTable();
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</html>
