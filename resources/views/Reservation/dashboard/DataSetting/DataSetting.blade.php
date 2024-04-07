@extends("Reservation.layouts.app")

@section("content")
    <form action="{{route('u2-storeLPD')}}" method="post"  class="container" enctype="multipart/form-data">
            @csrf
        <div class="card mb-5">
            <div class="card-header">
                <h4>
                    Shop Information
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {!! Form::create('text', 'address')
                         ->label('Company Adess : ')
                         ->value($rsptd->address)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="icon">Section 5 Image</label>
                            <input type="file" name="icon" id="icon" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <img src="{{$rsptd->icon}}" alt="icon" class="col-md-3 offset-6">
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>
                    Site Data
                </h4>
            </div>
            <div class="card-body">

                {{--          primitive      --}}
                <div class="row my-5">

                    {!! Form::create('text', 'title')
                         ->label('Site Title : ')
                         ->value($rsptd->title)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}

                    {!! Form::create('text', 'name')
                         ->label('Company Name : ')
                         ->value($rsptd->name)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}
                </div>


                {{--          slider      --}}
                <div class="row my-5">

                {!! Form::create('text', 'slider_t')
                     ->label('Slider Title : ')
                     ->value($rsptd->slider_t)
                     ->required()
                     ->attr(['maxlenght' => '50','class'=>"form-control"])
                     ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                !!}

                {!! Form::create('textarea', 'slider_d')
                     ->label('Slider Description : ')
                     ->value($rsptd->slider_d)
                     ->required()
                     ->attr(['maxlenght' => '50','class'=>"form-control"])
                     ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                !!}
                </div>

                {{--          Section 1      --}}
                <div class="row my-5">
                    {!! Form::create('text', 'sec_1_t')
                      ->label('Section 1 title : ')
                      ->value($rsptd->sec_1_t)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-3 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'sec_1_m')
                      ->label('Section 1 mute : ')
                      ->value($rsptd->sec_1_m)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-3 col-sm-6'])
                    !!}


                    {!! Form::create('textarea', 'sec_1_d')
                     ->label('Section 1 Detail : ')
                     ->value($rsptd->sec_1_d)
                     ->required()
                     ->attr(['minlenght' => '190','maxlenght' => '190','class'=>"form-control"])
                     ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                  !!}
                </div>

                {{--          Section 2      --}}
                <div class="row mt-5 mb-4">
                    {!! Form::create('text', 'sec_2_p_1_t')
                      ->label('Section 2 part 1 : ')
                      ->value($rsptd->sec_2_p_1_t)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'sec_2_p_2_t')
                      ->label('Section 2 part 2 : ')
                      ->value($rsptd->sec_2_p_2_t)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'sec_2_p_3_t')
                      ->label('Section 2 part 3 : ')
                      ->value($rsptd->sec_2_p_3_t)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                </div>
                <div class="row mb-5">
                    {!! Form::create('textarea', 'sec_2_p_1_d')


                       ->value($rsptd->sec_2_p_1_d)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('textarea', 'sec_2_p_2_d')


                       ->value($rsptd->sec_2_p_2_d)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                    {!! Form::create('textarea', 'sec_2_p_3_d')

                      ->value('This is test text')
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-4 col-sm-6'])
                    !!}
                </div>

                {{--          Section 3      --}}
                <div class="row my-5">

                    {!! Form::create('text', 'sec_3_t')
                         ->label('Section 3 title : ')
                         ->value($rsptd->sec_3_t)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}

                    {!! Form::create('text', 'sec_3_m')
                         ->label('Section 3 mute : ')
                         ->value($rsptd->sec_3_m)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}
                </div>
                {{--          Section 4      --}}
                <div class="row my-5">

                    {!! Form::create('text', 'sec_4_t')
                         ->label('Section 4 title : ')
                         ->value($rsptd->sec_4_t)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}

                    {!! Form::create('text', 'sec_4_m')
                         ->label('Section 4 mute : ')
                         ->value($rsptd->sec_4_m)
                         ->required()
                         ->attr(['maxlenght' => '50','class'=>"form-control"])
                         ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                    !!}
                </div>
                {{--          Section 5      --}}
                <div class="row mt-5">
                    {!! Form::create('text', 'sec_5_t')
                      ->label('Section 5 title : ')
                      ->value($rsptd->sec_5_t)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-3 col-sm-6'])
                    !!}
                    {!! Form::create('text', 'sec_5_m')
                      ->label('Section 5 mute : ')
                      ->value($rsptd->sec_5_m)
                      ->required()
                      ->attr(['maxlenght' => '50','class'=>"form-control"])
                      ->wrapperAttr(['class' => 'form-group col-md-3 col-sm-6'])
                    !!}


                    {!! Form::create('textarea', 'sec_5_d')
                     ->label('Section 5 Detail : ')
                     ->value($rsptd->sec_5_d)
                     ->required()
                     ->attr(['minlenght' => '190','maxlenght' => '190','class'=>"form-control"])
                     ->wrapperAttr(['class' => 'form-group col-md-6 col-sm-12'])
                  !!}
                </div>

                <div class="row my-5">
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="form-label" for="s_1_i">Section 1 Image</label>
                        <input type="file" name="s_1_i" id="s_1_i" class="form-control">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="form-label" for="s_2_i">Section 2 Image</label>
                        <input type="file" name="s_2_i" id="s_2_i" class="form-control">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="form-label" for="s_3_i">Section 3 Image</label>
                        <input type="file" name="s_3_i" id="s_3_i" class="form-control">
                    </div>
                </div>

                <div class="row mb-5">
                    <img src="" alt="section 1" class="col-md-4">
                    <img src="#sss" alt="section 2" class="col-md-4 w-100">
                    <img src="#sss" alt="section 3" class="col-md-4 w-100">
                </div>

                <div class="row my-5">
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="form-label" for="s_4_i">Section 4 Image</label>
                        <input type="file" name="s_4_i" id="s_14i" class="form-control">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="form-label" for="s_5_i">Section 5 Image</label>
                        <input type="file" name="s_5_i" id="s_5_i" class="form-control">
                    </div>
                </div>

                <div class="row mb-5">
                    <img src="" alt="section 4" class="col-md-4">
                    <img src="#sss" alt="section 5" class="col-md-4 w-100">
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-outline-success col-md-4 col-sm-12">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
