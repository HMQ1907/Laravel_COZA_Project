@extends('admin.layoutAdmin')
@section('content')
    <div class="bootstrap-table">
        <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-header" style="display: none;">
                <table></table>
            </div>
            <div class="fixed-table-body">
                <table id="bootstrap-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="" data-field="id">
                                <div class="th-inner ">STT</div>
                            </th>
                            <th class="text-center" style="" data-field="name">
                                <div class="th-inner sortable both">Người mua hàng</div>
                            </th>
                            <th class="text-center" style="" data-field="salary">
                                <div class="th-inner sortable both">Email</div>
                            </th>
                            <th class="text-center" style="" data-field="country">
                                <div class="th-inner sortable both">SDT</div>
                            </th>
                            <th class="text-center" style="" data-field="city">
                                <div class="th-inner ">Địa chỉ</div>
                            </th>
                            <th class="text-center" style="" data-field="city">
                                <div class="th-inner ">Ghi chú</div>
                            </th>
                            <th class="text-center" style="" data-field="city">
                                <div class="th-inner ">Phương thức</div>
                            </th>
                            <th class="text-center" style="" data-field="city">
                                <div class="th-inner ">Tổng tiền</div>
                            </th>
                            <th class="td-actions text-right" style="" data-field="actions">
                                <div class="th-inner ">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 0;
                        @endphp
                        @foreach ($orders as $order_item)
                            <tr>
                                <td class="text-center" style="">{{ ++$stt }}</td>
                                <td style="">{{ $order_item->name }}</td>
                                <td style="">{{ $order_item->email }}</td>
                                <td style="">{{ $order_item->phone_number }}</td>
                                <td style="">{{ $order_item->address }}</td>
                                <td class="text-center" style="">{{ $order_item->note }}</td>
                                <td class="text-center" style="">{{ $order_item->payment_method }}</td>
                                <td class="text-center" style="">{{ $order_item->order_total }}</td>
                                <td class="td-actions text-right" style="">
                                    <a rel="tooltip" title="" class="btn btn-success table-action view"
                                        href="" data-original-title="View">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    <a rel="tooltip" title="" class="btn btn-warning table-action edit"
                                        href="{{ url('admin/order/edit/' . $order_item->id) }}"
                                        data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="fixed-table-footer" style="display: none;">
                <table>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--  {{ dd($orders) }}  --}}
@endsection
