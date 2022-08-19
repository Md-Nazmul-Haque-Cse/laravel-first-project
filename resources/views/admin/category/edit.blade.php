@extends('admin.master')

@section('title')
    Edit New Category
@endsection

@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-11 mx-auto ">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Category Form</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form method="POST" action="{{ route('category.update', ['id' => $category->id]) }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{$category->name}}" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" placeholder="Category Description">{{$category->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Image</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($category->image) }}" alt="" height="50" width="80"/>
                                    <input class="form-control-file" type="file" name="image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Publication Status</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" {{ $category->status ==1 ? 'checked' : '' }} name="status" value="1"/> Published </label>
                                    <label><input type="radio" {{ $category->status ==0 ? 'checked' : '' }} name="status" value="0"/> Unpublished </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Update Category Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

