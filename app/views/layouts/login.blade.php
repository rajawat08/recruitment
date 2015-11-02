<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rajawat">
    <meta name="keyword" content="">
    
    <title> Login </title>
    
    {{ style('css/bootstrap.min.css') }}
    {{ style('css/bootstrap-reset.css') }}
    {{style('assets/font-awesome/css/font-awesome.css')}}
    {{ style('css/style.css') }}
    {{ style('css/style-responsive.css') }}

    @yield('style')

</head>
<body class="login-body">
    @include('partials.flashes')

    <div class="container">
        @yield('content')
    </div>

    {{ script('js/jquery.js') }}
    {{ script('js/bootstrap.min.js') }}

    @yield('script')
</body>
</html>