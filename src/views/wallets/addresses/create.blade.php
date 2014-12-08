@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="widget wgreen">
			<div class="widget-head">
				<div class="pull-left">New Address for Wallet: {{$wallet->label}}</div>
				<div class="clearfix"></div>
			</div>
			<div class="widget-content">
			
				<div class="padd">
				  {{Form::open(['route' => ['wallets.addresses.store', $wallet->id], 'method' => 'post'])}}

					{{Form::textField('label', 'Address Label')}}

					{{Form::submit('Create New Address', ['class' => 'btn btn-sm btn-success'])}}

					{{Form::close()}}
				</div>
			
			</div>	
		</div>  
	</div>
</div>
@stop