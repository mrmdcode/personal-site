@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-9">
                @if(session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif


                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body"></div>
                </div>

            </div>
            <div class="col-3">
                @include("dashboard.LandingPage._partial._Aside")
            </div>
        </div>
    </div>

@endsection
