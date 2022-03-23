@extends('layout')

@section('content')
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>BOOK DETAILS</h3>
        </div>
    </div>
</div>

<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-4 margin-tb">
        <img src="{{$book->image_url}}" alt="book image" style="width:100%;border-radius: 25px;">
    </div>
    <div class="col-md-8 margin-tb">
        <div style="margin-bottom:2em;">
            <p style="height:1.5em; width:auto"><strong>{{$book->title}}</strong></p>
            <p style="height:1.5em; width:auto"><strong>{{$book->price}}&euro;</strong></p>
            <br />
            @if (count($book->borrowedFrom) == 0)
            <strong style="color:green">available for loan</strong>
            @else
            <strong style="color:red">NOT available for loan</strong>
            @endif
        </div>
    </div>
</div>
<a class="btn btn-primary" href="/books">Back to books list</a>
@endsection