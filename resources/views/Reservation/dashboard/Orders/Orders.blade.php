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
                                                    <li>{{$itesm->pivot->qty}} عدد {{$itesm->name}}</li>

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
                                    @if($item->status != 'accepted' && $item->status != 'cancelled' )
                                        <a href="{{route('u2-orders.accept',$item->id)}}" class="btn btn-success text-light">ثبت</a>
                                    @endif
                                    @if($item->status != 'cancelled')
                                        <a href="{{route('u2-orders.cancelled',$item->id)}}" class="btn btn-danger text-light" >کنسل</a>
                                        <button class="btn btn-secondary text-light" onclick="editOrder({{$item->id}})">ویرایش</button>
                                    @endif
{{--                                    @if() @endif--}}
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

        <div class="modal fade" id="edit_order" tabindex="-1" aria-labelledby="edit_order_title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="edit_order_title">ویرایش سفارش</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        سلام مدال
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">بستن</button>
                        <button type="button" class="btn btn-primary text-white">ذخیره تغییرات</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const itemQtyAdd = (id) => {
            console.log()
            $(`#${id}`).val(
                parseInt($(`#${id}`).val()) + 1
            )
        }

        const itemQtyRem = (id) => {
            if (parseInt($(`#${id}`).val()) <=  1 ){
                if ($(`#${id}`).parent().children(0)[0].innerHTML == 'حذف'){
                    $(`#${id}`).parent().parent().remove()
                }
                else{
                    $(`#${id}`).parent().children(0)[0].innerHTML = 'حذف';
                }
            }
            else {
                $(`#${id}`).val(
                    parseInt($(`#${id}`).val()) - 1
                )
            }
        }

        const editOrder =async (id) => {
            const initForm = (data) => {
                let elementForm = '';
                data.map((item)=>{
                    console.log(item)
                    elementForm += `
                        <div class="row" id="itemorder_${item.id}">
                            <div class='col-md-8'>
                                <sapn id="orderItemEdit_${item.id}_name">${item.name}</sapn>
                            </div>
                            <div class='col-md-4 d-flex'>
                                <button onclick="itemQtyRem('orderItemEdit_${item.id}_qty')" class="remBtn btn btn-warning">-</button>
                                <input type="number" name="orderItemEdit_${item.id}_qty" id="orderItemEdit_${item.id}_qty" value="${item.pivot.qty}" style="background-color: transparent;border: none;width: 25px">
                                <button onclick="itemQtyAdd('orderItemEdit_${item.id}_qty')" class='btn btn-success'>+</button>
                            </div>
                        </div>
                        <br>
                    `
                })
              return `
                <form id="orderFormEdit" ">
                    ${elementForm}
                </form>
              `
            }
            let response = await fetch(`u2-orders/${id}/edit`)
            let responseJson = await response.json();
            let order = responseJson.order
            $('#edit_order .modal-title').html(`سفارش ${order.customer_name} به شماره فاکتور ${order.id}`);

            $('#edit_order .modal-body').html(initForm(order.rs_menu_items));
            $('#edit_order').modal('show');
            $('#orderFormEdit').submit((e)=>{
                e.preventDefault()
            });

        }
    </script>
@endsection
