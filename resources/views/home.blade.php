@include('layout.header')
@include('layout.user-headers')
@if(Session::get('error_msg'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        {{Session::get('error_msg')}}
    </div>
@elseif(Session::get('success_msg'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success !</h4>
        {{Session::get('success_msg')}}
    </div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($users))
        @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
    </tr>
    @endforeach
        @else
        <tr><td colspan="3">No user</td></tr>
    @endif
    </tbody>
</table>
</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
<script>
    $(document).on('click', '.delete', function (e) {
        var confirmed = confirm("Are you sure you want to delete this record ?");
        if (!confirmed)
        {
            return false;
        }

    });
    </script>
</html>