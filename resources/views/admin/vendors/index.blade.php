{{-- resources/views/admin/vendors/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Vendors</title>
</head>
<body>
    <h1>Registered Vendors</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->id }}</td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->phone }}</td>
                    <td>{{ $vendor->address }}</td>
                    <td>{{ $vendor->is_approved ? 'Approved' : 'Pending' }}</td>
                    <td>
                        @if (!$vendor->is_approved)
                            <form action="{{ route('admin.vendors.approve', $vendor->id) }}" method="POST">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        @else
                            Approved
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
