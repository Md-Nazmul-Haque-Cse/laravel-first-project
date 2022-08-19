@extends('admin.master')

@section('title')
    Manage Sub Category
@endsection

@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center border-0 bg-blue">
                        <div class="card-title font-strong text-white">All Sub Category Info Goes Here</div>
                    </div>
                    <div class="card-body">
                        @if($updatemessage = Session::get('updatemessage'))
                            @section('toast')
                                toastr.success('{{$updatemessage}}');
                            @endsection
                        @endif
                        @if(Session::has('deletemessage'))
                            @section('toast')
                                toastr.warning('{{Session::get('deletemessage')}}');
                            @endsection
                        @endif
                        <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$subCategory->category->name}}</td>
                                    <td>{{ $subCategory->name }}</td>
                                    <td>{{ $subCategory->description }}</td>
                                    <td><img src="{{ asset($subCategory->image) }}" alt="" height="70" width="100"></td>
                                    <td> {{ $subCategory->status == 1 ? 'Published' : 'Unpublished' }} </td>
                                    <td>
                                        <a href="{{ route('subcategory.edit', ['id' => $subCategory->id]) }}" class="btn btn-success btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn -xs" onclick="SubCategoryDelete({{ $subCategory->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form action="{{ route('subcategory.delete',  ['id' => $subCategory->id]) }}" method="POST" id="SubCategoryDeleteForm{{ $subCategory->id }}">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function SubCategoryDelete(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this..');
            if(check)
            {
                document.getElementById('SubCategoryDeleteForm'+id).submit();
            }
        }
    </script>
@endsection


