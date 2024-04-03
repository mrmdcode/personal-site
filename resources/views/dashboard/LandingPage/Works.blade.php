@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-9">
                @if(session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif


                <div class="card">
                    <div class="card-header">Works</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route("Work.store") }}" method="post" class="row border-bottom pb-5 mb-5">
                            @csrf
                            <div class="form-group col-6">
                                <label for="title">title</label>
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                            <div class="form-group col-6" >
                                <label for="type">type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="web_application">Web Application</option>
                                    <option value="panels">Panel</option>
                                    <option value="exercise">Exercise</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group col-6 mt-2">
                                <label for="image">image</label>
                                <br>
                                <input class="form-control-file" type="file" name="image" id="image">
                            </div>
                            <div class="form-group col-6">
                                <label for="linkedin">linkedin</label>
                                <input class="form-control" type="text" name="linkedin" id="linkedin">
                            </div>
                            <div class="form-group col-6 mt-3 ">
                                <button class="btn btn-outline-success ">add</button>
                            </div>
                        </form >
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <th>#</th>
                                <th>title</th>
                                <th>type</th>
                                <th>image</th>
                                <th>delete</th>
                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                                @forelse($works as $work)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $work->title }}</td>
                                        <td>{{ $work->type }}</td>
                                        <td>
                                            <img src="@php $pathArr = explode("/",$work->image);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="" width="150px" height="auto">
                                        </td>
                                        <td>
                                            <a href="{{ route("Work.destroy",$work->id ) }}" class="btn btn-danger">Delete</a>
                                            <a href="{{$work->linkedin}}" class="btn btn-primary">Go</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">nothing</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-3">
                @include("dashboard.LandingPage._partial._Aside")
            </div>
        </div>
    </div>

@endsection
