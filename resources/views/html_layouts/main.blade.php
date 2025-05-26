<!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
        <title>@yield('title') - Project Backend</title>
    </head>
    <body>

       <header>
            @include('html_layouts.nav')
       </header>
       
        <main>
            @yield('content')
        </main>
    
        <footer>
            @include('html_layouts.footer')
        </footer>
    </body>
    </html>