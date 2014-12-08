@section('content')

  <h2>
    Currencies
    <small>
      <a class="btn btn-xs btn-success" href="{{route('admin.currencies.create')}}">
        <i class="fa fa-plus"></i>
      </a>
    </small>
  </h2>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th class="min">ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Active?</th>
        <th>Location</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($currencies as $currency)
        <tr>
          <td>{{$currency->id}}</td>
          <td>{{$currency->code}}</td>
          <td>{{$currency->name}}</td>
          <td>{{$currency->active ? 'Yes' : 'No'}}</td>
          <td>{{$currency->protected_location}}</td>
          <td class="min">
            {{link_to_route('admin.currencies.edit', 'Edit', $currency->id, ['class' => 'btn btn-xs btn-info'])}}
            {{link_to_route('admin.currencies.show', 'View', $currency->id, ['class' => 'btn btn-xs btn-default'])}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@stop