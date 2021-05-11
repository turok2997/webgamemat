<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div >
{{--            <div class="min-h-screen bg-gray-100">--}}
            @include('layouts.navigation')

            <style>
                #myVideo {
                    background: #000;
                    -o-object-fit: cover;
                    object-fit: cover;
                    position: fixed;
                    top: 0; right: 0; bottom: 0; left: 0;
                    z-index: -99;
                    width: 100%;
                    height: 100%;
                }

                .child {
                    background: #eee;
                    border: 1px solid #ccc;
                    padding: 10px;
                    float: left;
                    width: 20%;
                    margin-right: 5%;
                    margin-left: 25%;
                    margin-top: 60px;
                    text-align:center;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                }
                .child:last-child {
                    margin-right: 25%;
                    margin-left: 5%;
                }
                .end_test{
                    width: 30%;
                    margin-right: 35%;
                    margin-left: 35%;
                    text-align:center;
                    margin-top: 60px;
                    background: #eee;
                    border: 1px solid #ccc;
                }
                /*.parent1{*/
                /*    width: 15%;*/
                /*    height: 20%;*/
                /*    margin-right: 24.5%;*/
                /*    margin-left: 24.5%;*/
                /*    !*margin-top: 120px;*!*/
                /*    text-align:center;*/
                /*    background: #eee;*/
                /*    border: 1px solid #ccc;*/

                /*}*/
                .child1{
                    background: #eee;
                    border: 1px solid #ccc;
                    padding: 10px;
                    float: left;
                    width: 50%;
                    margin-right: 25%;
                    margin-left: 25%;
                    margin-top: 60px;
                    text-align:center;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                }

                </style>
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
