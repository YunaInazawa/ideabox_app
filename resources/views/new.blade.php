@extends('layouts.app')

@section('title', 'New')

@section('stylesheets')
<link href="{{ asset('css/new.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('/js/new.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Title -->
        <div class="mainheader">
            <h1>New.</h1>
            <hr>
        </div>

        <!-- MainContents -->        
        <div class="col-md-10">
        
            <!-- MyReport -->
            <div class="tab-pane fade show active" id="v-pills-my" role="tabpanel" aria-labelledby="v-pills-my-tab">
                <div class="maincontent card w-100 cardcontent">
                    <div class="card-body">
                        <!-- フォーム -->
                        <form action="{{ route('new') }}" method="POST">
                            {{ csrf_field() }}

                            <!-- タイトル入力欄 -->
                            <div class="form-group">
                                <h5 class="card-title">Title.<font color="red">*</font></h5>
                                <input class="form-control" name="title" type="text">
                                @if ($errors->first('title'))
                                <p class="validation">※ {{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <!-- 概要入力欄 -->
                            <div class="form-group">
                                <h5 class="card-title">What.<font color="red">*</font></h5>
                                <textarea class="form-control" name="what" id="what" rows="3"></textarea>
                                @if ($errors->first('what'))
                                <p class="validation">※ {{$errors->first('what')}}</p>
                                @endif
                            </div>
                            <hr>

                            <!-- 機能入力欄１ -->
                            <div class="form-group">
                                <h5 class="card-title">Kinou1.</h5>
                                <input class="form-control" name="kinou1" type="text" placeholder="<例> ユーザ登録が出来る。">
                            </div>
                            <!-- 機能詳細入力欄１ -->
                            <div class="form-group">
                                <h5 class="card-title">Syosai1.</h5>
                                <textarea class="form-control" name="syosai1" id="syosai" rows="3" placeholder="<例> ユーザ名・メールアドレス・パスワードを登録。&#13;&#10;登録が完了するとマイページに移動する。"></textarea>
                            </div>
                            <!-- 機能＋詳細の入力欄を追加する div -->
                            <div id="add-kinou"></div>
                            <!-- 現在の機能＋詳細の入力欄数 -->
                            <input type="hidden" name="kinou_num" id="kinou_num" value="1">
                            <!-- 機能＋詳細の入力欄を追加するボタン -->
                            <button type="button" class="btn btn-outline-primary" onclick="addKinou()">+ ADD</button>
                            <hr>

                            <!-- 理由入力欄 -->
                            <div class="form-group">
                                <h5 class="card-title">Why.</h5>
                                <textarea class="form-control" name="reason" id="why" rows="3"></textarea>
                            </div>
                            <hr>

                            <!-- 備考入力欄 -->
                            <div class="form-group">
                                <h5 class="card-title">Note.</h5>
                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                            </div>
                            <hr>

                            <!-- タグ入力 -->
                            <div class="form-group">
                                <h5 class="card-title">Tags.</h5>
                                <!-- 一行五列の枠を用意 -->
                                <div class="form-row">
                                    <!-- タグ入力欄１ -->
                                    <div class="col tags">
                                        <input class="form-control" name="tag1" type="text">
                                    </div>
                                    <!-- 四枠を用意 -->
                                    @for($i = 0; $i < 4; $i++)
                                    <div class="col tags">
                                    </div>
                                    @endfor
                                </div>
                                <!-- タグ入力行を追加する div -->
                                <div id="add-tags"></div>
                                <!-- 現在のタグ入力欄数 -->
                                <input type="hidden" name="tag_num" id="tag_num" value="1">
                                <!-- タグ入力欄を追加するボタン -->
                                <button type="button" class="btn btn-outline-primary" onclick="addTags()">+ ADD</button>
                            </div>
                            <hr>

                            <!-- 完了 or 下書き チェックボックス＋OKボタン -->
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
