<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Заметка на всякий случаи!">
    <!-- Open Grap -->
    <meta property="og:locale" content="ru_RU">    
    <meta property="og:type" content="website">
    <meta property="og:title" content="Профессиональная чистка ковров">
    <meta property="og:description" content="Заметка на всякий случаи!">
    <meta property="og:url" content="https://safina.tj/zametka">
    <meta property="og:image" content="https://i.ibb.co/WcC3tH3/Asset-3.png">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Заметка на всякий случаи!">
    <meta name="twitter:description" content="Заметка на всякий случаи!">
    <meta name="twitter:url" content="https://safina.tj/zametka">
    <meta name="twitter:image" content="https://i.ibb.co/WcC3tH3/Asset-3.png">
    
    <!-- End Twitter Card -->
    <link rel="icon" href="https://i.ibb.co/VN35srC/Asset-2.png" type="image/png">
    
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireStyles
    
    <title>Заметка на всякий случаи!</title>
</head>
<body>
    @yield('content')
    @section('content')
    <div class="bg-blue-500 w-full px-0 py-5">
        <img src="{{ asset('images/logo.png') }}" alt="" class="h-[35px] w-auto mx-auto px-4">
    </div>
    <div class="bg-blue-500">
        @livewire('trello')
        
    </div>
    
    <div class="absolute w-full text-center bottom-0 py-5 bg-blue-500 text-xl text-white font-semibold">
        Powered by <a href="https://instagram.com/mahmudov.shod" class="text-yellow-500">mahmudov.shod</a>
    </div>
    @livewireScripts
</body>
</html>