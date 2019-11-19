@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
    <h1 class="display-3">Employee</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('employee.create')}}" class="btn btn-primary">New employee</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Salary</td>
          <td>Address</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee as $emp)
        <tr>
        
            <td>{{$emp->id}}</td>
            <td>{{$emp->name}}</td>
            <td>{{$emp->email}}</td>
            <td>{{$emp->phone}}</td>
            <td>{{$emp->salary}}</td>
            <td>{{$emp->address}}</td>
            <td>
                <a href="{{ route('employee.edit',$emp->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employee.destroy', $emp->id)}}" method="post">
                <input type="hidden" name="_method" value="delete" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection