<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="client_id">Clients</label>
            <select name="client_id" id="" class="form-control">
                <option value="" selected></option>

                @foreach ($clients as $client)
                    <option {{ old('marque', $vente->client_id ?? null) == $client->id ? 'selected' : '' }}
                        value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="produit_id">Produits</label>
            <select name="produit_id" id="" class="form-control">
                <option value="" selected></option>

                @foreach ($produits as $produit)
                    <option {{ old('marque', $vente->produit_id ?? null) == $produit->id ? 'selected' : '' }}
                        value="{{ $produit->id }}">{{ $produit->libelle }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="datevente">date vente</label>
            <input class="form-control" type="date" name="datevente" id="datevente"
                value="{{ old('datevente', $vente->datevente ?? null) }}" aria-describedby="helpIdcontent">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="qtevendu">qte vendu</label>
            <input class="form-control" type="text" name="qtevendu" id="qtevendu"
                value="{{ old('qtevendu', $vente->qtevendu ?? null) }}" aria-describedby="helpId">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="prixvendu">prix vendu</label>
            <input class="form-control" type="text" name="prixvendu" id="prixvendu"
                value="{{ old('prixvendu', $vente->prixvendu ?? null) }}" aria-describedby="helpIdcontent">
        </div>
    </div>
</div>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
