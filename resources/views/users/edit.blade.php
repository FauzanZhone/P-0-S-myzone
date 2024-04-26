
<!-- Awal Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('users.edit', $users) }}">
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
                    <option value="--Pilih Role anda--" selected disabled>--Pilih Role Petugas--</option>
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
