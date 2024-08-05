@extends("Reservation.Layouts.app")
@section("content")
    <div class="card bg-white border-0 mt-5">
        <div class="card-body">

            <h4 class="mt-0 header-title">سفارش ها </h4>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            <div class="default-table-area recent-orders">
                <div class="table-responsive">
                    <table class="table table-striped mb-0 align-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام مشتری</th>
                            <th>شماره میز</th>
                            <th>سفارش گیرنده</th>
                            <th>مبلغ سفارش</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @forelse($items as $item)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$item->customer_name}}</td>
                                <td>{{$item->rs_table->name}}</td>
                                <td>{{$item->order_taker->name}}</td>
                                <td>452</td>
                                <td>
                                    @switch($item->status)
                                        @case('pending')
                                            <span class="text-warning">در انتظار ثبت </span>
                                        @break

                                        @case('accepted')
                                            <span class="text-success">ثبت شده</span>
                                        @break

                                        @case('rejected')
                                            <span class="text-danger">رد شد</span>
                                        @break

                                        @case('cancelled')
                                            <span class="text-danger">کنسل شد</span>
                                        @break
                                   @endswitch
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"    >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">لیست سفارش ها</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <ul>

                                                @foreach($item->rs_menu_items as $itesm)
                                                    <li>{{$itesm->pivot->qty}} عدد از {{$itesm->name}}</li>
                                                    <li></li>
                                                @endforeach
                                                </ul>
                                            </div>


                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <td>
                                    <button type="button" class="btn btn btn-warning py-2 px-4 text-white fw-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$item->id}}">
                                        نمایش
                                    </button>
                                    <button class="btn btn-success text-light">ثبت</button>
                                    <button class="btn btn-danger text-light">کنسل</button>
                                    <button class="btn btn-secondary text-light">رد</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">دیتا نا موجود</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

