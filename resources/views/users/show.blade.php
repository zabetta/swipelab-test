@extends('layout')

@section('content')
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Show user</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First name:</strong>
            {{ $user->first_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>last name:</strong>
            {{ $user->last_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{ $user->address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Card number:</strong>
            {{ $user->card_number }}
        </div>
    </div>
</div>
@endsection