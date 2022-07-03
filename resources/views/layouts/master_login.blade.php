<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>Sanggar Tari Ayunindya's</title>

    @include('layouts/partials/css')
</head>
<body class="login-page">
    <header class="miri-ui-kit-header header-no-bg-img header-navbar-only">@include('layouts/partials/nav')
        
    </header>
    @yield('content')
   
   @include('layouts/partials/js')
</body>
</html>
