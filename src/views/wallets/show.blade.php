@section('content')

  <h2>
    Wallet: {{$wallet->label}}
    <small>{{$wallet->address}}</small>
    <a class="btn btn-xs btn-info" href="{{route('wallets.refresh', [$wallet->id])}}"><i class="fa fa-refresh"></i></a>
  </h2>
  <h4>Tradekey: {{$wallet->tradekey}}</h4>
  <h3>Balance: {{$wallet->balance}}</h3>

  <div class="row">
	  <div class="col-md-12">
		<div class="widget">
			<div class="widget-head">
				<div class="pull-left">Transaction History</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content referrer">
			<table class="table table-striped table-hover">
			<thead>
			  <tr>
				<th>
				  Type
				</th>
				<th>
				  Time
				  <span class="fa fa-sort-by-attributes-alt"></span>
				</th>
				<th>TXID</th>
				<th>Address</th>
				<th>Confirmations</th>
				<th>Amount</th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($wallet->transactions as $transaction)
				<tr class="{{$transaction->class}}">
				  <td>{{Str::title($transaction->category)}}</td>
				  <td>{{$transaction->timestamp}}</td>
				  <td>
					{{$transaction->getTransactionLink($wallet->currency)}}
				  </td>
				  <td>{{$transaction->address}}</td>
				  <td>{{$transaction->confirmations}}</td>
				  <td>{{$transaction->amount}}</td>
				</tr>
			  @endforeach
			</tbody>
		  </table>
			</div>          
		</div>
	  </div>
  </div>

  <div class="row">
    <div class="col-md-6">
	    <div class="widget">
			<div class="widget-head">
				<div class="pull-left">My Wallet Addresses</div>
				<div class="widget-icons pull-right">
				<small>
					<a class="" href="{{route('wallets.addresses.create', $wallet->id)}}"><i class="fa fa-plus"></i></a>
				</small>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content referrer">
			<table class="table table-striped table-hover">
				<thead>
				  <tr>
					<th>Address</th>
					<th>Label</th>
					<th class="min"><i class="fa fa-cog"></i></th>
				  </tr>
				</thead>
				<tbody>
				  @foreach($wallet->addresses as $address)
					<tr>
					  <td>{{$address->address}}</td>
					  <td>{{$address->label}}</td>
					  <td>
						<i class="fa fa-edit"></i>
					  </td>
					</tr>
				  @endforeach
				</tbody>
			  </table>
			</div>
		</div>
      

    </div>
    <div class="col-md-6">	  
		<div class="widget">
			<div class="widget-head">
				<div class="pull-left">Send {{$wallet->currency->code}}</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content">
			<div class="padd">
			{{Form::open(['route' => ['wallets.send', $wallet->id], 'method' => 'post'])}}

			{{Form::textField('address', 'By Address', null, ['readonly' => true])}}

			{{Form::textField('label', 'By Label', null, ['readonly' => true])}}

			{{Form::textField('tradekey', 'By Tradekey', null, ['readonly' => true])}}

			{{Form::textField('amount', 'Amount ('.$wallet->currency->code.')')}}

			{{Form::submit('Send', ['class' => 'btn btn-info'])}}

		  {{Form::close()}}
		  </div>
			</div>
		</div>		     

      
    </div>
  </div>

  <div class="row">
      <div class="col-md-6">
	  <div class="widget">
			<div class="widget-head">
				<div class="pull-left">Address Book</div>
				<div class="widget-icons pull-right">
				<small>
					<a class="" href="{{route('wallets.recipients.create', $wallet->id)}}"><i class="fa fa-plus"></i></a>
				</small>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content referrer">
			 <table class="table table-striped table-hover">
			  <thead>
				<tr>
				  <th>Recipient Address</th>
				  <th>Label</th>
				  <th class="min"><i class="fa fa-cog"></i></th>
				</tr>
			  </thead>
			  <tbody>
				@foreach($wallet->recipients as $recipient)
				  <tr>
					<td>{{$recipient->recipient}}</td>
					<td>{{$recipient->label}}</td>
					<td>
					  <i class="fa fa-edit"></i>
					</td>
				  </tr>
				@endforeach
			  </tbody>
			</table>
			</div>
		</div>
       
       

      </div>

      <div class="col-md-6">
	  <div class="widget">
			<div class="widget-head">
				<div class="pull-left">Trade Keys</div>
				<div class="widget-icons pull-right">
				<small>
					<a class="" href="{{route('wallets.tradekeys.create', $wallet->id)}}"><i class="fa fa-plus"></i></a>
				</small>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-content referrer">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Trade Key</th>
                <th>Label</th>
                <th class="min"><i class="fa fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($wallet->tradekeys as $tradekey)
                <tr>
                  <td>{{$tradekey->tradekey}}</td>
                  <td>{{$tradekey->label}}</td>
                  <td>
                    <i class="fa fa-edit"></i>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
		  </div>
		  </div>
          

        </div>

    </div>

@stop

@section('scripts')
  <script>
    $("[data-toggle=tooltip]").tooltip({
      container: 'body',
      trigger: 'click'
    });

    $('#id-field-address').click(function(){
        $('#id-field-address').prop('readonly', false);
        $('#id-field-label').prop('readonly', true);
        $('#id-field-tradekey').prop('readonly', true);
    });

    $('#id-field-label').click(function(){
        $('#id-field-label').prop('readonly', false);
        $('#id-field-address').prop('readonly', true);
        $('#id-field-tradekey').prop('readonly', true);
    });

     $('#id-field-tradekey').click(function(){
        $('#id-field-tradekey').prop('readonly', false);
        $('#id-field-address').prop('readonly', true);
        $('#id-field-label').prop('readonly', true);
     });
    </script>
@stop