<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        form{
            box-shadow: 2px 2px 2px 2px grey;
            border-radius: 5px;
            width: 500px;
            height: auto;
            padding: 15px;
            margin: 100px auto;
        }
        input{
            width: 100%;
            margin-bottom: 10px;
            border-radius: 2px;
        }
        label{
            width: 100%;
            color: blue;
        }
        .navbar{
            justify-content: space-between;
            display: flex;
            box-shadow: 2px 2px 2px black;
            background-color: lightskyblue;
        }
        .navs a{
            text-decoration: none;
            color: red;
            margin-right: 10px;
        }
        .navs a:hover{
            transition: ease 0.05s all;
            color: white;
        }
        .acc a{
            text-decoration: none;
            color: red;
            margin-right: 10px;
        }
        .acc a:hover{
            transition: ease-in 0.05s all;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <h1><i class="fa-solid fa-people-group"></i> Team</h1>
        </div>
        <div class="navs">
            @auth()
            <a href="{{route('create')}}">Create</a>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('index')}}">View Todo</a>
            <a href="">About</a>
            <a href="">Contact Us</a>
            @else
            <a href="{{route('home')}}">Home</a>
            <a href="">About</a>
            <a href="">Contact Us</a>
            @endauth
        </div>
        <div class="acc">
            @auth()
            <a href="{{route('logout')}}">Logout</a>
            @else
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
            @endauth
        </div>
    </div>

    @yield('content')
</body>
</html>