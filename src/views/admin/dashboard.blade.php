@section('content')

  <div class="row">
    <div class="col-md-6">
      <a class="btn btn-lg btn-block btn-info" href="{{route('admin.users.index')}}">Users</a>
    </div>
    <div class="col-md-6">
      <a class="btn btn-lg btn-block btn-info" href="{{route('admin.currencies.index')}}">Currencies</a>
    </div>
  </div>

  <hr/>

  <div class="row">
    <div class="col-md-12">
      <h2>Recent Transactions</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="min">ID</th>
            <th>Currency</th>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>

@stop