<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
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
    </style>
</head>
<body>
    <form action="{{route('forgotpost')}}" method="post">
        @csrf
        <h1 style="color:red; text-align:center;">Register</h1>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{$error}}</p>
        @endforeach
        @endif
        @if (session('error'))
        <p style="color:red;">{{session('error')}}</p>
        @endif
        @if (session('success'))
        <p style="color:green;">{{session('success')}}</p>
        @endif
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Enter your Email">
        <button type="submit" class="btn btn-outline-primary">Request</button>
        <p>Login to your account <a href="{{route('login')}}">Login</a></p>
    </form>
</body>
</html>