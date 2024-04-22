@extends("Reservation.layouts.app")

@section("content")

    <div class="container">

        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Menus Item </h4>
            </div>
            <div class="card-body">

                <form action="{{ route('u2-menuItem.store') }}" method="post" class="row my-5">
                    @csrf
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="r_s_menu_id">Menu </label>
                        <select name="r_s_menu_id" id="r_s_menu_id" class="form-control">
                            @forelse($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @empty
                                <option>First create menu</option>
                            @endforelse
                        </select>
                    </div>
                    {!! Form::create('text', 'name')
                        ->label('Name : ')
                        ->value('espresso')
                        ->required()
                        ->attr(['maxlenght' => '50', 'class' => "form-control"])
                        ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'description')
                        ->label('Description : ')
                        ->value('This is test decription about espresso')
                        ->required()
                        ->attr(['maxlenght' => '150', 'class' => "form-control"])
                        ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'price')
                        ->label('Price : ')
                        ->placeholder('150,000,000')
                        ->required()
                        ->attr(['maxlenght' => '50', 'class' => "form-control"])
                        ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6  my-3'])
                    !!}

                    <div class="form-group col-md-4 col-sm-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-success btn-block w-100">create</button>
                    </div>
                </form>


                <table class="w-100 text-center table table-bordered table-hover table-striped ">
                    <thead>
                    <th>#</th>
                    <th>menu</th>
                    <th>name</th>
                    <th>description</th>
                    <th>price</th>
                    <th>action</th>
                    </thead>
                    <tbody>
                    @php $n = 1; @endphp
                    @forelse($menuItems as $menuItem)

                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$menuItem->rs_menu->name}}</td>
                            <td>{{$menuItem->name}}</td>
                            <td>{{$menuItem->description}}</td>
                            <td>{{$menuItem->price}}</td>
                            <td>
                                <form action="{{route('u2-menuItem.destroy',$menuItem->id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <input type="submit" value="Dalete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">nothing</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
{{--                {{$menus->links()}}--}}
            </div>
        </div>



    </div>
@endsection
@section('js')
@endsection

