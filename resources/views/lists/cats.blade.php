@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des chats</div>

                <div class="card-body">
                      <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Nom</th>
                          <th scope="col">Sexe</th>
                          <th scope="col">Puce</th>
                          <th scope="col">Famille Accueil</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            foreach ($cats as $cat) {
                                if($cat['sexe']=='0'){
                                    $sexe = "F";
                                }else{
                                    $sexe = "M";
                                }
                                foreach ($families as $familie) {
                                    if($familie['id']==$cat['id_famille']){
                                        $familleDisplayed = $familie['nom'].' '.$familie['prenom'];
                                        $route = '/familie/'.$familie['id'];
                                    }
                                }
                         ?>
                        <tr>
                          <td scope="col">{{ $cat['nom'] }}</td>
                          <td scope="col">{{ $sexe }}</td>
                          <td scope="col">{{ $cat['puce'] }}</td>
                          <td scope="col"><a href='{{$route}}'>{{ $familleDisplayed }}</a></td>

                        </tr>
                        <?php } ?>


                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
