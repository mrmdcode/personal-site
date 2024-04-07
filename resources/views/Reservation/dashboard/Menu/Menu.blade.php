@extends("Reservation.layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Categories</h4>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-6">
                       <table class="table text-center table-striped table-hover table-bordered">
                           <thead>
                           <th>#</th>
                           <th>name</th>
                           <th>action</th>
                           </thead>
                           <tbody>
                           @php $i = 1; @endphp
                           @forelse($category as $cate)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cate->name}}</td>
                                <td>
                                    <a href="#/{{$cate->id}}" class="btn btn-outline-warning">Edit</a>
                                    <a href="#/{{$cate->id}}" class="btn btn-outline-danger">delete</a>
                                </td>
                            </tr>
                           @empty
                               <tr>
                                   <td colspan="3"> nothing</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>
                       <span style="max-width: 80px">

                       {{$category->links()}}
                       </span>
                   </div>
                   <div class="col-6 p-4">
                       <form action="{{route('u2-menu-category.sote')}}" method="post" class="row">
                            @csrf

                           <div class="form-group ">
                               <label for="name" class="form-label">Name</label>
                               <input type="text" name="name" id="name"  class="form-control">
                           </div>

                           <div class="form-group mt-3">
                               <button class="btn btn-outline-success">create</button>
                           </div>
                       </form>
                   </div>
               </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Menus</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('u2-menu.store') }}" method="post" class="row my-5">
                    @csrf
                    <input type="hidden" name="rsp_id" value="{{auth()->user()->rsp->id}}">
                        {!! Form::create('text', 'name')
                            ->label('Name')
                            ->value('Barney')
                            ->required()
                            ->attr(['maxlenght' => '50', 'class' => "form-control"])
                            ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                        !!}
                        <div class="form-group col-md-4 col-sm-6">
                            <label for="">category</label>
                            <select name="category_id" id="" class="form-control">
                                @forelse($categories as $catego)
                                    <option value="{{$catego->id}}">{{$catego->name}}</option>
                                @empty
                                    <option> nothing</option>
                                @endforelse
                            </select>
                        </div>
                    <div class="form-group col-md-4 col-sm-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-success btn-block w-100">create</button>
                    </div>
                </form>


                <table class="w-100 text-center table table-bordered table-hover table-striped ">
                    <thead>
                        <th>#</th>
                        <th>name</th>
                        <th>category</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                    @php $n = 1; @endphp
                    @forelse($menus as $menu)

                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->category->name}}</td>
                            <td>
                                <a href="#" class="btn btn-outline-success">add item</a>
                                <a href="#" class="btn btn-outline-warning">edit</a>
                                <a href="#" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">nothing</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$menus->links()}}
            </div>
        </div>



    </div>
@endsection
@section('js')
@endsection
