@extends('layouts.app')

@section('title', config('app.name'))

@section('stylesheets')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Menu -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    menu1<br />
                    menu2...
                </div>
            </div>
        </div>

        <!-- MainContents -->
        <div class="col-md-9">
            @foreach($report_datas as $data)
            <div class="maincontent card w-100 cardcontent">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('report') }}/{{ $data->id }}">{{ $data->title }}</a></h5>
                    <p class="card-text">{{ $data->main }}</p>
                    <hr>
                    icon
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
