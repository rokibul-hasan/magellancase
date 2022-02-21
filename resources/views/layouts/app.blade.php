<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset('/')}}js/alpine.min.js" defer></script>
    <script src="{{ asset('/') }}js/init-alpine.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> --}}
    {{-- <script src="{{ asset('/') }}js/charts-lines.js" defer></script> --}}
    {{-- <script src="{{ asset('/') }}js/charts-pie.js" defer></script> --}}
    <link rel="stylesheet" href="{{asset('/')}}css/toster.css">
    {{-- <link rel="stylesheet" href="{{ asset('/') }}css/font-awsome.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}css/pikaday.css">
    <script src="{{asset('/')}}js/moment.min.js"></script>
    <script src="{{asset('/')}}js/pikaday.js"></script>
    <style>
        .inlineTableBorder input{
            border:1px solid #999!important;
            padding:2px 5px;
            height:30px;
            color:#000;
        }
        .inlineTableBorder textarea{
            color:#000;
        }
    </style>

    @livewireStyles
</head>

<body>
    

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('partials.sidebar')
        <div class="flex flex-col flex-1 w-full">


            @include('partials.top')

            <main class="h-full overflow-y-auto">
                <div class="px-6 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>


    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('/')}}js/toastr.min.js"></script>
    <script src="{{asset('/')}}js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}js/dataTables.bootstrap4.min.js"></script>
    <script>
        window.livewire.on('alert_remove',()=>{
         setTimeout(function(){ $("#flashMessage").fadeOut('fast');
         }, 5000);
    </script>
    {!! Toastr::message() !!}
    @stack('footer-js')
    @stack('script')
    
    @livewireScripts
</body>

</html>
