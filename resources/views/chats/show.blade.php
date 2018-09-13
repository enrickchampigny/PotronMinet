@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $chat->nom}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::previous() }}"> Retour</a>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ancien nom :</strong>
                {{ $chat->ancien_nom}}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Couleur :</strong>
                {{ $chat->couleur}}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numero de puce :</strong>
                {{ $chat->numero_puce}}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Résumé :</strong>
                {{ $chat->resume}}
            </div>
        </div>
    </div>
</div>
@endsection
