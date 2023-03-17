@extends('admin.layoutAdmin')
@section('content')
    @include('admin.alert')
    @if (Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="content table-responsive table-full-width">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Trạng thái</th>
                    <th>Description</th>

                    <th>Danh mục</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Thumbnail</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 0;
                @endphp
                @foreach ($products as $item)
                    <tr>
                        <td class="align-middle text-center text-sm">
                            {{ ++$index }}
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            @if ($item->active == 1)
                                <span class="badge badge-sm bg-gradient-success">Show</span>
                            @else
                                <span class="badge badge-sm bg-gradient-danger">Hide</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <p class="text-xs font-weight-bold mb-0">{{ $item->description }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $item->menu_name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $item->price }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $item->discount }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <img width="90px" src="{{ url($item->thumb) }}" alt="">
                        </td>
                        <td class="align-middle">
                            <a href="{{ url('admin/product/edit/' . $item->id) }}" class=" text-xs btn btn-info"
                                data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="align-middle">
                            <a href="{{ url('admin/product/delete/' . $item->id) }}" class="btn btn-primary  text-xs"
                                data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
