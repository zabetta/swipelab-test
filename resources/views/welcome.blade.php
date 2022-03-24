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
        <p>backend</p>
        <div class="pull-left">
            <ul>
                <li><a href="/books">Books</a></li>
                <li><a href="/users">Users</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 margin-tb">
        <p>frontend</p>
        <div class="pull-right">
            <a href="{{route('books.showlist')}}">Books</a>
        </div>
    </div>
</div>
@endsection