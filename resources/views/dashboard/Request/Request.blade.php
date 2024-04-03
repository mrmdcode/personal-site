@extends('layouts.app')

@section('content')
    <div class="container ">
        @if(session("success"))
            <div class="alert alert-success">{{session("success")}}</div>
        @endif
            <div class="row">
                <div class="card">
                    <div class="card-header">Requests</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>subject</th>
                                <th>message</th>
                            </thead>
                            <tbody>
                            @php
                                $i =  0;
                            @endphp
                            @forelse($Requests as $request)
                                <tr title="{{$request->message}}">
                                    <td>{{$i++}}</td>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->email }}</td>
                                    <td>{{ $request->phone }}</td>
                                    <td>{{ $request->subject }}</td>
                                    <td>{{ \Illuminate\Support\Str::substr($request->message,0,15) }}</td>
                                </tr>
                            @empty
                                    <tr>
                                        <td colspan="6">nothing</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
