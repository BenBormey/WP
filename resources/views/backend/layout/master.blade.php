<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRM-Payroll | SU35</title>
    <!-- Google Font: Source Sans Pro -->
    <!-- call-style-css -->

    @include('backend.layout.styleshop')


</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- start Navbar -->
        @include('backend.layout.header')
        <!--  End /.navbar -->

        <!--  start left Sidebar Container -->

        @include('backend.layout.lefesidebar')
        <!--  end left Sidebar Container -->

        <!--start Dynamic Content  -->
        @yield('main_content')

        <!--end Dynamic Content  -->


        <!-- Start Footer -->
        @include('backend.layout.footer')
        <!-- end Footer -->



    </div>
    <!-- ./wrapper -->

    <!-- start  REQUIRED SCRIPTS -->
    @include('backend.layout.jsshop')
    <!-- end  REQUIRED SCRIPTS -->



</body>

</html>