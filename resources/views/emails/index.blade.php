@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['route'=>'emails.send','method'=>'post','class'=>'form-horizontal','role'=>'form','files'=>'true']) !!}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    @include('errors._errors')
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('to','收件人',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('to',null,['class'=>'form-control','placeholder'=>'收件人邮箱，多个邮箱以英文逗号分隔','type'=>'email']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('cc','抄送',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('cc',null,['class'=>'form-control','placeholder'=>'抄送邮箱，多个邮箱以英文逗号分隔','type'=>'email']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('subject','主题',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('subject',null,['class'=>'form-control','placeholder'=>'邮件主题']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('content','正文',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::textarea('content',null,['class'=>'form-control','id'=>'simditor']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    {!! Form::submit('发送',['class'=>'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection