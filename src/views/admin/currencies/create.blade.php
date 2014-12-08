@section('content')

  <h2>New Currency</h2>

  {{Form::open(['route' => 'admin.currencies.store', 'method' => 'post'])}}

    @include('altwallets::admin.currencies.form')

    {{Form::submit('Create Currency', ['class' => 'btn btn-primary'])}}

  {{Form::close()}}
@stop