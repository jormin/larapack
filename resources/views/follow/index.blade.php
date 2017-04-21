@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#followings" aria-controls="home" role="tab" data-toggle="tab">关注</a></li>
                    <li role="presentation"><a href="#followers" aria-controls="profile" role="tab" data-toggle="tab">粉丝</a></li>
                    <li role="presentation"><a href="#all" aria-controls="messages" role="tab" data-toggle="tab">全部用户</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active follow-wrap" id="followings">
                        @each('follow._list',$followings,'item')
                    </div>
                    <div role="tabpanel" class="tab-pane follow-wrap" id="followers">
                        @each('follow._list',$followers,'item')
                    </div>
                    <div role="tabpanel" class="tab-pane follow-wrap" id="all">
                        @each('follow._list',$all,'item')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection