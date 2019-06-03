<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
</head>
<body>
    <div id="app">

        @auth
            @include('layouts.partials.nav')
        @endauth

        <main class="{{ auth()->guest() ? 'col-12 p-5' : 'col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3 px-0' }}">
            @auth
                @include('layouts.partials.top-nav')
            @endauth

            <div class="main-content-container container-fluid px-4 h-100">
                @auth
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">{{ $subTitle ?? '' }}</span>
                            <h3 class="page-title">{{ $pageTitle ?? '' }}</h3>
                        </div>
                    </div>
                @endauth

                @yield('content')
            </div>
        </main>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker({
                format: 'yyyy/mm/dd',
            });
            $('#summernote').summernote({
                height: 150,
                placeholder: 'write here...',
                toolbar:[
                    ['style', ['bold', 'italic', 'underline', 'clear']], 'font', 'fontname', 'fontsize', 'color',
                    ['para', ['ul', 'ol', 'paragraph']], 'height', 'help'
                ],
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
