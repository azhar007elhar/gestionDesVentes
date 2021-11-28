<div class="form-group">
    {{-- <label for="image">image</label> --}}
    <img src="{{old('image' , $produit->image ?? null )}}" alt="" width="100" height="100">
    {{-- <input class="form-control" type="text" name="image" id="image" value="{{old('image' , $produit->image ?? null )}}" aria-describedby="helpId" hidden> --}}
</div>

<div class="form-group">
    <label for="libelle">Libelle</label>
    <input class="form-control" type="text" name="libelle" id="libelle" value="{{old('libelle' , $produit->libelle ?? null )}}" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="marque">Marque</label>
    {{-- <input class="form-control" type="text" name="marque" id="marque" value="{{old('marque' , $produit->marque ?? null )}}" aria-describedby="helpIdcontent"> --}}
    <select name="marque" id="marque" class="form-control">
        <option value=""></option>
        <option value="HP">HP</option>
        <option value="HP">DELL</option>
        <option value="HP">LENOVO</option>
        <option value="HP">MAC</option>
    </select>
</div>


<div class="form-group">
    <label for="prix">Prix</label>
    <input class="form-control" type="text" name="prix" id="prix" value="{{old('prix' , $produit->prix ?? null )}}" aria-describedby="helpIdcontent">
</div>


<div class="form-group">
    <label for="qteStock">Qte Stock</label>
    <input class="form-control" type="text" name="qteStock" id="qteStock" value="{{old('qteStock' , $produit->qteStock ?? null )}}" aria-describedby="helpIdcontent">
</div>




@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif