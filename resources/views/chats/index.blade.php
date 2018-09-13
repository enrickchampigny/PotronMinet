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
                <h2>Les chats à adopter</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<input class="form-control" id="myInput" type="text" placeholder="Search.." onkeyup="myFunction()">
    <table class="table table-bordered" id="myTable">
        <tr>
            <th>Nom</th>
            <th>Ancien nom</th>
            <th>Naissance</th>
            <th>Couleur</th>
            <th>Numero de puce</th>
            <th>Famille d'accueil</th>
        </tr>
    @foreach ($chats as $cat)
    <tr>
        <td>{{ $cat->nom}}</td>
        <td>{{ $cat->ancien_nom}}</td>
        <td>{{ $cat->date_naissance}}</td>
        <td>{{ $cat->couleur}}</td>
        <td>{{ $cat->numero_puce}}</td>
        <td><b><a href="{{ route('familles.show',$cat->famille_id) }}">{{ $cat->famille->nom}}</a></td>
        <td width='30px'>
            <a class="btn btn-info" href="{{ route('chats.show',$cat->id) }}">D</a></td><td width='30px'>
            <a class="btn btn-primary" href="{{ route('chats.edit',$cat->id) }}">M</a></td><td width='30px'>
            {!! Form::open(['method' => 'DELETE','route' => ['chats.destroy', $cat->id],'style'=>'display:inline']) !!}
            {!! Form::submit('S', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}</td>

    </tr>
    @endforeach
    </table>


    {!! $chats->links() !!}

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</div></div>
@endsection
