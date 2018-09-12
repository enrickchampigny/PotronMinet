@extends('layouts.app')



@section('content')
<div class="container">
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('chats.create') }}"> Ajouter un chat</a>
            </div>
    <div class="row justify-content-center">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mes chats</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Ancien nom</th>
            <th>Couleur</th>
            <th>Numero de puce</th>
            <th>Famille d'accueil</th>
            <th width="280px">Gestion</th>
        </tr>
    @foreach ($chats as $cat)
    <?php

    ?>
    <tr>
        <td>{{ $cat['nom']}}</td>
        <td>{{ $cat['ancien_nom']}}</td>
        <td>{{ $cat['couleur']}}</td>
        <td>{{ $cat['numero_puce']}}</td>
        <td>{{ $cat['famille_id']}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('chats.show',$cat['id']) }}">Détails</a>
            <a class="btn btn-primary" href="{{ route('chats.edit',$cat['id']) }}">Modifier</a>
            {!! Form::open(['method' => 'DELETE','route' => ['chats.destroy', $cat['id']],'style'=>'display:inline']) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


</div></div>
@endsection
