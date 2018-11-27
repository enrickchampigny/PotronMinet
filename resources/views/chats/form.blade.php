<?php
    Form::macro('myField', function($chat)
    {
        switch ($chat->couleur) {
            case 'Blanc':
                $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option selected="selected">Blanc</option>
                    <option>Noir</option>
                    <option>Roux</option>
                    <option>Tigré</option>
                  </select>
                </div>';
                break;
            case 'Noir':
                $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option>Blanc</option>
                    <option selected="selected">Noir</option>
                    <option>Roux</option>
                    <option>Tigré</option>
                  </select>
                </div>';
                break;
            case 'Roux':
                $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option>Blanc</option>
                    <option>Noir</option>
                    <option selected="selected">Roux</option>
                    <option>Tigré</option>
                  </select>
                </div>';
                break;
            case 'Tigré':
                $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option>Blanc</option>
                    <option>Noir</option>
                    <option>Roux</option>
                    <option selected="selected">Tigré</option>
                  </select>
                </div>';
                break;
            default:
                $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option selected="selected">Selectionnez</option>
                    <option>Blanc</option>
                    <option>Noir</option>
                    <option>Roux</option>
                    <option>Tigré</option>
                  </select>
                </div>';
                break;
        }
         return $list;
    });

Form::macro('myFieldSexe', function($chat)
{
    switch ($chat->sexe) {
        case 0:
            $list = '<div class="form-group">
                  <select class="form-control" id="sexe" name="sexe">
                    <option selected="selected" value="0">Femelle</option>
                    <option value="1">Male</option>
                  </select>
                </div>';
            break;
        case 1:
            $list = '<div class="form-group">
                  <select class="form-control" id="sexe" name="sexe">
                    <option value="0">Femelle</option>
                    <option selected="selected" value="1">Male</option>
                  </select>
                </div>';
            break;

        default:
            $list = '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option selected="selected">Selectionnez</option>
                    <option>Femelle</option>
                    <option>Male</option>        
                  </select>
                </div>';
            break;
    }
    return $list;
});

    Form::macro('fa', function($chat)
    {
        //dd($chat);

        $familles = DB::table('familles')->get();

        $familles = json_decode(json_encode($familles), true);
        //echo $chat->id;
        //dd($chat->id);

          $r = '<div class="form-group">
                  <select class="form-control" id="famille_id" name="famille_id">';
          foreach ($familles as $f) {
                if(Request::is('*/edit') && $f['id']==$chat->famille_id){
                    $r = $r.'<option selected="selected" value='.$f['id'].'>'.$f['nom'].' '.$f['prenom'].' </option>';
                }else{
                    $r = $r.'<option value='.$f['id'].'>'.$f['nom'].' '.$f['prenom'].' </option>';
                }
          }
          $r = $r.'</select> </div>';

        return $r;
    });

    $id = Auth::user()->id;

    if(empty($chat)){
        $chat = new \App\Chat();
    }
?>
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom :</strong>
            {!! Form::text('nom', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ancien nom :</strong>
            {!! Form::text('ancien_nom', null, array('placeholder' => 'Ancien Nom','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sexe :</strong>
            {!! Form::myFieldSexe($chat); !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date de naissance :</strong>
            {!! Form::date('date_naissance', null, array('placeholder' => 'Date de naissance','class' => 'form-control','style'=>'height:50px')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur :</strong>
            {!! Form::myField($chat); !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero de puce :</strong>
            {!! Form::text('numero_puce', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
        </div>
    </div>
        {{Form::file('user_photo[]', array('multiple'=>true,'accept'=>'image/*'))}}

     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Resume :</strong>
            {!! Form::textarea('resume', null, array('id'=>'summernote', 'placeholder' => 'Ecrivez sur le chat :)','class' => 'form-control', 'style'=>'height:300px')) !!}
        </div>
    </div>

    <?php if($id == 2){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Informations confidentielles :</strong>
                {!! Form::textarea('info_potron', null, array('id'=>'summernote', 'placeholder' => 'Informations sur le chat','class' => 'form-control', 'style'=>'height:300px')) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>FA :</strong>
            {!! Form::fa($chat); !!}

         </div>
    </div>
    <?php } ?>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
</div>



