@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('chats.create') }}"> Create New Cat</a>
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
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($chats as $cat)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $cat->nom}}</td>
        <td>{{ $cat->body}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('chats.show',$cat->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('chats.edit',$cat->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['chats.destroy', $cat->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $chats->links() !!}
@endsection
