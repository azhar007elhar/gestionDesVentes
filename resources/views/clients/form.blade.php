
<div class="form-group">
    <label for="nom">Nom</label>
    <input class="form-control" type="text" name="nom" id="nom" value="{{old('nom' , $client->nom ?? null )}}" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="prenom">Prenom</label>
    <input class="form-control" type="text" name="prenom" id="prenom" value="{{old('prenom' , $client->prenom ?? null )}}" aria-describedby="helpIdcontent">
</div>


<div class="form-group">
    <label for="telephone">Telephone</label>
    <input class="form-control" type="text" name="tele" id="tele" value="{{old('telephone' , $client->tele ?? null )}}" aria-describedby="helpIdcontent">
</div>



@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif