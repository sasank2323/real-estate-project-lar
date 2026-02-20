<h1>admin reset password </h1>

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
<form action="{{ route('admin.reset.password.submit',[$token,$email]) }}" method="post">
    @csrf
    <table>
        <tr>
            <td>password :</td>
            <td><input type="password" name="password" placeholder="password"/></td>
        </tr>
        <tr>
            <td>reset password :</td>
            <td><input type="password" name="password_confirmation" placeholder="reset password" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="submit" /></td>
        </tr>

    </table>
</form>