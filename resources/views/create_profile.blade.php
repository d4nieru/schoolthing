<form method="POST" action="/createprofile">
    @csrf
    Nom du professeur: <input type="text" name="name">
    Nom de la salle de classe: <input type="text" name="classroom">
    <button class="btn btn-secondary btn-sm" type="submit">Créer le profil</button>
</form>