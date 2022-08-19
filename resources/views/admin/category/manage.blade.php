@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center border-0 bg-blue">
                        <div class="card-title font-strong text-white">All Category Info Goes Here</div>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td><img src="{{ asset($category->image) }}" alt="" height="70" width="100"></td>
                                <td> {{ $category->status == 1 ? 'Published' : 'Unpublished' }} </td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-success btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs" onclick="categoryDelete({{ $category->id }})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{ route('category.delete',  ['id' => $category->id]) }}" method="POST" id="categoryDeleteForm{{ $category->id }}">
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
        function categoryDelete(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this..');
            if(check)
            {
                document.getElementById('categoryDeleteForm'+id).submit();
            }
        }
    </script>
@endsection

