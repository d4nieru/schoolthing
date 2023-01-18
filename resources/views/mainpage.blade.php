
<p>Vous etes connecté(e) en tant que {{ $user_id; }} </p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-secondary btn-sm" type="submit">Se déconnecter</button>
</form>

<div>
    <span>
        <a href="/teachers">Liste de professeurs</a>
        <a href="/classrooms">Liste de salle de classes</a>
    </span>
</div>

<br>

Nom de la salle de classe :
<div>
    @foreach($users as $username)
        @foreach ($username->classrooms as $usern)
        {{ $usern->classroom_name }}
        <form method="POST" action="/deleteentireclassroom/{{ $usern->id }}">
            @csrf
            <button type='submit'>Supprimer</button>
        </form>
        <br>
        @endforeach
    @endforeach
</div>

Nom des professeurs rattachés :

<div>
    @foreach($classrooms as $classroom)
        @foreach ($classroom->users as $classr)
        {{ $classr->name }}
        <form method="POST" action="/removeuserfromclassroom/{{ $classr->id }}">
            @csrf
            <button type='submit'>Supprimer</button>
        </form>
        <br>
        @endforeach
    @endforeach
</div>


{{-- Nom des professeurs rattachés à cette classe :
<div>
    @foreach($user->users as $username)
        {{ $username->name }}
        <form method="POST" action="/deleteuser/{{ $username->id }}">
            @csrf
            <button type='submit'>Supprimer</button>
        </form>
        <br>
    @endforeach
</div> --}}