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
    @foreach ($chat->photo as $p)
    <?php $photoToggle = "#togglePhoto".$p->id; $toggle="togglePhoto".$p->id; ?>
    <button data-toggle="modal" data-target="{{ $photoToggle}}">
    <img src="{{$p->chemin}}" alt="photo" width="150px" height="150px"  />
    </button>
    <div class="modal fade" id="{{ $toggle}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{$p->chemin}}" alt="photo"/>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>



    @endforeach

</div>

@endsection
