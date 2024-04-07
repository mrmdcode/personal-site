
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create RSP</h3>
                <a href="{{route('rsp.index')}}" class="btn btn-primary">RPS index</a>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('rsp.store')}}" method="post" class="row border-bottom pb-5 mb-5">
                    @csrf
                    @method("put")
                    <div class="form-group col-6" >
                        <label for="admin_user_id">owner</label>
                        <select class="form-control" name="admin_user_id" id="admin_user_id">

                            @forelse($user2s as $user)

                                    <option value="{{$user->id}}">{{$user->name}}</option>

                            @empty
                                <option >nothing</option>
                            @endforelse

                        </select>
                    </div>

                    {{--                             Name --}}
                    <div class="form-group col-6">
                        <label for="companyName">company Name</label>
                        <input class="form-control" type="text" name="companyName" id="companyName">
                    </div>
                    {{--                            Phone--}}
                    <div class="form-group col-6">
                        <label for="informationPhone">information Phone</label>
                        <input class="form-control" type="text" name="informationPhone" id="informationPhone">
                    </div>
                    {{--                            Instagram--}}
                    <div class="form-group col-6">
                        <label for="informationActivity">information Activity</label>
                        <input class="form-control" type="text" name="informationActivity" id="informationActivity">
                    </div>
                    {{--                            Telegram--}}
                    <div class="form-group col-6">
                        <label for="informationSmTel">information Social media Tel</label>
                        <input class="form-control" type="text" name="informationSmTel" id="informationSmTel">
                    </div>
                    {{--                            Rubika--}}
                    <div class="form-group col-6">
                        <label for="informationSmIns">information  Social media Ins</label>
                        <input class="form-control" type="text" name="informationSmIns" id="informationSmIns">
                    </div>
                    {{--                            Twitter--}}
                    <div class="form-group col-6">
                        <label for="informationSmWh">information Social media Wh</label>
                        <input class="form-control" type="text" name="informationSmWh" id="informationSmWh">
                    </div>


                    <div class="form-group col-6 mt-3  ">
                        <button class="btn btn-outline-success btn-block">add</button>
                    </div>
                </form >

            </div>
        </div>
    </div>

@endsection
