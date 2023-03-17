@extends('admin.layoutAdmin')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-light" role="alert">
            {{ session('success') }}
        </div>
    @else
    @endif
    <div _ngcontent-vtt-c8="" class="card">
        <div _ngcontent-vtt-c8="" class="card-header card-header-danger">
            <h4 _ngcontent-vtt-c8="" class="card-title ">Simple Table</h4>
            <p _ngcontent-vtt-c8="" class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div _ngcontent-vtt-c8="" class="card-body">
            <div _ngcontent-vtt-c8="" class="table-responsive">
                <table _ngcontent-vtt-c8="" class="table">
                    <thead _ngcontent-vtt-c8="" class=" text-primary">
                        <th _ngcontent-vtt-c8=""> ID </th>
                        <th _ngcontent-vtt-c8=""> Name </th>
                        <th _ngcontent-vtt-c8=""> Active </th>
                        <th _ngcontent-vtt-c8=""> Update </th>
                        <th _ngcontent-vtt-c8=""> ID menu trên cấp </th>
                        <th _ngcontent-vtt-c8=""> &nbsp; </th>
                    </thead>
                    <tbody _ngcontent-vtt-c8="">
                        {{--  {!! \App\Helpers\helper::menu($menus) !!}  --}}
                        @foreach ($menus as $menu)
                            <tr _ngcontent-vtt-c8="">
                                <td class="text-center" _ngcontent-vtt-c8=""> {{ $menu->id }} </td>
                                <td class="text-center" _ngcontent-vtt-c8=""> {{ $menu->name }} </td>
                                <td class="text-center" _ngcontent-vtt-c8="">
                                    @if ($menu->active == 1)
                                        <span class="badge badge-sm bg-gradient-success">Show</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-danger">JHide</span>
                                    @endif
                                </td>
                                <td class="text-center" _ngcontent-vtt-c8=""> {{ $menu->updated_at }} </td>
                                <td class="text-center" _ngcontent-vtt-c8=""> {{ $menu->parent_id }} </td>
                                <td class="text-center" _ngcontent-vtt-c8="" class="text-primary">
                                    <a class="btn btn-info" href="{{ url('admin/menu/edit/' . $menu->id) }}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="btn btn-primary" href="{{ url('admin/menu/delete/' . $menu->id) }}"><i
                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
