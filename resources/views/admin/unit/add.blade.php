@extends('admin.master')
@section('title')
    Add New Unit
@endsection
@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-11 mx-auto ">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Unit Form</div>
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
                        <form method="POST" action="{{ route('unit.new') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" placeholder="Unit Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Unit Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" placeholder="Unit Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Publication Status</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="status" checked value="1"/> Published </label>
                                    <label><input type="radio" name="status" value="0"/> Unpublished </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Create New Unit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

