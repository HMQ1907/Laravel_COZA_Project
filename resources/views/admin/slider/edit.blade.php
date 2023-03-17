@extends('admin.layoutAdmin')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <section class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Update news slide</h3>
            </div>
            <div class="panel-body">

                <form enctype="multipart/form-data" method="post" action="{{ url('admin/slider/edit/store/' . $slider->id) }}"
                    class="form-horizontal" role="form">
                    @csrf <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên slide</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $slider->name }}" class="form-control" name="name"
                                id="name" placeholder="Tên slide">
                        </div>
                    </div> <!-- form-group // -->
                    <div class="form-group">
                        <label for="desc" class="col-sm-3 control-label">Đường dẫn</label>
                        <div class="col-sm-9">
                            <input value="{{ $slider->url }}" type="text" class="form-control" name="url"
                                id="desc" placeholder="Đường dẫn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu">Sắp xếp</label>
                        <select name="sort_by" id="menu" class="custom-select">
                            <option value="1">Sắp xếp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kích hoạt</label>
                        <div class="form-check">
                            <input checked class="form-check-input" type="radio" name="active" id="exampleRadios1"
                                value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                Có
                            </label>
                        </div>
                        <div class="form-check">
                            <input checked class="form-check-input" type="radio" name="active" id="exampleRadios2"
                                value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                Không
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ảnh slide</label>
                        <input name="myfile" type="file" class="form-control-file" id="exampleFormControlFile1">
                        <img class="mt-4" width="200px" src="{{ url($slider->thumb) }}" alt="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Update slide</button>
                        </div>
                    </div>
                </form>

            </div><!-- panel-body // -->
        </section><!-- panel// -->


    </div> <!-- container// -->
@endsection
