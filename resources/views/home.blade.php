@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    L'ASSOCIATION
                    Depuis plus de 10 ans, l'association Potron Minet en Gironde, située à Mérignac, recueille des chats abandonnés, blessés ou malades. Nous prenons alors soin d'eux et nous les vaccinons, les tatouons et les stérilisons. Nous les sociabilisons également afin de les rendre adoptables.

                    Vous pouvez nous rendre visite et rencontrer nos pensionnaires sur rendez-vous uniquement. Nous sommes joignables entre 14 h et 22 h (ne laissez pas de message sur le répondeur).

                    05 56 12 00 21



                    <?php
                    $cats = App\Famille::find(1)->cats;

                    foreach ($cats as $cat) {
                       echo($cat['nom']);
                    }


                    //$family = App\Chat::find(2)->family;

                    //echo($family->nom);

                    ?>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
