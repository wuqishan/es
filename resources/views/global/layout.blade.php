<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>111111</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/common.css') }}" />
    <script src="{{ asset('/dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/js/bootstrap.min.js') }}"></script>
    @section('otherStaticFile')
    @show
</head>
<body>
    @include("global.nav")

    <div class="container" id="container_body">
        @yield('content')
    </div>

    <div class="container" id="container_footer" style="margin-top:42px;">
        @include("global.footer")
    </div>
</body>
</html>