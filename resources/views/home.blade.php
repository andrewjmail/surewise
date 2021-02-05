<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                background: lightgrey;
            }

            .container {
                max-width: 1240px;
                padding: 0 20px;
                width: 100%;
                margin: 100px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <x-navigation name="main"></x-navigation>
        </div>
    </body>

    <script>
        const navLinks = document.querySelectorAll('.navigation__category__link');

        navLinks.forEach((link) => link.addEventListener('click', function() {
            const clickedLink = this;
            if(!clickedLink.classList.contains('hide')) {
                clickedLink.classList.add('hide');
                return;
            }

            document.querySelectorAll('.navigation__category__link').forEach(link => {
                link.classList.add('hide');
            })
            clickedLink.classList.remove('hide');
        }));

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.navigation__container')) {
                document.querySelectorAll('.navigation__category__link').forEach(link => {
                    link.classList.add('hide');
                })
            }
        }, false);
    </script>
</html>
