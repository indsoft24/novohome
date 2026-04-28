@extends('admin.layouts.app')

@section('content')

<style>
.users-wrapper {
    padding: 20px;
}

.users-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.users-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.users-header h4 {
    margin: 0;
    font-weight: 600;
}

.table thead {
    background: #f8f9fa;
}

.table th {
    font-size: 13px;
    text-transform: uppercase;
    color: #6c757d;
}

.table td {
    vertical-align: middle;
    font-size: 14px;
}

.table tbody tr:hover {
    background: #f1f5ff;
    transition: 0.3s;
}

/* Avatar */
.user-avatar {
    width: 38px;
    height: 38px;
    background: linear-gradient(135deg, #4e73df, #6f86ff);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 10px;
    font-size: 14px;
}

.user-info {
    display: flex;
    align-items: center;
}

.email-badge {
    background: #eef2ff;
    color: #4e73df;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 13px;
}

/* responsive */
@media (max-width: 768px) {
    .users-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<div class="users-wrapper">

    <div class="users-card">

        <div class="users-header">
            <h4>Users List</h4>
            <span class="text-muted">{{ \App\Models\User::count() }} Users</span>
        </div>

        <div class="table-responsive">
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

</div>

@endsection