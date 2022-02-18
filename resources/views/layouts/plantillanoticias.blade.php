<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- favicon -->
    
    <!-- estilos -->
    <link rel="stylesheet" href="">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- header -->
    @yield('header')
    <!-- nav -->

    @yield('content')

    <!-- footer -->

    <!-- script -->
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body>
</html>