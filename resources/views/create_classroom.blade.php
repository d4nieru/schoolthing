
<a href="/home">Retour au menu principal</a>
<br>

<form method="POST" action="/addclassroom">
    @csrf
    Nom de la classe: <input type="text" name="classroom">
    <button class="btn btn-secondary btn-sm" type="submit">Créer une classe</button>
</form>

<div><h1>NOM DES SALLES DE CLASSE :</h1></div>

@foreach($classrooms as $classroom)
    Nom: {{ $classroom->classroom_name }}
    <br>
    @php
        if($classroom->id != $user_id) {
    @endphp
    <form method="POST" action="/deleteuser/{{ $classroom->id }}">
        @csrf
        <button type='submit'>Supprimer</button>
    </form>
    @php
    }
    @endphp
    <br>
@endforeach