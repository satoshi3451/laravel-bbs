<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>スレッド式掲示板</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
            スレッド式掲示板
            </a>
        </div>
    </header>

    <div>
        @yield('content')
    </div>
</body>
</html>