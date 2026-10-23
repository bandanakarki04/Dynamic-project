<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dynamic Project')</title>

    @vite(['resources/css/app.css'])
</head>
<body>

<header>
    <h1>Dynamic Project</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/problems">Problems</a>
        <a href="/solutions">Solutions</a>
        <a href="/products">Products</a>
        <a href="/tags">Tags</a>
        <a href="/kpis">KPIs</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} Dynamic Project</p>
</footer>

</body>
</html>