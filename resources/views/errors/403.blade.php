<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forbidden</title>
</head>
<body>
<h1>Forbidden</h1>
<h3>403 {{ $exception->getMessage() }}</h3>
<a href="{{ route('index') }}">Go to main</a>
</body>
</html>