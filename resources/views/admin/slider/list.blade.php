@extends('admin.layoutAdmin')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Danh sách slide</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Đường dẫn
                                </th>
                                <th>
                                    Hình ảnh
                                </th>
                                <th class="text-right">
                                    Sắp xếp
                                </th>
                                <th class="text-right">
                                    Kích hoạt
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        {{ $item->name }}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ $item->url }}">{{ $item->url }}</a>
                                    </td>
                                    <td>
                                        <img width="80px" src="{{ url($item->thumb) }}" alt="">
                                    </td>

                                    <td class="mr-5 text-right align-middle"">
                                        {{ $item->sort_by }}
                                    </td>
                                    <td class="text-right align-middle"">
                                        @if ($item->active == 1)
                                            <span class="badge badge-sm bg-gradient-success">Show</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">Hide</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ url('admin/slider/edit/' . $item->id) }}" class=" text-xs btn btn-info"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/slider/delete/' . $item->id) }}"
                                            class="btn btn-primary  text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
