 <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SISTEM PERPUSTAKAAN DESA</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <link href="{{ asset('/css/pack.css') }}" rel="stylesheet" />
</head>
<body>
   
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main-panel">
            @include('layouts.nav')
            <div class="content">
                <div class="container-fluid">                    
                @yield('content')         
                </div>
            </div>
        </div>        
   </div>
<script src="{{ asset('/js/pack.js') }}" type="text/javascript"></script>

</body>
</html>