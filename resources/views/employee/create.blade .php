@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employee.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <textarea class="form-control" name="address"></textarea>
          </div>
          <div class="form-group">
              <label for="salary">Salary:</label>
              <input type="text" class="form-control" name="salary"/>
          </div>                         
          <button type="submit" class="btn btn-primary-outline">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection