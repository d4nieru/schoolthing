
<a href="/home">Retour au menu principal</a>
<br>

<form method="POST" action="/addteacher">
    @csrf
    Nom du professeur: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Mot de Passe: <input type="password" name="password"><br>
    Professeur Principal: <input type="radio" name="seniorTeacher" value="no" checked> Non
    <input type="radio" name="seniorTeacher" value="yes"> Oui
    <br>
    <br>
    <button type="submit">Créer le profil du professeur</button>
</form>

<div><h1>NOM DES PROFESSEURS :</h1></div>

@foreach($all_users as $user)
    Nom: {{ $user->name }}
    <br>
    Email: {{ $user->email }}
    <br>
    @php
        if($user->id != $user_id) {
    @endphp
    <form method="POST" action="/deleteuser/{{ $user->id }}">
        @csrf
        <button type='submit'>Supprimer</button>
    </form>
    @php
    }
    @endphp
    <br>
@endforeach