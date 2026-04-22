<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}"></head>
<body>
    <nav>
        <a href="{{route('posts.index')}}">All posts</a>
        <a href="{{route('contact.index')}}">Feedback</a>
        <a href="{{route('about')}}">About</a>
        <a href="{{route('colors')}}">Colors</a>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>
</html>