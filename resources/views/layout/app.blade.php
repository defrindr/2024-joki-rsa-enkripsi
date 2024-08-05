@include('partials.main')

<head>
    @include('partials.title-meta')
    {{-- @include("partials.title-meta", {"title": "Dashboard"}) --}}

    <link href="{{ asset('assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    @include('partials.head-css')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        @include('partials.menu')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            @include('partials.topbar')

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="page-title mb-0">{{ $title ?? '' }}</h2>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-none d-lg-block">
                                    <ol class="breadcrumb m-0 float-end">
                                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                        {{-- <li class="breadcrumb-item active">{{ $title }}</li> --}}
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            @include('partials.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    @include('partials.footer-scripts')

    <!-- Knob charts js -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Sparkline Js-->
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="assets/libs/morris.js/morris.min.js"></script>

    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
