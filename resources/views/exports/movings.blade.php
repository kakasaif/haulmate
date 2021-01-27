<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>Moving From</th>
            <th>Moving To</th>
            <th>Requested At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movings as $moving)
        <tr>
            <td>{{$moving->id}}</td>
            <td>{{$moving->name}}</td>
            <td>{{$moving->email}}</td>
            <td>{{$moving->country_from->country ?? ''}}</td>
            <td>{{$moving->country_to->country ?? ''}}</td>
            <td>{{$moving->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>