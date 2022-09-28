<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])

    <title>Zadanie 1 - Programowanie zaawansowane</title>
</head>
<body class="bg-dark bg-gradient text-light min-vh-100">
<div class="container-fluid">
    @include('shared.messages')
    @yield('content')
</div>
</body>
</html>
