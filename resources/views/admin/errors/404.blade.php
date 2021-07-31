<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        @include('admin.includes.head')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/page-404.min.css') }}">
    </head>
    <!-- END: Head-->
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column  bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
        <div class="row">
            <div class="col s12">
                <div class="container"><div class="section section-404 p-0 m-0 height-100vh">
                        <div class="row">
                            <!-- 404 -->
                            <div class="col s12 center-align white">
                                <img src="{{ asset('assets/admin/images/gallery/error-2.png') }}" class="bg-image-404" alt="">
                                <h1 class="error-code m-0">404</h1>
                                <h6 class="mb-2">BAD REQUEST</h6>
                                <a class="btn waves-effect waves-light gradient-45deg-deep-purple-blue gradient-shadow mb-4" href="{{ route('admin.login') }}">Back
                                    TO Site</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>

        @include('admin.includes.footer_scripts')
    </body>
</html>