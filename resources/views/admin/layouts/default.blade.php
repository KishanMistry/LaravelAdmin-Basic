<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        @include('admin.includes.head')
    </head>
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div id="main">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @include('admin.includes.footer')
        @include('admin.includes.footer_scripts')
    </body>
</html>