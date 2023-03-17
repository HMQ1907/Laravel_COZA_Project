@extends('admin.layoutAdmin')
@section('content')
    {{--  @php
        echo '<pre>';
        print_r($orderDetail);
        echo '</pre>';
    @endphp  --}}
    {{--  {{ dd($orderDetail) }}  --}}
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th scope="col" class="sort" data-sort="name">Thumb</th>
                    <th scope="col" class="sort" data-sort="budget">Sản phẩm</th>
                    <th scope="col" class="sort" data-sort="status">Trạng thái</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col" class="sort" data-sort="completion">Thành tiền</th>
                    <th> Ngày mua </th>
                </tr>
            </thead>
            <tbody class="list">
                @php
                    $index = 0;
                @endphp
                @foreach ($orderDetail as $item)
                    <tr>
                        <th class="text-center">
                            {{ ++$index }}
                        </th>
                        <th scope="row">
                            <div class="media align-items-center">
                                <img width="70px" alt="Image placeholder" src="{{ asset($item->product_thumb) }}">
                            </div>
                        </th>
                        <td class="budget">
                            {{ $item->product_name }}
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">{{ $item->status }}</span>
                        </td>
                        <td class="text-center">
                            <p>{{ $item->qty }}</p>
                        </td>
                        <td class="text-center">
                            <p>${{ number_format($item->price) }}</p>
                        </td>
                        <td class="text-center">
                            <p> ${{ number_format($item->qty * $item->price) }}</p>
                        </td>
                        <td>
                            <p>{{ $item->order_time }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
