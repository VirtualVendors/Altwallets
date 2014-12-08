@section('content')

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="widget worange">
      <div class="widget-head"><i class="fa fa-lock"></i> Login to AltWallets</div>
      <div class="widget-body">
		<div class="padd">
			{{Form::open(['route' => 'login', 'method' => 'post'])}}			
			  {{Form::textField('email', 'Email', null, ['placeholder' => 'Enter Email'])}}
			  {{Form::passwordField('password', 'Password', ['placeholder' => 'Enter Password'])}}
			  {{Form::checkboxField('remember', 'Remember Me')}}
			  {{Form::submit('Login', ['class' => 'btn btn-info btn-block'])}}
			{{Form::close()}}
		</div>
      </div>
    </div>
  </div>
</div>

@stop