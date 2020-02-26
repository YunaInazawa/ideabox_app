@extends('layouts.app')

@section('title', 'Edit')

@section('stylesheets')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('/js/edit.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Title -->
        <div class="mainheader">
            <h1>Edit.</h1>
            <hr>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
        
            <!-- MyReport -->
            <div class="tab-pane fade show active" id="v-pills-my" role="tabpanel" aria-labelledby="v-pills-my-tab">
                <div class="maincontent card w-100 cardcontent">
                    <div class="card-body">
                        <form action="{{ route('edit') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h5 class="card-title">Title.<font color="red">*</font></h5>
                                <input class="form-control" name="title" type="text">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">What.<font color="red">*</font></h5>
                                <textarea class="form-control" name="what" id="what" rows="3"></textarea>
                            </div>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Kinou.</h5>
                                <input class="form-control" name="kinou1" type="text" placeholder="<例> ユーザ登録が出来る。">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Syosai.</h5>
                                <textarea class="form-control" name="syosai1" id="syosai" rows="3" placeholder="<例> ユーザ名・メールアドレス・パスワードを登録。&#13;&#10;登録が完了するとマイページに移動する。"></textarea>
                            </div>
                            <div id="add-kinou"></div>
                            <button type="button" class="btn btn-outline-primary" onclick="addKinou()">+ ADD</button>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Why.</h5>
                                <textarea class="form-control" name="reason" id="why" rows="3"></textarea>
                            </div>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Tags.</h5>
                                <div class="form-row">
                                    <div class="col tags">
                                        <input class="form-control" name="tag1" type="text">
                                    </div>
                                    @for($i = 0; $i < 4; $i++)
                                    <div class="col tags">
                                    </div>
                                    @endfor
                                </div>
                                <div id="add-tags"></div>
                                <button type="button" class="btn btn-outline-primary" onclick="addTags()">+ ADD</button>
                            </div>
                            <hr>

                            <div class="alignright">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="release" class="custom-control-input" id="customSwitch1" onchange="changeBox()">
                                    <label class="custom-control-label" for="customSwitch1" id="release">下書き</label>
                                    <button type="submit" class="btn btn-primary">Ok</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
