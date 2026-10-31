<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products |  @yield('pageTitle', 'Laravel') </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        
        @yield('content')
        

    </main>
    @section('footerScripts')
        <script src="app.js"></script>
    @show
</body>
</html>