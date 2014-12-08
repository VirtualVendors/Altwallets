@section('content')

<div class="row">

  <div class="col-md-8">
		<div class="widget">
			<div class="widget-head">
				<div class="pull-left">My Wallets</div>
				<div class="widget-icons pull-right">
				<small>
					<a class="" href="{{route('wallets.create')}}"><i class="fa fa-plus"></i></a>
				</small>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content referrer">
			<table class="table table-striped table-hover">
			  <thead>
				<tr>
				  <th class="min">ID</th>
				  <th class="min">Currency</th>
				  <th>Label</th>
				  <th>Primary Address</th>
				  <th>Balance</th>
				  <th>Actions</th>
				</tr>
			  </thead>
			  <tbody>
				@foreach($my->wallets as $wallet)
				<tr>
				  <td>{{$wallet->id}}</td>
				  <td>{{$wallet->currency->code}}</td>
				  <td>{{$wallet->label}}</td>
				  <td>{{$wallet->address}}</td>
				  <td>{{$wallet->balance}}</td>
				  <td class="min">
					{{link_to_route('wallets.show', 'View', $wallet->id, ['class' => 'btn btn-xs btn-default'])}}
				  </td>
				</tr>
				@endforeach
			  </tbody>
			</table>
			</div>
		</div>    

    
  </div>
  <div class="col-md-4">
    <div class="widget">
		<div class="widget-head">
			<div class="pull-left">Net Worth</div>
			<div class="clearfix"></div>
		</div>

		<div class="widget-content referrer">
			<table class="table table-striped table-bordered table-hover">
				<tbody>
					<tr>
						<th><center>#</center></th>
						<th>Currency</th>
						<th>Balance</th>
					</tr>
					@foreach($my->net_worth as $currency => $balance)
                    <tr>
						<th></th>
						<th>{{$currency}}</th>
						<th>${{$balance}}</th>
					</tr>
					@endforeach														
				</tbody>
			</table>      
	  </div>

    </div>
  </div>

</div>

@stop