@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Employee</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('employee.update', $employee->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $employee->name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $employee->email }} />
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value={{ $employee->phone }} />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address">{{ $employee->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" name="salary" value={{ $employee->salary }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection