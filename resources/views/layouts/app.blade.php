<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Company CRM</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="bg-yellow-400 w-full h-10 flex justify-around items-center">
            <div>
                <h1 class="font-bold"><a href="/companies">Company CRM</a></h1>
            </div>
            <div></div>
            <div>
                @guest
                    <span class="mx-2 hover:text-blue-400">
                        <a href="/login">login</a>
                    </span>
                @else
                    <span class="mx-2 hover:text-blue-400">
                        <a href="/companies">Companies</a>
                    </span>
                    <span class="mx-2 hover:text-blue-400">
                        <a href="/employees">Employees</a>
                    </span>
                    <span class="mx-2 hover:text-blue-400">
                        <a href="/logout">logout</a>
                    </span>
                @endguest
            </div>
        </header>
        <div class="container mx-auto my-12 p-4">
            @yield('content')
        </div>
        <footer class="fixed left-0 bottom-0 w-full h-10 bg-yellow-400 flex justify-center">
            <span class="my-auto">Manage your companies with ease!</span>
        </footer>
    </body>
</html>