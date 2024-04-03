@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
                @if(session("status"))
                    <div class="alert alert-success">{{session("status")}}</div>
                @endif


                <div class="card">
                    <div class="card-header">Works</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('Panel_nfc.store')}}" method="post" class="row border-bottom pb-5 mb-5">
                            @csrf

{{--                             Name --}}
                            <div class="form-group col-6">
                                <label for="Name">Name</label>
                                <input class="form-control" type="text" name="Name" id="Name">
                            </div>
{{--                            Phone--}}
                            <div class="form-group col-6">
                                <label for="Phone">Phone</label>
                                <input class="form-control" type="text" name="Phone" id="Phone">
                            </div>
{{--                            Instagram--}}
                            <div class="form-group col-6">
                                <label for="Instagram">Instagram</label>
                                <input class="form-control" type="text" name="Instagram" id="Instagram">
                            </div>
{{--                            Telegram--}}
                            <div class="form-group col-6">
                                <label for="Telegram">Telegram</label>
                                <input class="form-control" type="text" name="Telegram" id="Telegram">
                            </div>
{{--                            Rubika--}}
                            <div class="form-group col-6">
                                <label for="Rubika">Rubika</label>
                                <input class="form-control" type="text" name="Rubika" id="Rubika">
                            </div>
{{--                            Twitter--}}
                            <div class="form-group col-6">
                                <label for="Twitter">Twitter</label>
                                <input class="form-control" type="text" name="Twitter" id="Twitter">
                            </div>
{{--                            WhatsApp--}}
                            <div class="form-group col-6">
                                <label for="WhatsApp">WhatsApp</label>
                                <input class="form-control" type="text" name="WhatsApp" id="WhatsApp">
                            </div>
{{--                            Linkedin--}}
                            <div class="form-group col-6">
                                <label for="Linkedin">Linkedin</label>
                                <input class="form-control" type="text" name="Linkedin" id="Linkedin">
                            </div>
{{--                            Website--}}
                            <div class="form-group col-6">
                                <label for="Website">Website</label>
                                <input class="form-control" type="text" name="Website" id="Website">
                            </div>
                            <div class="form-group col-6" >
                                <label for="Theme">Theme</label>
                                <select class="form-control" name="Theme" id="Theme">
                                    <option value="temp_1">temp 1</option>
                                    <option value="temp_2">temp 2</option>
                                    <option value="temp_3">temp 3</option>
                                    <option value="temp_4">temp 4</option>

                                </select>
                            </div>
                            <div class="form-group col-6 ">
                                <label for="Image">Image</label><br>
                                <input class="form-control" type="file" name="Image" id="Image">
                            </div>
                            <div class="form-group col-6 mt-3 ">
                                <button class="btn btn-outline-success ">add</button>
                            </div>
                        </form >
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>key<br>Name<br>Phone</th>
                            {{--+++++++++++ --}}
                            <th>Instagram</th>
                            <th>Telegram</th>
                            <th>Rubika</th>
                            <th>Twitter</th>
                            <th>WhatsApp</th>
                            <th>Linkedin</th>
                            <th>Website</th>
                            <th>Theme</th>
                            <th>option</th>

                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @forelse($nfcs as $nfc)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <img src="@php $pathArr = explode("/",$nfc->Image);$newPath = array_pop($pathArr) ;echo asset("storage/nfc/Images/".$newPath); @endphp" alt="" width="150px" height="auto">
                                    </td>
                                    <td>
                                        {{$nfc->key}}
                                        <br>
                                        <br>
                                        {{$nfc->Name}}
                                        <br>
                                        <br>
                                        {{$nfc->Phone}}
                                    </td>
                                    <td title="{{$nfc->Instagram}}">
                                        {{$nfc->Instagram?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->Telegram}}">
                                        {{$nfc->Telegram?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->Rubika}}">
                                        {{$nfc->Rubika?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->Twitter}}">
                                        {{$nfc->Twitter?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->WhatsApp}}">
                                        {{$nfc->WhatsApp?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->Linkedin}}">
                                        {{$nfc->Linkedin?"✅":"❌"}}
                                    </td>
                                    <td title="{{$nfc->Website}}">
                                        {{$nfc->Website?"✅":"❌"}}
                                    </td>
                                    <td>
                                        {{$nfc->Theme}}
                                    </td>
                                    <td>
                                        <a href="{{ route("Panel_nfc.delete",$nfc->id) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route("Panel_nfc.edit",$nfc->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="" class="btn btn-secondary">go</a>
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
    </div>

@endsection

