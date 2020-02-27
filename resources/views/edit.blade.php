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
                        <form action="{{ route('update') }}/{{ $report_data->id }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h5 class="card-title">Title.<font color="red">*</font></h5>
                                <input class="form-control" name="title" type="text" value="{{ $report_data->title }}">
                                @if ($errors->first('title'))
                                <p class="validation">※ {{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">What.<font color="red">*</font></h5>
                                <textarea class="form-control" name="what" id="what" rows="3">{{ $report_data->main }}</textarea>
                                @if ($errors->first('what'))
                                <p class="validation">※ {{$errors->first('what')}}</p>
                                @endif
                            </div>
                            <hr>

                            @if( count($kinou_data) == 0 )
                            <div class="form-group">
                                <h5 class="card-title">Kinou1.</h5>
                                <input class="form-control" name="kinou1" type="text" placeholder="<例> ユーザ登録が出来る。">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Syosai1.</h5>
                                <textarea class="form-control" name="syosai1" id="syosai" rows="3" placeholder="<例> ユーザ名・メールアドレス・パスワードを登録。&#13;&#10;登録が完了するとマイページに移動する。"></textarea>
                            </div>
                            @endif

                            @for( $i = 1; $i <= count($kinou_data); $i++ )
                            <div class="form-group">
                                <h5 class="card-title">Kinou{{ $i }}.</h5>
                                <input class="form-control" name="kinou{{ $i }}" type="text" placeholder="<例> ユーザ登録が出来る。" value="{{ $kinou_data[$i - 1]->fun }}">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Syosai{{ $i }}.</h5>
                                <textarea class="form-control" name="syosai{{ $i }}" id="syosai" rows="3" placeholder="<例> ユーザ名・メールアドレス・パスワードを登録。&#13;&#10;登録が完了するとマイページに移動する。">{{ $kinou_data[$i - 1]->fun_detail }}</textarea>
                            </div>
                            @endfor
                            <div id="add-kinou"></div>
                            <input type="hidden" name="kinou_num" id="kinou_num" value="{{ count($kinou_data) == 0 ? 1 : count($kinou_data) }}">
                            <button type="button" class="btn btn-outline-primary" onclick="addKinou()">+ ADD</button>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Why.</h5>
                                <textarea class="form-control" name="reason" id="why" rows="3">{{ $report_data->reason }}</textarea>
                            </div>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Note.</h5>
                                <textarea class="form-control" name="note" id="note" rows="3">{{ $report_data->note }}</textarea>
                            </div>
                            <hr>

                            <div class="form-group">
                                <h5 class="card-title">Tags.</h5>
                                @if( count($tags_data) == 0 )
                                <div class="form-row">
                                    <div class="col tags">
                                        <input class="form-control" name="tag1" type="text">
                                    </div>
                                    @for($i = 0; $i < 4; $i++)
                                    <div class="col tags">
                                    </div>
                                    @endfor
                                </div>
                                @endif

                                @for( $i = 1; $i <= count($tags_data); $i++ )
                                    @if( $i % 5 == 1 )
                                    <div class="form-row">
                                    @endif

                                    <div class="col tags">
                                        <input class="form-control" name="tag{{ $i }}" type="text" value="{{ $tags_data[$i - 1]->tag->main }}">
                                    </div>

                                    @if( $i % 5 == 0 )
                                    </div>
                                    @endif
                                @endfor

                                @if( count($tags_data) % 5 != 0 )
                                    @for($i = 0; $i < (5 - count($tags_data) % 5); $i++)
                                    <div class="col tags">
                                    </div>
                                    @endfor
                                    </div>
                                @endif
                                <div id="add-tags"></div>
                                <input type="hidden" name="tag_num" id="tag_num" value="{{ count($tags_data) == 0 ? 1 : count($tags_data) }}">
                                <button type="button" class="btn btn-outline-primary" onclick="addTags()">+ ADD</button>
                            </div>
                            <hr>

                            <div class="alignright">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="release" class="custom-control-input" id="customSwitch1" onchange="changeBox()" {{ $report_data->release ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch1" id="release">{{ $report_data->release ? '完成' : '下書き' }}</label>
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
