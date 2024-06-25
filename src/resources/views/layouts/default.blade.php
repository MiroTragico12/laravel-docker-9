<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('styles')
    <title>Meu Layout</title>
</head>
<body>
   <h1>Meu layout</h1> 
   @yield('content')

   <script scr="{{asset('js/app.js')}}"></script>
   @stack('scripts')
</body>
</html>