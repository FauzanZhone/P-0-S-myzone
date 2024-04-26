@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="nc-icon nc-simple-add"></i>
                    </button>
                    {{-- <a class="btn btn-success" href="{{ route('penggunas.create') }}"> Masukan User Baru</a> --}}
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>  
                    <td>{{ $user->password }}</td>                    
                    <td>
                        {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST"> --}}
                            @csrf
                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $user->nama_pet }}">
                                EDIT
                            </a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $user->nama_pet }}?')">Delete</button>
                        </form>
                    </td>
                </tr>

            <!-- Awal Modal -->
            <div class="modal fade" id="editModal-{{ $user->nama_pet }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Nama Petugas</strong>
                            <input type="text" name="nama_pet" class="form-control" placeholder="Nama Petugas" value="{{ $user->nama_pet }}">
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Username</strong>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Password</strong>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role</strong>
                            <select class="form-control" id="role" name="role" required="nama_pet">
                                {{-- <option value="--Pilih Role anda--" selected disabled></option> --}}
                                {{-- <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Kasir" {{ $user->role == 'Kasir' ? 'selected' : '' }}>Kasir</option> --}}
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
            <!-- Akhir Modal -->
            
            @endforeach
        </table>

        <!-- Awal Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('users.store') }}">
                        <div class="modal-body">
                            @csrf

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
                                        <option value="--Pilih Role anda--" selected disabled>--Pilih Role Petugas--
                                        </option>
                                        <option value="Admin">Admin</option>
                                        <option value="Kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal -->



        {!! $users->links() !!}
    </div>
@endsection
