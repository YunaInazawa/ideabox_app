@extends('layouts.app')

@section('title', 'MyPage')

@section('stylesheets')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Title -->
        <div class="mainheader">
            <h1>{{ Auth::user()->name }}</h1>
            <hr>
        </div>

        <!-- SideMenu -->        
        <div class="col-md-2 aligncenter">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-my-tab" data-toggle="pill" href="#v-pills-my" role="tab" aria-controls="v-pills-my" aria-selected="true">My</a>
                <a class="nav-link" id="v-pills-favorite-tab" data-toggle="pill" href="#v-pills-favorite" role="tab" aria-controls="v-pills-favorite" aria-selected="false">Favorite</a>
                <a class="nav-link" id="v-pills-draft-tab" data-toggle="pill" href="#v-pills-draft" role="tab" aria-controls="v-pills-draft" aria-selected="false">Draft</a>
            </div>
            <br />
            <button type="button" class="btn btn-primary btn-circle" onclick="location.href='{{ route('edit') }}'"><i class="fas fa-plus"></i></button>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
        
            <div class="tab-content" id="v-pills-tabContent">
                <!-- MyReport -->
                <div class="tab-pane fade show active" id="v-pills-my" role="tabpanel" aria-labelledby="v-pills-my-tab">
                    @foreach($my_reports as $data)
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

                <!-- FavoriteReport. -->
                <div class="tab-pane fade" id="v-pills-favorite" role="tabpanel" aria-labelledby="v-pills-favorite-tab">
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('report') }}">Card title</a></h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <hr>
                            icon
                        </div>
                    </div>
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('report') }}">Card title</a></h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <hr>
                            icon
                        </div>
                    </div>
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('report') }}">Card title</a></h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <hr>
                            icon
                        </div>
                    </div>
                </div>

                <!-- DraftReport. -->
                <div class="tab-pane fade" id="v-pills-draft" role="tabpanel" aria-labelledby="v-pills-draft-tab">
                    @foreach($my_drafts as $data)
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
    </div>
</div>
@endsection
