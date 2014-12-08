@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="widget wgreen">
			<div class="widget-head">
				<div class="pull-left">New Recipient for Wallet: {{$wallet->label}}</div>
				<div class="clearfix"></div>
			</div>
			<div class="widget-content">
			
				<div class="padd">
	  {{Form::open(['route' => ['wallets.recipients.store', $wallet->id], 'method' => 'post'])}}

		{{Form::textField('label', 'Recipient Label')}}

		{{Form::textField('recipient', 'Recipient Address')}}

		{{Form::submit('Create New Recipient', ['class' => 'btn btn-sm btn-success'])}}

	  {{Form::close()}}
				</div>
			
			</div>	
		</div>  
	</div>
</div>
@stop