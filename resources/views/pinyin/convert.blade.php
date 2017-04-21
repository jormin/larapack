@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3>待转换文字</h3>
                <textarea class="form-control" readonly>{{ $text }}</textarea>
                @foreach($data as $key => $val)
                    <h3>{{ $key }}</h3>
                    <textarea class="form-control" readonly>{{ $val }}</textarea>
                @endforeach
            </div>
        </div>
    </div>
@endsection