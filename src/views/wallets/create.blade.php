@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="widget wgreen">
			<div class="widget-head">
				<div class="pull-left">Create New Wallet</div>
				<div class="clearfix"></div>
			</div>
			<div class="widget-content">
			
			<div class="padd">
			{{Form::open(['route' => 'wallets.store', 'method' => 'post'])}}

			{{Form::selectField('currency_id', 'Currency', $currencies->lists('code', 'id'))}}
			{{Form::textField('label', 'Wallet Label')}}

			{{Form::submit('Create Wallet', ['class' => 'btn btn-sm btn-success'])}}

		  {{Form::close()}}
			</div>
			
			</div>	
		</div>  
	</div>
</div>
  

@stop