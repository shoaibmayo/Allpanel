<table>
    <thead>
        <tr>
            <th><b>Id</b></th>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Role</b></th>
            <th><b>Status</b></th>
            <th><b>Created At</b></th>
            <th><b>Updeted At</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role_name }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
