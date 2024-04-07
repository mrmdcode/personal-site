
@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            @if(session("status"))
                <div class="alert alert-success">{{session("status")}}</div>
            @endif


            <div class="card p-0">
                <div class="card-header d-flex justify-content-between">
                    <h3>RSP Panel</h3>
                    <a href="{{route("rsp.create")}}" class="btn btn-outline-success">Add</a>
                </div>
                <div class="card-body">
                       <table class="table table-bordered table-striped text-center">
                        <thead>
                        <th>#</th>
                        <th>owner</th>
                        <th>name</th>
                        {{--+++++++++++ --}}
                        <th>Phone</th>
                        <th>Activity</th>
                        <th>Instagram</th>
                        <th>Telegram</th>
                        <th>WhatsApp</th>
                        <th>option</th>

                        </thead>
                        <tbody>
                            @php $i = 1;@endphp
                        @forelse($rsps as $rsp)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$rsp->user->name}}</td>
                                <td>{{$rsp->companyName}}</td>
                                <td>{{$rsp->informationPhone}}</td>
                                <td>{{$rsp->informationActivity}}</td>
                                <td>{{$rsp->informationSmTel}}</td>
                                <td>{{$rsp->informationSmIns}}</td>
                                <td>{{$rsp->informationSmWh}}</td>
                                <td>
                                    <a href="{{route("rsp.edit",$rsp->id)}}" class="btn btn-outline-warning">Edit</a>
                                    <a href="#" onclick="document.getElementById('del-form').submit()" class="btn btn-outline-danger">Delete</a>
                                    <form action="{{route("rsp.destroy",$rsp->id)}}" method="post" id="del-form">
                                        @csrf
                                        @method("delete")
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr> <td colspan="7">nothing</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection

