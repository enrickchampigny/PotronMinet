<?php
    Form::macro('myField', function()
    {
        return '<div class="form-group">
                  <select class="form-control" id="couleur" name="couleur">
                    <option>Blanc</option>
                    <option>Noir</option>
                    <option>Roux</option>
                    <option>Tigré</option>
                  </select>
                </div>';
    });
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
            <strong>Date de naissance :</strong>
            {!! Form::date('date_naissance', null, array('placeholder' => 'Date de naissance','class' => 'form-control','style'=>'height:50px')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur :</strong>
            {!! Form::myField(); !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero de puce :</strong>
            {!! Form::text('numero_puce', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Resume :</strong>
            {!! Form::textarea('resume', null, array('id'=>'summernote', 'placeholder' => 'Ecrivez sur le chat :)','class' => 'form-control', 'style'=>'height:300px')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>



