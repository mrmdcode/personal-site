@extends('layouts.app')

@section('content')
    <div class="container ">
        @if(session("success"))
            <div class="alert alert-success">{{session("success")}}</div>
        @endif
        <div class="row">
            <form class="col-9" method="post" action="{{route("Setting.update",1)}}" enctype="multipart/form-data">
                @csrf
                @method("put")
{{--                row 1--}}
                <div class="row">
                    <div class="form-group col-6">
                        <label for="title" class="form-label">title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $setting->title }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="myName" class="form-label">myName</label>
                        <input class="form-control" type="text" name="myName" id="myName" value="{{ $setting->myName }}"/>
                    </div>
                </div>
{{--                row 2--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="myPosition" class="form-label">myPosition</label>
                        <input class="form-control" type="text" name="myPosition" id="myPosition" value="{{ $setting->myPosition }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="metaKeyword" class="form-label">metaKeyword</label>
                        <input class="form-control" type="text" name="metaKeyword" id="metaKeyword" value="{{ $setting->metaKeyword }}"/>
                    </div>
                </div>
{{--                row 3--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="metaDescription" class="form-label">metaDescription</label>
                        <input class="form-control" type="text" name="metaDescription" id="metaDescription" value="{{ $setting->metaDescription }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="metaAuthor" class="form-label">metaAuthor</label>
                        <input class="form-control" type="text" name="metaAuthor" id="metaAuthor" value="{{ $setting->metaAuthor }}"/>
                    </div>
                </div>
                {{--                row 4--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="metaCopyright" class="form-label">metaCopyright</label>
                        <input class="form-control" type="text" name="metaCopyright" id="metaCopyright" value="{{ $setting->metaCopyright }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="metaRobots" class="form-label">metaRobots</label>
                        <input class="form-control" type="text" name="metaRobots" id="metaRobots" value="{{ $setting->metaRobots }}"/>
                    </div>
                </div>
                {{--                row 5--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="metaLang" class="form-label">metaLang</label>
                        <input class="form-control" type="text" name="metaLang" id="metaLang" value="{{ $setting->metaLang }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="metaVoTitle" class="form-label">metaVoTitle</label>
                        <input class="form-control" type="text" name="metaVoTitle" id="metaVoTitle" value="{{ $setting->metaVoTitle }}"/>
                    </div>
                </div>
                {{--                row 6--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="metaVoDescription" class="form-label">metaVoDescription</label>
                        <input class="form-control" type="text" name="metaVoDescription" id="metaVoDescription" value="{{ $setting->metaVoDescription }}"/>
                    </div>
                    <div class="form-group col-6">
                        <label for="metaVoType" class="form-label">metaVoType</label>
                        <input class="form-control" type="text" name="metaVoType" id="metaVoType" value="{{ $setting->metaVoType }}"/>
                    </div>
                </div>
                {{--                row 7--}}
                <div class="row mt-2">
                    <div class="form-group col-6">
                        <label for="metaVoUrl" class="form-label">metaVoUrl</label>
                        <input class="form-control" type="text" name="metaVoUrl" id="metaVoUrl" value="{{ $setting->metaVoUrl }}"/>
                    </div>

                </div>
                {{--                row 7--}}
                <div class="row mt-2">
                    <div class="form-group col-4">
                        <label for="metaVoImage" class="form-label">metaVoImage</label>
                        <br>
                        <input class="form-control-file" type="file" name="metaVoImage" id="metaVoImage"/>
                    </div>
                    <div class="form-group col-4">
                        <label for="myPic" class="form-label">myPic</label>
                        <br>
                        <input class="form-control-file" type="file" name="myPic" id="myPic"/>
                    </div>
                    <div class="form-group col-4">
                        <label for="icon" class="form-label">icon</label>
                        <br>
                        <input class="form-control-file" type="file" name="icon" id="icon"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 p-2">
                        <img src="@php $pathArr = explode("/",$setting->metaVoImage);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="metaVoImage" class="w-100">
                    </div>
                    <div class="col-4 p-2">
                        <img src="@php $pathArr = explode("/",$setting->myPic);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="myPic" class="w-100">
                    </div>
                    <div class="col-4 p-2">
                        <img src="@php $pathArr = explode("/",$setting->icon);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="icon" class="w-100">
                    </div>
                </div>
                <div class="row mt-2 justify-content-center mt-5">
                    <div class="form-group col-9">
                        <button type="submit" class="btn btn-outline-primary col-12">Save !</button>
                    </div>
                </div>
            </form>
            <div class="col-3">
                @include("dashboard.Setting._partial._Aside")
            </div>
        </div>
    </div>
@endsection
