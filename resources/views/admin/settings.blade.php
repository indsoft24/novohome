@extends('admin.layouts.app')

@section('content')

<h4 class="mb-3">Settings</h4>

<div class="card p-3">

    <form>
        <div class="mb-3">
            <label>Site Name</label>
            <input type="text" class="form-control" value="NOVHOMZ Furniture">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="admin@gmail.com">
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" class="form-control" value="9999999999">
        </div>

        <button class="btn btn-success">Save Settings</button>
    </form>

</div>

@endsection