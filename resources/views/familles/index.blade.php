@extends('layouts.app')



@section('content')
<div class="container">
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('familles.create') }}"> Ajouter une famille</a>
            </div>
    <div class="row justify-content-center">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Les Familles d'accueil</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<input class="form-control" id="myInput" type="text" placeholder="Search..">
    <table class="table table-bordered" id="myTable">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Ville</th>
            <th>Telephone</th>
            <th>Chats</th>
        </tr>
    @foreach ($familles as $famille)
    <tr>
        <td>{{ $famille->nom}}</td>
        <td>{{ $famille->prenom}}</td>
        <td>{{ $famille->adresse}}</td>
        <td>{{ $famille->cp}}</td>
        <td>{{ $famille->ville}}</td>
        <td>{{ $famille->telephone}}</td>
        <td>{{ $famille->chat->count()}}</td>

        <td width='30px'>
            <a class="btn btn-info" href="{{ route('familles.show',$famille->id) }}">D</a></td><td width='30px'>
            <a class="btn btn-primary" href="{{ route('familles.edit',$famille->id) }}">M</a></td><td width='30px'>
            {!! Form::open(['method' => 'DELETE','route' => ['familles.destroy', $famille->id],'style'=>'display:inline']) !!}
            {!! Form::submit('S', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}</td>

    </tr>
    @endforeach
    </table>


    {!! $familles->links() !!}

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
