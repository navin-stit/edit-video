<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Video Editing Material Design Bootstrap</title>
        <meta http-equiv="Cache-Control" content=" private, no-cache, no-store, must-revalidate, pre-check=0, post-check=0, max-age=0">
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Font Awesome -->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{asset('public/css/compiled-4.8.2.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/mdb.min.css')}}" rel="stylesheet">
        Your custom styles (optional) 
        <!-- <link href="{{asset('public/css/style.css')}}" rel="stylesheet"> -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/headerfooter.css')}}" rel="stylesheet">
        <script>
            function SelectdLogo(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#appendLogo').html('');
                         $('#appendLogo').append('<input type="text" value="'+input.files[0].name+'">');
                        $('#appendLogo').append('<img src=' + e.target.result + ' width="50px" height="50px" style="margin-left: 1rem">');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function SelectdMusic(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#appendMusic').html('');
                        $('#appendMusic').append('<input type="text" value="'+input.files[0].name+'">');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script type="text/javascript">
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>

    </head>

    <body class="body-signup">

        @include('layouts.partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.partials.modal')
        @include('layouts.partials.footer')
        <script type="text/javascript">
            $('#your-custom-id').mdbDropSearch();
            // Material Select Initialization
            $(document).ready(function () {
                $('.mdb-select').materialSelect();
            });
        </script>
        <script>
            var webUrl = {!! json_encode(url('/')) !!}
        </script>
    </body>
</html>