<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body{
        margin: 20px;
        background-color: #f2f2f2;
    }
    table{
        margin-top: 20px;
    }
    td{
        padding: 10px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<div class="card login-card shadow">

 <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Registration page</h5>
         <a href="{{ route('user.login') }}" class="btn btn-sm btn-primary">
            Login 
        </a>
</div>

 <div class="card-body">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('user.registration.submit') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>name:</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td> confirm Password:</td>
                <td><input type="password" name="confirm_password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="submit" />
            </td>
            </tr>

        </table>
    </form>
</div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JYR52Jn06RrZv" crossorigin="anonymous"></script>
</body>
</html>