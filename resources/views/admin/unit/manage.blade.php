@extends('admin.master')

@section('title')
    Manage Unit
@endsection

@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center border-0 bg-blue">
                        <div class="card-title font-strong text-white">All Unit Info Goes Here</div>
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
                                <th class="text-center">SL No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($units as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->description }}</td>
                                    <td> {{ $unit->status == 1 ? 'Published' : 'Unpublished' }} </td>
                                    <td>
                                        <a href="{{ route('unit.edit', ['id' => $unit->id]) }}" class="btn btn-success btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-xs" onclick="unitDelete({{ $unit->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form action="{{ route('unit.delete', ['id' => $unit->id]) }}" method="POST" id="unitDeleteForm{{ $unit->id }}">
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
        function unitDelete(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this..');
            if(check)
            {
                document.getElementById('unitDeleteForm'+id).submit();
            }
        }
    </script>
@endsection



