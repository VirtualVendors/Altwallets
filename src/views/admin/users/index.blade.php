@section('content')

  <h2>
    Users
    <small>
      <a class="btn btn-xs btn-success" href="{{route('admin.users.create')}}">
        <i class="fa fa-plus"></i>
      </a>
    </small>
  </h2>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th class="min">ID</th>
        <th>Email</th>
        <th>Admin?</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{HTML::mailto($user->email)}}</td>
          <td>{{$user->super ? 'Yes' : 'No'}}</td>
          <td>
            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@stop