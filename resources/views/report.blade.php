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
            <h1>Title.</h1>
            <div id="tag-area">
                <span class="tag-setting"><a href="#">tag</a></span>
                <span class="tag-setting"><a href="#">tag</a></span>
                <span class="tag-setting"><a href="#">tag</a></span>
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
        <div id="days">update : 2020/02/25(Tue)</div>
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
