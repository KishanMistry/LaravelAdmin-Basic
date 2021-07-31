<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
<meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
<meta name="author" content="ThemeSelect">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ Request()->pageTitle }}</title>
<link rel="apple-touch-icon" href="{{ asset('assets/admin/images/favicon/apple-touch-icon-152x152.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/images/favicon/favicon-32x32.png') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/themes/vertical-modern-menu-template/materialize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/themes/vertical-modern-menu-template/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('common-assets/css/toastr.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom/custom.css') }}">
<script src="{{ asset('assets/admin/js/vendors.min.js') }}"></script>
<script>
    // Reserve URL Link
    var APP_URL = `{{ env('APP_URL') }}`;
    var ASSET_URL = `{{ env('ASSET_URL') }}`;    
</script>