@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
            @endforeach
        </div>
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input id="password" class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</div>
@endsection