<div class="row">
    <div class="col-3">
        <img src="/uploads/{{ old('image', $produit->image ?? null) }}" alt="" width="100" height="100">
    </div>
    <div class="col-9 input-group mb-3 mt-4">
        <input type="file" name="image" accept="image/png, image/jpeg" class="custom-file-input" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
</div>

<div class="form-group">
    <label for="libelle">Libelle</label>
    <input class="form-control" type="text" name="libelle" id="libelle"
        value="{{ old('libelle', $produit->libelle ?? null) }}" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="marque">Marque</label>
    <select name="marque" id="marque" class="form-control">
        <option value=""></option>
        <option {{ old('marque', $produit->marque ?? null) == 'HP' ? 'selected' : '' }} value="HP">HP</option>
        <option {{ old('marque', $produit->marque ?? null) == 'DELL' ? 'selected' : '' }} value="DELL">DELL</option>
        <option {{ old('marque', $produit->marque ?? null) == 'LENOVO' ? 'selected' : '' }} value="LENOVO">LENOVO
        </option>
        <option {{ old('marque', $produit->marque ?? null) == 'MAC' ? 'selected' : '' }} value="MAC">MAC</option>
    </select>
</div>


<div class="form-group">
    <label for="prix">Prix</label>
    <input class="form-control" type="text" name="prix" id="prix" value="{{ old('prix', $produit->prix ?? null) }}"
        aria-describedby="helpIdcontent">
</div>


<div class="form-group">
    <label for="qteStock">Qte Stock</label>
    <input class="form-control" type="text" name="qteStock" id="qteStock"
        value="{{ old('qteStock', $produit->qteStock ?? null) }}" aria-describedby="helpIdcontent">
</div>




@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
