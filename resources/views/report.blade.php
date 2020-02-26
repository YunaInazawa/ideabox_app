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
            <h1>{{ $report_data->title }}</h1>
            <div id="tag-area">
                @foreach($tags as $tag)
                <span class="tag-setting"><a href="#">{{ $tag->tag->main }}</a></span>
                @endforeach
            </div>
            
            <hr>
        </div>

        <!-- SideMenu -->        
        <div class="col-md-2 aligncenter">
            <a href="#" class="btn-real-dent">
                <i class="fa fa-folder-open"></i>
            </a>
            <a href="#" class="btn-real-dent">
                <i class="far fa-thumbs-up"></i>
            </a>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
        <div class="info">update : {{$report_data->updated_at->format('Y/m/d(D)')}}</div>
        <div class="info">user : <a href="#">{{ $report_data->user->name }}</a></div>
        <div class="floatclear"></div>
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p><h3>< 説明 ></h3>
                    {{ $report_data->main }}</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
