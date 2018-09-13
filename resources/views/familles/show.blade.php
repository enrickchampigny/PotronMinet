@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ $famille->nom}} {{ $famille->prenom}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::previous() }}"> Retour</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone :</strong>
                {{ $famille->telephone}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse :</strong>
                {{ $famille->adresse}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code postal :</strong>
                {{ $famille->cp}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ville :</strong>
                {{ $famille->ville}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Liste des chats :</strong>

        <table class="table table-bordered" id="myTable">
            <tr>
                <th>Nom</th>
                <th>Ancien nom</th>
                <th>Naissance</th>
                <th>Couleur</th>
                <th>Numero de puce</th>
            </tr>
        @foreach ($famille->chat as $cat)
        <tr>
            <td>{{ $cat->nom}}</td>
            <td>{{ $cat->ancien_nom}}</td>
            <td>{{ $cat->date_naissance}}</td>
            <td>{{ $cat->couleur}}</td>
            <td>{{ $cat->numero_puce}}</td>


        </tr>
        @endforeach
        </table>
            </div>
        </div>
    </div>

</div>
@endsection
