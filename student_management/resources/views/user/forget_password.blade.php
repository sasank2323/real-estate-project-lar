<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @include('user.header')
   <div class="card login-card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Forgot Password</h2>
             <a href="{{ route('user.login') }}" class="btn btn-sm btn-primary">
            Login 
        </a>
        </div>
        <div class="card-body">
        </div>    
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
            <form action="{{ route('user.forget.password.submit') }}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Submit" /></td>
                        <div>
                        <a href="{{ route('user.login') }}">Login</a>
                        </div>
                    </tr>

                </table>
            </form>
        </div>    
    </div>        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JYR52Jn06RrZv" crossorigin="anonymous"></script>
</html>
