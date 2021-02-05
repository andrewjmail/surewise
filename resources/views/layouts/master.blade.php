<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Surewise</title>

        <!-- Styles -->
        <style>
            .edit__button {
                background: dodgerblue;
                border: 1px solid black;
                border-radius: 5px;
            }
            .edit__button a {
                display: block;
                padding: 5px;
                text-decoration: none;
                color: white;
            }
        </style>
    </head>
    <body>
    <div class="container mt-4">
        @yield('content')
    </div>
    </body>
</html>
