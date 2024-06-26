@extends('users.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Tambahkan User</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> Ada input yang salah!<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('users.store') }}" method="POST">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Nama Petugas:</strong>
        <input type="text" name="nama_pet" class="form-control" placeholder="Nama Petugas">
        </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Username:</strong>
    <input type="text" name="username" class="form-control" placeholder="Username">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Password:</strong>
    <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
</div>
<div>
    <div>
        <select class="form-control" id="role" name="role" required="nama_pet">
            <option value="--Pilih Role anda--" selected disabled>--Pilih Role Petugas--</option>
            <option value="Admin">Admin</option>
            <option value="Kasir">Kasir</option>
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection