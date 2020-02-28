@extends('layouts.app')

@section('title', 'ReportTitle')

@section('stylesheets')
<link href="{{ asset('css/report.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- Title -->
        <div class="mainheader">
            <!-- タイトル表示 -->
            <h1>{{ $report_data->title }}</h1>
            <!-- タグ表示 -->
            <div id="tag-area">
                @foreach($tags as $tag)
                <span class="tag-setting"><a href="#">{{ $tag->tag->main }}</a></span>
                @endforeach
            </div>
            <hr>
        </div>

        <!-- SideMenu -->        
        <div class="col-md-2 aligncenter">
            <!-- ストックボタン（未） -->
            <a href="#" class="btn-real-dent">
                <i class="fa fa-folder-open"></i>
            </a>
            <!-- イーネボタン（未） -->
            <a href="#" class="btn-real-dent">
                <i class="far fa-thumbs-up"></i>
            </a>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
            <!-- 投稿者＋更新日 -->
            <div class="info">update : {{$report_data->updated_at->format('Y/m/d(D)')}}</div>
            <div class="info">user : <a href="#">{{ $report_data->user->name }}</a></div>
            <div class="floatclear"></div>
            <!-- 記事内容 -->
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <!-- 概要 -->
                    <h1 class="subtitle">概要</h1><hr>
                    <p>{{ $report_data->main }}</p>
                    <!-- 機能 -->
                    @if($funs->count() != 0)
                    <h1 class="subtitle">機能</h1><hr>
                    @foreach($funs as $fun)
                        <h3>[{{ $fun->fun }}]</h3>
                        <p>{{ $fun->fun_detail }}</p>
                    @endforeach
                    @endif
                    <!-- 理由 -->
                    @if(isset($report_data->reason))
                    <h1 class="subtitle">理由</h1><hr>
                    <p>{{ $report_data->reason }}</p>
                    @endif
                    <!-- 備考 -->
                    @if(isset($report_data->note))
                    <h1 class="subtitle">備考</h1><hr>
                    <p>{{ $report_data->note }}</p>
                    @endif
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
