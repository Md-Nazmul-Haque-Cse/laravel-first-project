@extends('admin.master')
@section('title')
    Add New Product
@endsection
@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center font-strong">Add Product Form</div>
                        <div class="card-body">
                            @if($message = Session::get('message'))
                                @section('toast')
                                    toastr.success('{{$message}}');
                                @endsection
                            @endif
                            <form method="POST" action="{{route('product.new')}}" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" required name="category_id" id="categoryId">
                                            <option value="" disabled selected> -- Select Category Name --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" required name="sub_category_id" id="subCategoryId">
                                            <option value="" disabled selected> -- Select Sub Category Name --</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Brand Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" required name="brand_id">
                                            <option value="" disabled selected> -- Select Brand Name --</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control required select2" name="unit_id">
                                            <option  value="" disabled selected> -- Select Unit Name --</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Code</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="code" placeholder="Product Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Regular Price</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="regular_price" placeholder="Regular Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Selling Price</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="selling_price" placeholder="Selling Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="editor1" name="short_description" placeholder="Short Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="editor2"  name="long_description" placeholder="Long Description"></textarea>
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-2 col-form-label">Long Description</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <textarea class="form-control summernote" id=""  name="long_description" placeholder="Long Description"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control-file" type="file" name="image" accept="image/*"/>
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-2 col-form-label">Product Sub Image</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <input class="form-control-file" type="file" name="sub_image[]" multiple accept="image/*"/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Sub Image</label>
                                    <div class="col-sm-10 field" >
                                        <input class="form-control-file" id="files" type="file" name="sub_image[]" multiple accept="image/*"/>
                                    </div>
                                </div>

{{--                                  <div class="form-group row">--}}
{{--                                      <div class="field" align="left">--}}
{{--                                          <h3>Upload your images</h3>--}}
{{--                                          <input type="file" id="files" name="files[]" multiple />--}}
{{--                                      </div>--}}
{{--                                </div>--}}

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Publication Status</label>
                                    <div class="col-sm-10">
                                        <label><input type="radio" name="status" value="1"/> Published </label>
                                        <label><input type="radio" name="status" value="0"/> Unpublished </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto">
                                        <button class="btn btn-info" type="submit">Create New Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

