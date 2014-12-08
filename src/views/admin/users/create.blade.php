@section('content')

  <h2>New User</h2>

  {{Form::open(['route' => 'admin.users.store', 'method' => 'post'])}}

    @include('altwallets::admin.users.form')

    {{Form::submit('Create User', ['class' => 'btn btn-primary'])}}

  {{Form::close()}}
@stop