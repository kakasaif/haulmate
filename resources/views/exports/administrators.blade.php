<table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Email Verified</th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($administrators as $administrator)
    <tr>
      <td>{{$administrator->id}}</td>
      <td>{{$administrator->name}}</td>
      <td>{{$administrator->email}}</td>
      <td>{{$administrator->role}}</td>
      <td>{{$administrator->email_verified_at}}</td>
      <td>{{$administrator->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>