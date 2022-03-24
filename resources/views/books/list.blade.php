@extends('layout')

@section('content')
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>BOOKS GRID </h3>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row" style="margin-bottom: 20px;">
    @foreach ($books as $book)
    <div class="col-md-3 margin-tb">
        <div style="margin-bottom:2em;">
            <img src="{{asset('assets/imgs/fake-book-inside.jpg')}}" alt="book image" style="width:100%;border-radius: 25px;">
            <p style="height:1.5em; width:auto"><strong>{{$book->title}}</strong></p>
            <p style="height:1.5em; width:auto"><strong>{{$book->price}}&euro;</strong></p>
            <br />
            <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">read more</a>
        </div>
    </div>
    @endforeach
</div>
@endsection