@extends('admin.layoutAdmin')
@section('content')
    <div class="container">
        <section class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add news product</h3>
            </div>
            <div class="panel-body">

                <form enctype="multipart/form-data" method="post" action="{{ route('product.store') }}" class="form-horizontal"
                    role="form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên sản phẩm</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Tên sản phẩm">
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="desc" class="col-sm-3 control-label">Mô tả</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" id="desc"
                                placeholder="Mô tả">
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="content" class="col-sm-3 control-label">Chi tiết</label>
                        <div class="col-sm-9">
                            <textarea id="content" name="content" class="form-control"></textarea>
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Giá gốc</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="price" id="price" placeholder="Giá gốc">
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="discount" class="col-sm-3 control-label">Giá giảm</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="discount" id="discount"
                                placeholder="Giá giảm">
                        </div>
                        <div class="form-group">
                            <label for="menu">Danh mục</label>
                            <select name="menu_id" id="menu" class="custom-select">
                                <option value="0">Chọn danh mục</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="">Trang thai</label>
                        <div class="form-check">
                            <input checked class="form-check-input" type="radio" name="active" id="exampleRadios1"
                                value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                Hiện
                            </label>
                        </div>
                        <div class="form-check">
                            <input checked class="form-check-input" type="radio" name="active" id="exampleRadios2"
                                value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                Ẩn
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                        <input name="myfile" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        </div>
                    </div>
                </form>

            </div><!-- panel-body // -->
        </section><!-- panel// -->


    </div> <!-- container// -->
@endsection
