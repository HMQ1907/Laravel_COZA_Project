@extends('admin.layoutAdmin')
@section('content')
    <div class="col-md-8">
        <div class="card">
            @include('admin.alert')
            @if (Session::has('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header">
                <h5 class="title">Create</h5>
            </div>
            <form method="post" enctype="multipart/form-data" action="{{ url('admin/menu/edit/store/' . $menuEdit->id) }}"
                autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="menu">Name</label>
                        <input id="menu" value="{{ $menuEdit->name }}" type="text" name="name"
                            class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="menu">Ten danh muc</label>
                        <select name="parent_id" id="" class="custom-select">
                            <option value="{{ $menuEdit->parent_id }}">Danh muc cha</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}"
                                    {{ $menu->id == $menuEdit->parent_id ? 'selected' : '' }}>
                                    {{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" value="{{ $menuEdit->description }}" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" cols="20" rows="10" class="form-control">{!! $menuEdit->content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input value="1" name="active" id="active" type="radio" class="custom-control-input">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="0" name="active" id="no_active" type="radio" class="custom-control-input">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Avatar menu</label>
                        <input name="avt_menu" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    @if ($menuEdit->avt_menu != null)
                        <img height="400px" class="mt-3" src="{{ url($menuEdit->avt_menu) }}" alt="">
                    @endif

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
