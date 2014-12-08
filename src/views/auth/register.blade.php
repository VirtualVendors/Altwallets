@section('content')

  <h2>Register</h2>

  {{Form::open(['route' => 'register', 'method' => 'post'])}}

    {{Form::textField('email', 'Email')}}
    {{Form::passwordField('password', 'Password')}}
    {{Form::passwordField('password_confirmation', 'Repeat Password')}}

    <div class="form-group {{$errors->first('no_good') ? 'has-error' : ''}}">
      {{Form::checkbox('no_good', true, null)}}
      {{Form::label('no_good', 'I agree to be good.', ['class' => 'control-label'])}}
      @if($errors->first('no_good'))
        <span class="help-text">
          You must agree to be good.
        </span>
      @endif
    </div>

    {{Form::submit('Register', ['class' => 'btn btn-primary'])}}

  {{Form::close()}}
@stop