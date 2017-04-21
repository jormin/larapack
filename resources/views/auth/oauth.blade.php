@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    {{ dd($user) }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection