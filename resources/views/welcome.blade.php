@extends('layout')

@section('content')
    <div class="row ">
        <div class=".col-md-12">
            <div class="pull-center">
                <h1>Welcome to Library</h1>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-6 margin-tb">
            <div class="pull-left">
                <a href="/users">show-users</a>
            </div>
        </div>
        <div class="col-md-6 margin-tb">
            <div class="pull-right">
                <a href="/books">show-books</a>
            </div>
        </div>
    </div>
@endsection