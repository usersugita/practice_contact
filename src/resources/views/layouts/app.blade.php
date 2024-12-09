<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
    <title>Document</title>
</head>

<body>
    <div class="app">

        <header class="header">
            
            <h1 class="header__heading">FashionablyLate</h1>
            <div class="header-item">@yield('link')</div>

        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>