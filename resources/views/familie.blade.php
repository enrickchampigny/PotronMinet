@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Famille</div>

                <div class="card-body">
                   <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nom</label>
                      <input class="form-control" value="{{ $familie['nom']}}" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Prenom</label>
                      <input class="form-control" value="{{ $familie['prenom']}}" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Addresse</label>
                    <input class="form-control" value="{{ $familie['adresse']}}" disabled="true">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">Telephone</label>
                      <input class="form-control" value="{{ $familie['portable']}}" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputState">Mail</label>
                      <input class="form-control" value="{{ $familie['mail']}}" disabled="true">
                    </div>
                  </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">Piece Identite</label>
                      <input class="form-control" value="{{ $familie['numero_carte']}}" disabled="true">
                    </div>
                  </div>

                                         Liste des chats<br><br>
   <div class="form-row">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Sexe</th>
      <th scope="col">Puce</th>
      <th scope="col">Age</th>
      <th scope="col">Infos</th>
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
                                $route = '/familie/'.$familie['id'];

                                ?>
                     <tr>
                      <td scope="col">{{$cat['nom']}}</td>
                      <td scope="col">{{$sexe}}</td>
                      <td scope="col">{{$cat['puce']}}</td>
                      <td scope="col">2.5 mois</td>
                      <td scope="col"><a href='{{$route}}'><img src="http://www.sunshinecoast.evolutionsolar.com.au/wp-content/uploads/2014/12/Info.png" width="25px" /></a></td>

                    </tr>
                       <?php
                    }
                  ?>
                   </tbody>
</table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
