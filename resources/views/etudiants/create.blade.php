@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Page Précédente</a>
                <h1>Créer un nouvel étudiant</h1>
                <hr>
                    <form method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" class="form-control" name="adresse" placeholder="adresse" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="ville">Ville</label>
                                <select name="ville" id="ville">
                                    <option value="1">Volvo</option>
                                </select>
                            </div>
                            <div class="control-group col-12">
                                <label for="phone">Téléphone</label>
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="888-888-8888" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="email">Courriel</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="email" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="text" id="date_naissance" class="form-control" name="date_naissance" placeholder="yyyy/mm/dd" required>
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Créer un message 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection