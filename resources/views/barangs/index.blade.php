@extends('layouts.template')
@section('title','Barang')
@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
</head>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    {{-- <h2>Daftar Barang</h2> --}}
                </div>
                    <div class="pull-right">
                        <div class="pull-right">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg>
                </button>
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
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Nama Merek</th>
                <th>Nama Distributor</th>
                <th>Haraga Barang</th>
                <th>Harga Beli</th>
                <th>Jumlah Stok</th>
                <th>Nama Petugas</th>
                <th>Waktu Masuk</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama_bar }}</td>
                    <td>{{ $barang->merek }}</td>
                    <td>{{ $barang->nama_dis }}</td>
                    <td>{{ $barang->harga_bar }}</td>
                    <td>{{ $barang->harga_bel }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->nama_pet }}</td>
                    <td>{{ $barang->waktu }}</td>
                    <td>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                              </svg>
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $barang->nama_bar }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                            </a>
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $barang->nama_bar }}?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                  </svg>
                        </form>
                    </td>
                </tr>



                <!-- Awal Modal -->
            <div class="modal fade" id="editModal-{{ $barang->nama_bar }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">BARANG</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('barangs.update', $barang->id) }}">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>ID Barang:</strong>
                            <input type="number" name="id" class="form-control" placeholder="ID" value="{{ $barang->id }}">
                            </div>
                        </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nama Barang:</strong>
                        <input type="text" name="nama_bar" class="form-control" placeholder="Nama Barang" value="{{ $barang->nama_bar }}">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                    <strong>Pilih Merek</strong>
                    <select class="form-control" id="merek" name="merek" required="merek">
                        <option value="--Pilih Merek Anda--" selected disabled>{{$barang->merek}}</option>
                        @foreach ($merek as $cr)
                            <option value="{{ $cr->nama }}">{{ $cr->nama }}</option>
                        @endforeach
                    </select>
                    <strong>Pilih Distributor</strong>
                    <select class="form-control" id="distributor" name="nama_dis" required="nama_dis">
                        <option value="--Pilih Merek Anda--" selected disabled>{{$barang->nama_dis}}</option>
                        @foreach ($distributor as $dists)
                            <option value="{{ $dists->nama_dis }}">{{ $dists->nama_dis }}</option>
                        @endforeach
                    </select>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Barang:</strong>
                        <input type="number" min="0" name="harga_bar" value="{{ $barang->harga_bar }}" class="form-control" placeholder="Harga Barang">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Harga Beli:</strong>
                            <input type="number" min="0" name="harga_bel" value="{{ $barang->harga_bel }}" class="form-control" placeholder="Harga Beli">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jumlah Stok:</strong>
                            <input type="number" min="0" name="stok" value="{{ $barang->stok }}" class="form-control" placeholder="Jumlah Stok">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                    <strong>Pilih Petugas</strong>
                    {{-- <select class="form-control" id="petugas" name="nama_pet" required="nama_pet">
                        <option value="--Pilih Petugas anda--" selected disabled>--Pilih Nama Petugas--</option>
                        @foreach ($pengguna as $pet)
                            <option value="{{ $pet->nama_pet }}">{{ $pet->nama_pet }}</option>
                        @endforeach
                    </select> --}}

                    <select class="form-control" id="petugas" name="nama_pet" required="nama_pet">
                        <option value="--Pilih petugas Anda--" selected disabled>{{$barang->nama_dis}}</option>
                        @foreach ($pengguna as $pet)
                            <option value="{{ $pet->nama_pet }}">{{ $dists->nama_pet }}</option>
                        @endforeach
                    </select>

                </div>
                    </div>
                    {{-- <div>
                        <div>
                            <select class="form-control" id="role" name="role" required="nama_pet">
                                <option value="--Pilih Role anda--" selected disabled>--Pilih Role Petugas--</option>
                                <option value="Admin" {{ $pengguna->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Kasir" {{ $pengguna->role == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                            </select>
                        </div>
                    </div> --}}
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
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">BARANG</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('barangs.store') }}">
        <div class="modal-body">
            @csrf
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID Barang:</strong>
                    <input type="number" min="0" name="id" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_bar" class="form-control" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <strong>Pilih Merek</strong>

            <select class="form-control" id="merek" name="merek" required="merek">
                <option value="--Pilih Merek Anda--" selected disabled>--Pilih Merek anda--</option>
                @foreach ($merek as $cr)
                    <option value="{{ $cr->nama }}">{{ $cr->nama }}</option>
                @endforeach
            </select>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <strong>Pilih Distributor</strong>

            <select class="form-control" id="distributor" name="nama_dis" required="nama_dis">
                <option value="--Pilih Distributpr anda--" selected disabled>--Pilih Distributor anda--</option>
                @foreach ($distributor as $dists)
                    <option value="{{ $dists->nama_dis }}">{{ $dists->nama_dis }}</option>
                @endforeach
            </select>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Jual:</strong>
                    <input type="number" min="0" name="harga_bar" class="form-control" placeholder="Harga Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Beli:</strong>
                    <input type="number" min="0" name="harga_bel" class="form-control" placeholder="Harga Beli">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Stok:</strong>
                    <input type="number" min="0" name="stok" class="form-control" placeholder="Jumlah Stok">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <strong>Pilih Petugas</strong>
            <select class="form-control" id="petugas" name="nama_pet" required="nama_pet">
                <option value="--Pilih anda--" selected disabled>--Pilih Distributor anda--</option>
                @foreach ($pengguna as $pet)
                    <option value="{{ $pet->nama_pet }}">{{ $pet->nama_pet }}</option>
                @endforeach
            </select>
        </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
      </div>
    <!-- Akhir Modal -->



        {!! $barangs->links() !!}
    </div>
@endsection
