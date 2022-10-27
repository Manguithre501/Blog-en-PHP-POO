<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>{{ APP_NAME }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="@asset('css/styles.css')">
    <link rel="apple-touch-icon" sizes="180x180" href="@asset('img/favicons/apple-touch-icon.png')">
    <link rel="icon" type="image/png" sizes="32x32" href="@asset('img/favicons/favicon-32x32.png')">
    <link rel="icon" type="image/png" sizes="16x16" href="@asset('img/favicons/favicon-16x16.png')">
    <link rel="icon" type="image/png" sizes="16x16" href="@asset('img/favicons/android-chrome-192x192.png')">
    <link rel="icon" type="image/png" sizes="16x16" href="@asset('img/favicons/android-chrome-512x512.png')">
    <link rel="icon" type="image/png" href="@asset('img/favicons/favicon-32x32.png')" sizes="32x32">
    <link rel="icon" type="image/png" sizes="16x16" href="@asset('img/favicons/favicon.ico')">

    <link rel="stylesheet" href="@asset('js/sweetalert2/dist/sweetalert2.css')">

    <style>
        .menu>ul>li.active>a {
            color: #0D84FB;
        }

        .comment-item .reply-link:hover {
            text-decoration: none;
        }

        .comment-item .reply-link a:hover {
            text-decoration: underline;
        }

        button.btn.disabled {
            background: #E1F0FF;
            color: black;
            opacity: 0.5;
        }



        .btn-logout {
            background-color: transparent;
            color: #fff;
            outline: none;
            padding-left: 16px;
            line-height: 20px;
            display: block;
        }

        .btn-logout:hover {
            color: #0D84FB;
        }

        .select-file .file-label {
            width: auto;
            color: #fff;
            display: block;
            text-transform: capitalize;
            font-size: 50px;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="transition-none {{ route::getCurrentUrl() === 'single' ? 'no-padding' : '' }}">

    <div class="search-section">
        <div class="wrap">
            <div class="wrap_float">
                <div class="search-form">
                    <input type="text" class="search-input" placeholder="Search…">
                    <button class="search-submit"></button>
                </div>
                <div class="search-close" id="search-close"></div>
            </div>
        </div>
    </div>

    <div class="container page">
        <div class="container-wrap">
            @include('Partials.header')

            <div class="main-page-posts">

                @yield('content')

            </div>
            @include('Partials.footer')
        </div>
    </div>



    <!-- JavaScripts
	============================================= -->
    <script src="@asset('js/jquery.min.js')"></script>
    <script src="@asset('js/checkmode.js')"></script>
    <script src="@asset('js/slick.min.js')"></script>
    <script src="@asset('js/jquery.arcticmodal.min.js')"></script>
    <script src="@asset('js/lightgallery.js')"></script>
    <script src="@asset('js/jquery.mousewheel.min.js')"></script>
    <script src="@asset('js/device.min.js')"></script>
    <script src="@asset('js/jquery.placeholder.label.js')"></script>
    <script src="@asset('js/jquery-ui.min.js')"></script>
    <script src="@asset('js/scripts.js')"></script>

    <script src="@asset('js/axios/dist/axios.js')"></script>
    <script src="@asset('js/timeAgo/jquery.timeago.js')"></script>
    <script src="@asset('js/timeAgo/jquery.timeago.fr.js')"></script>
    <script src="@asset('js/sweetalert2/dist/sweetalert2.js')"></script>
    <script src="@asset('js/alert.js')"></script>


    @isset($_SESSION['success'])
    <script>
        useSwallSuccess("{{ $_SESSION['success'] }}")
    </script>
    <?php unset($_SESSION['success']) ?>
    @endisset


    @stack('scripts')

    <script>
        $("time.timeago").timeago();
    </script>
</body>

</html>