
@extends("Reservation.layouts.app")

@section("content")

    <div class="container">

        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Table</h4>
            </div>
            <div class="card-body">
                <form action="{{route('u2-table.store')}}" method="post">
                    @csrf
                    <div class="row">
                        {!! Form::create('text', 'name')
                        ->label('Name : ')
                        ->value('table number 4 ')
                        ->required()
                        ->attr(['maxlenght' => '100', 'class' => "form-control"])
                        ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                        <div class="form-group col-sm-12 col-md-4 d-flex align-items-end">
                            <input type="submit" value="Create" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
                <div class="row my-5">
                    <table class="table table-striped table-hover table-bordered text-center">
                        <thead>
                            <th>#</th>
                            <th>name</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                        @forelse($tables as $table)
                            <tr>
                                <td>#</td>
                                <td>{{$table->name}}</td>
                                <td>
                                    <form method="post" class="d-inline-block" action="{{route('u2-table.destroy',$table->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </form>
                                    <a href="{{route('u2-table.times',$table->id)}}" class="btn btn-outline-warning">times</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="2">nothin</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
