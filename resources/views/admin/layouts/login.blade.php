<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        @include('admin.includes.head')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/login.css') }}">
    </head>
    <!-- END: Head-->
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    @yield('content')
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
        @include('admin.includes.footer_scripts')
    </body>
</html>