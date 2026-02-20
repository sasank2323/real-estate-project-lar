<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f2f2f2;
        }
        .login-card{
            max-width: 450px;
            margin: 80px auto;
        }
    </style>
</head>
<body>

<div class="card login-card shadow">
    <!-- CARD HEADER -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">User Login</h5>
        <a href="{{ route('user.registration') }}" class="btn btn-sm btn-primary">
            Sign Up
        </a>
    </div>

    <!-- CARD BODY -->
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.login.submit') }}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-success">
                    Login
                </button>

                <a href="{{ route('user.forget.password') }}" class="text-decoration-none">
                    Forgot Password?
                </a>
            </div>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
