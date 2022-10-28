<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Create</title>
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="col-6" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-lg">
                        <h4>Add new Member</h4>
                    </div>
                    <div class="">
                        <a href="{{ route('show') }}" class="btn btn-danger float-end">Back</a>
                    </div>
                </div>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="form-gourp">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Fullname"
                            value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-gourp">
                        <label for="department">Department</label>
                        <input type="text" name="department" class="form-control" placeholder="Enter Department"
                            value="{{ old('department') }}">
                        <span class="text-danger">
                            @error('department')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-gourp">
                        <label for="rollnumer">Roll Number</label>
                        <input type="text" name="rollnumber" class="form-control" placeholder="Enter Rollno."
                            value="{{ old('rollnumber') }}">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group col-3 mt-3">
                        <button class="btn btn-block btn-primary" type="submit" style="margin-top: 2%;">Create</button>

                    </div>
            </div>
</body>

</html>
