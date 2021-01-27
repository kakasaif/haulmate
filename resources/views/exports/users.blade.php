<table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>first name</th>
      <th>last name</th>
      <th>email</th>
      <th>phone</th>
      <th>registered on</th>
      <th>last visited on</th>
      <th>Moving From</th>
      <th>Moving To</th>
      @foreach ($data['services'] as $service)
        <th>{{$service}}</th>
      @endforeach
      @foreach ($data['preferences'] as $preference)
        <th>{{$preference}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->last_visited}}</td>
      <td>{{$countries[$user->moving_from]->country ?? $user->moving_from}}</td>
      <td>{{$countries[$user->moving_to]->country ?? $user->moving_to}}</td>
      @php
        $user_services_arr = array();
        foreach ($user->services as $service) {
          if (isset($service->service->name)) {
            $user_services_arr[] = $service->service->name;
          }
        }
      @endphp
      @foreach ($data['services'] as $service)
        <td>{{(in_array($service, $user_services_arr )) ? "Y" : '-'}}</td>
      @endforeach
      @php
        $user_preferences_arr = array();
        foreach ($user->preferences as $preference) {
          $user_preferences_arr[] = $preference->preference;
        }
      @endphp
      @foreach ($data['preferences'] as $preference)
        <td>{{(in_array($preference, $user_preferences_arr )) ? "Y" : '-'}}</td>
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>