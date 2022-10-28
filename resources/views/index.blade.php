@extends('layout')

@section('content')

    <body>

        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success mt-3">{{ session::get('success') }}</div>
            @endif
            <div class="row mt-4">
                <div class="col-lg">
                    <div class="float-start display-4">Cloud Computing</div>
                </div>
                <div class="mt-3 ms-2">
                    <a href="{{ route('addmember') }}" class="btn btn-success float-end">Add New Member</a>
                </div>
            </div>
            <div class="mt-5">
                <table class="table table-bordered">
                    <thead>
                        <th>S No.</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Roll Number</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>

                        @foreach ($cloud as $clouds)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $clouds->name }}</td>
                                <td>{{ $clouds->department }}</td>
                                <td>{{ $clouds->rollnumber }}</td>
                                <td>
                                    <a href="{{url('editmember/'.$clouds->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('deletedata/'.$clouds->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="mt-3 ms-2">
                    <a href="{{ route('export') }}" class="btn btn-primary float-end">Export</a>
                </div>
            </div>
        </div>
        </div>

    </body>
@endsection
