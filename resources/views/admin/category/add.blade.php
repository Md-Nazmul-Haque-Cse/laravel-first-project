@extends('admin.master')
@section('title')
    Add New Category
@endsection
@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-11 mx-auto ">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Category Form</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        @if($message = Session::get('message'))
                            @section('toast')
                                toastr.success('{{$message}}');
                            @endsection
                        @endif
{{--                        @section('toast')--}}
{{--                            toastr.success('{{ Session::get('message') }}');--}}
{{--                        @endsection--}}
                        <form method="POST" action="{{ route('category.new') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="description" placeholder="Category Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control-file" type="file" name="image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Publication Status</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="status" value="1"/> Published </label>
                                    <label><input type="radio" name="status" value="0"/> Unpublished </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Create New Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
