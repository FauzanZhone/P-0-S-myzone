@extends('app')

@section('content')
<div class="row justify-content-center"> <!-- Centering the column -->
    <div class="col-md-6">
        @if($errors->any())
            @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST" class="d-flex flex-column align-items-center">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input id="username" class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input id="password" class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Password Confirmation<span class="text-danger">*</span></label>
                <input id="password_confirm" class="form-control" type="password" name="password_confirm" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">REGISTER</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('header')
    @if(Request::is('register'))
        <h1 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">REGISTER</h1>
    @else
        <h1 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">LOGIN</h1>
    @endif
@endsection
