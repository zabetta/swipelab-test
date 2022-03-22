@extends('users.layout')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Edit user</h3>
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
@endsection