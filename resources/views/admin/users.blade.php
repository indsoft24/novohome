@extends('admin.layouts.app')

@section('content')

<style>
.users-wrapper {
    max-width: 100%;
}

.users-card {
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.users-card h4 {
    font-weight: 600;
    margin-bottom: 20px;
}

.table thead {
    background: #f8f9fa;
}

.table th {
    font-size: 14px;
    text-transform: uppercase;
    color: #6c757d;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
    font-size: 14px;
}

.table tbody tr {
    transition: 0.3s;
}

.table tbody tr:hover {
    background: #f1f5ff;
}

/* Avatar circle */
.user-avatar {
    width: 35px;
    height: 35px;
    background: #4e73df;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 10px;
}

/* Name with avatar */
.user-info {
    display: flex;
    align-items: center;
}

/* Email badge */
.email-badge {
    background: #eef2ff;
    color: #4e73df;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 13px;
}
</style>

<div class="users-wrapper">

    <div class="users-card">
        <h4>Users List</h4>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach(\App\Models\User::latest()->get() as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                        <div class="user-info">
                            <div class="user-avatar">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            {{ $user->name }}
                        </div>
                    </td>

                    <td>
                        <span class="email-badge">{{ $user->email }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection