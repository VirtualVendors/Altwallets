@section('content')

  <h2>Edit Currency</h2>

  {{Form::model($currency, ['route' => ['admin.currencies.update', $currency->id], 'method' => 'put'])}}

    @include('altwallets::admin.currencies.form')

    {{Form::submit('Update Currency', ['class' => 'btn btn-primary'])}}

  {{Form::close()}}

@stop