@extends('layouts.app')

@section('title', 'MyPage')

@section('stylesheets')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('/js/mypage.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Title -->
        <div class="mainheader">
            <!-- 名前表示 -->
            <h1>{{ Auth::user()->name }}</h1>
            <!-- 削除メッセージ flush 表示 -->
            @if(Session::has('message'))
            メッセージ：{{ session('message') }}
            @endif
            <hr>
        </div>

        <!-- SideMenu -->        
        <div class="col-md-2 aligncenter">
            <!-- メニュー -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-my-tab" data-toggle="pill" href="#v-pills-my" role="tab" aria-controls="v-pills-my" aria-selected="true">My</a>
                <a class="nav-link" id="v-pills-favorite-tab" data-toggle="pill" href="#v-pills-favorite" role="tab" aria-controls="v-pills-favorite" aria-selected="false">Favorite(未)</a>
                <a class="nav-link" id="v-pills-draft-tab" data-toggle="pill" href="#v-pills-draft" role="tab" aria-controls="v-pills-draft" aria-selected="false">Draft</a>
            </div>
            <br />
            <!-- 新規作成ボタン -->
            <button type="button" class="btn btn-primary btn-circle" onclick=location.href="{{ route('new') }}"><i class="fas fa-plus"></i></button>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- MyReport -->
                <div class="tab-pane fade show active" id="v-pills-my" role="tabpanel" aria-labelledby="v-pills-my-tab">
                    <!-- 一覧表示 -->
                    @foreach($my_reports as $data)
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <!-- タイトル＋概要 -->
                            <h5 class="card-title"><a href="{{ route('report') }}/{{ $data->id }}">{{ $data->title }}</a></h5>
                            <p class="card-text">{{ $data->main }}</p>
                            <hr>
                            <!-- 「イーネ」や「ストック」など反応ボタン（未） -->
                            <div class="response">
                                <div class="icon"><i class="far fa-heart fa-2x"></i><span class="response-num">?</span></div>
                                <div class="floatclear"></div>
                            </div>
                            <!-- 編集＋削除ボタン -->
                            <div class="my-admin">
                                @php
                                $editurl = route('edit', $data->id);
                                @endphp
                                <div class="icon" onclick="edit('{{ $editurl }}')"><i class="fas fa-edit fa-2x"></i></div>
                                @php
                                $delurl = route('mypage', $data->id);
                                $deltitle = $data->title;
                                @endphp
                                <div class="icon" onclick="del('{{ $delurl }}', '{{ $deltitle }}')"><i class="fas fa-trash-alt fa-2x"></i></div>
                                <div class="floatclear"></div>
                            </div>
                            <div class="floatclear"></div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- FavoriteReport（未） -->
                <div class="tab-pane fade" id="v-pills-favorite" role="tabpanel" aria-labelledby="v-pills-favorite-tab">
                    <!-- 一覧表示 -->
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Title.</a></h5>
                            <p class="card-text">Gaiyou.</p>
                            <hr>
                            icon.
                        </div>
                    </div>
                </div>

                <!-- DraftReport -->
                <div class="tab-pane fade" id="v-pills-draft" role="tabpanel" aria-labelledby="v-pills-draft-tab">
                    <!-- 一覧表示 -->
                    @foreach($my_drafts as $data)
                    <div class="maincontent card w-100 cardcontent">
                        <div class="card-body">
                            <!-- タイトル＋概要 -->
                            <h5 class="card-title"><a href="{{ route('report') }}/{{ $data->id }}">{{ $data->title }}</a></h5>
                            <p class="card-text">{{ $data->main }}</p>
                            <hr>
                            <!-- 「イーネ」や「ストック」など反応ボタン（未） -->
                            <div class="response">
                                <div class="icon"><i class="far fa-heart fa-2x"></i><span class="response-num">?</span></div>
                                <div class="floatclear"></div>
                            </div>
                            <!-- 編集＋削除ボタン -->
                            <div class="my-admin">
                                @php
                                $editurl = route('edit', $data->id);
                                @endphp
                                <div class="icon" onclick="edit('{{ $editurl }}')"><i class="fas fa-edit fa-2x"></i></div>
                                @php
                                $delurl = route('mypage', $data->id);
                                $deltitle = $data->title;
                                @endphp
                                <div class="icon" onclick="del('{{ $delurl }}', '{{ $deltitle }}')"><i class="fas fa-trash-alt fa-2x"></i></div>
                                <div class="floatclear"></div>
                            </div>
                            <div class="floatclear"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
