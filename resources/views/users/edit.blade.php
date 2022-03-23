@extends('layout')

@section('content')
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Edit user</h1>
            <a href="/users">Back to list</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('users.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first_name:</strong>
                <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last_name:</strong>
                <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <input type="text" name="address" class="form-control" value="{{$user->address}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>card_number:</strong>
                <input type="text" name="card_number" class="form-control" value="{{$user->card_number}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">update user</button>
        </div>
    </div>
</form>
<h3>BORROWED BOOKS</h3>
@if (count($user->hasBooks()->get()) > 0)
@foreach($user->hasBooks()->get() as $book )
<div class="row">
    <div class="col-md 4">
        <strong>{{$book->title}}</strong>
    </div>
    <div class="col-md 8">
        <a href="/users/{{$user->id}}/end-load/{{$book->id}}">end loan</a>
    </div>
</div>
@endforeach
@else
<em>No books</em>
@endif

<h4>NEW LOAN</h4>
<form action="{{ route('users.new_load') }}" method="POST">
    @csrf
    <select id="loan" name="book_id">
        @foreach($books as $book)
        <option value="{{$book->id}}">{{$book->title}}</option>
        @endforeach
    </select>
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <button type="submit" class="btn btn-success">New LOAN</button>
</form>

@endsection