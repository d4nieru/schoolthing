
<form method="POST" action="/register">
    @csrf
    Email: <input type="text" name="email"><br>
    Mot de Passe: <input type="password" name="password"><br>
    Retapez le Mot de Passe: <input type="password" name="password_confirmation">
    <br><button type="submit">Créer un compte</button></br>
</form>


<for

<hr>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif