<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700;800;900&display=swap" />
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="/css/main.css">

        {{-- <style>
            /* small css for the mobile nav close */
            #nav-mobile-btn.close span:first-child{
                transform: rotate(45deg);
                top: 4px;
                position: relative;
                background:#a0aec0;
            }
            #nav-mobile-btn.close span:nth-child(2){
                transform: rotate(-45deg);
                margin-top: 0px;
                background:#a0aec0;
            }
        </style> --}}
        <style>
            body {
                overflow-x: hidden ; 
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="mt-32 sm:mt-32">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @include('layouts.footer')
        <script src="/js/jquery.min.js"></script>

        <!-- a little JS for the mobile nav button -->

        <script>
            $(document).ready(function() {
                $("#searchInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#searchTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                });
            });
            </script>

        <script>

            if( document.getElementById('nav-mobile-btn') ){
                document.getElementById('nav-mobile-btn').addEventListener('click', function(){
                    if( this.classList.contains('close') ){
                        document.getElementById('nav').classList.add('hidden');
                        this.classList.remove('close');
                    } else {
                        document.getElementById('nav').classList.remove('hidden');
                        this.classList.add('close');
                    }
                });
            }

            // Count + - Script
            $(document).ready(function() {
                $("#jumlah_bayar, #uang_bayar").keyup(function() {
                    var uang_bayar  = $("#uang_bayar").val();
                    var jumlah_bayar = $("#jumlah_bayar").val();

                    var kembalian_bayar = parseInt(uang_bayar) - parseInt(jumlah_bayar);
                    $("#kembalian_bayar").val(kembalian_bayar);
                });
            });
            
            // Preview Script
            $(document).ready(function() {
                $('#img').change(function() {
                    const input = $(this)[0];
                    const preview = $('.preview');

                    if (input.files && input.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.show();
                            preview.find('img').attr('src', e.target.result);
                            preview.removeClass('hidden');
                            preview.find('img').addClass('rounded-md shadow-md my-4');
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                });
            });
        </script>

                
    </body>
</html>
