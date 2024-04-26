<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="container">
        @if(Request::is('register'))
            <h1 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">REGISTER</h1>
        @else
            <h1 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">LOGIN</h1>
        @endif
        @yield('content')
    </div>
</body>

</html>
