@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ Form::open(['route'=>'pinyin.convert','method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group">
                    {{ Form::label('text','文字',['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('text',null,['class'=>'form-control','cols'=>30,'rows'=>10]) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-5">
                        {{ Form::submit('转换拼音',['class'=>'btn btn-success']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection