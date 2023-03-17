@extends('admin.layoutAdmin')
@section('content')
    <div class="col-md-8">

        <div class="card">
            @include('admin.alert')
            @if (Session::has('notification'))
                <div class="alert alert-info" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
            <div class="card-header">
                <h5 class="title">Create</h5>
            </div>
            <form enctype="multipart/form-data" method="post" action="" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="menu">Tên danh mục</label>
                        <input id="menu" type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="menu">Danh mục gốc</label>
                        <select name="parent_id" id="" class="custom-select">
                            <option value="0">Danh muc cha</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Mô tả">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" cols="20" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input value="1" name="active" selected id="active" type="radio"
                                class="custom-control-input">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="0" name="active" id="no_active" type="radio" class="custom-control-input">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Avatar menu</label>
                            <input name="avt_menu" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Tạo danh mục</button>
                </div>
            </form>
        </div>
    </div>
@endsection
