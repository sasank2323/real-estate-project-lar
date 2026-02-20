<h2> admin login</h2>
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
<form action="{{ route('admin.forget.password') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" /></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Login" /></td>
            <div>
               <a href="{{ route('admin.forget.password.submit') }}">Forgot Password?</a>
            </div>
        </tr>

    </table>
</form>