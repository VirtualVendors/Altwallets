@section('content')

<h2>Currency: {{$currency->code}}</h2>

<div class="row">
  <div class="col-md-8">
    <div class="well">
      <h3>Wallets</h3>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="min">ID</th>
            <th>User</th>
            <th>Primary Address</th>
            <th>Balance</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($currency->wallets as $wallet)
            <tr>
              <td>{{$wallet->id}}</td>
              <td>{{$wallet->user->email}}</td>
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
  <div class="col-md-4">
    <div class="well">
      <h3>Details</h3>
      <dl>
        <dt>ID</dt>
        <dd>{{$currency->id}}</dd>
        <dt>Code</dt>
        <dd>{{$currency->code}}</dd>
        <dt>Name</dt>
        <dd>{{$currency->code}}</dd>
        <dt>Location</dt>
        <dd class="ellipsis">{{$currency->protected_location}}</dd>
        <dt>Explorer URL</dt>
        <dd class="ellipsis">{{$currency->explorer}}</dd>
      </dl>
    </div>
  </div>
</div>

<div class="well">
      <h3>Transaction History</h3>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>
              Type
            </th>
            <th>
              Time
              <span class="fa fa-sort-numeric-desc"></span>
            </th>
            <th>TXID</th>
            <th>Address</th>
            <th>Confirmations</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach($currency->transactions as $transaction)
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

@stop