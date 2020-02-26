@extends('layouts.app')

@section('title', 'Success')

@section('stylesheets')
<link href="{{ asset('css/success.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Title -->
        <div class="mainheader">
            <h1>Success.</h1>
            <hr>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <blockquote class="aligncenter blockquote mb-0">
                    <h3>投稿が完了しました。</h3>
                    <p><a href="{{ route('mypage') }}">マイページへ</a><br />
                    <a href="{{ route('report') }}">記事を見る</a></p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
