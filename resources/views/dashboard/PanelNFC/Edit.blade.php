@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
                @if(session("status"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif


                <div class="card">
                    <div class="card-header">Works</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('Panel_nfc.update',$nfc->id)}}" method="post" class="row border-bottom pb-5 mb-5">
                            @csrf
                            @method("put")
{{--                             Name --}}
                            <div class="form-group col-6">
                                <label for="Name">Name</label>
                                <input class="form-control" type="text" name="Name" value="{{$nfc->Name}}" id="Name">
                            </div>
{{--                            Phone--}}
                            <div class="form-group col-6">
                                <label for="Phone">Phone</label>
                                <input class="form-control" type="text" name="Phone" value="{{$nfc->Phone}}" id="Phone">
                            </div>
{{--                            Instagram--}}
                            <div class="form-group col-6">
                                <label for="Instagram">Instagram</label>
                                <input class="form-control" type="text" name="Instagram" value="{{$nfc->Instagram}}" id="Instagram">
                            </div>
{{--                            Telegram--}}
                            <div class="form-group col-6">
                                <label for="Telegram">Telegram</label>
                                <input class="form-control" type="text" name="Telegram" value="{{$nfc->Telegram}}" id="Telegram">
                            </div>
{{--                            Rubika--}}
                            <div class="form-group col-6">
                                <label for="Rubika">Rubika</label>
                                <input class="form-control" type="text" name="Rubika" value="{{$nfc->Rubika}}" id="Rubika">
                            </div>
{{--                            Twitter--}}
                            <div class="form-group col-6">
                                <label for="Twitter">Twitter</label>
                                <input class="form-control" type="text" name="Twitter" value="{{$nfc->Twitter}}" id="Twitter">
                            </div>
{{--                            WhatsApp--}}
                            <div class="form-group col-6">
                                <label for="WhatsApp">WhatsApp</label>
                                <input class="form-control" type="text" name="WhatsApp" value="{{$nfc->WhatsApp}}" id="WhatsApp">
                            </div>
{{--                            Linkedin--}}
                            <div class="form-group col-6">
                                <label for="Linkedin">Linkedin</label>
                                <input class="form-control" type="text" name="Linkedin" value="{{$nfc->Linkedin}}" id="Linkedin">
                            </div>
{{--                            Website--}}
                            <div class="form-group col-6">
                                <label for="Website">Website</label>
                                <input class="form-control" type="text" name="Website" value="{{$nfc->Website}}" id="Website">
                            </div>
                            <div class="form-group col-6" >
                                <label for="Theme">Theme</label>
                                <select class="form-control" name="Theme" id="Theme">
                                    <option value="temp_1" @if('Theme' == 'temp_1') selected @endif>temp 1</option>
                                    <option value="temp_2" @if('Theme' == 'temp_2') selected @endif>temp 2</option>
                                    <option value="temp_3" @if('Theme' == 'temp_3') selected @endif>temp 3</option>
                                    <option value="temp_4" @if('Theme' == 'temp_4') selected @endif>temp 4</option>

                                </select>
                            </div>
                            <div class="form-group col-6 mt-3 ">
                                <button class="btn btn-outline-primary" type="submit">update</button>
                            </div>
                        </form >
                    </div>
                </div>

            </div>
    </div>

@endsection

