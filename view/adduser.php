<div class="card-header text-center">
    Add User
</div>

<div class="card-body">
    <form class="row g-3 needs-validation" action="/adduser" method="post" novalidate>
        <div class="col-md-6">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="nama" required>
            <div class="invalid-feedback">
                Nama harus diisi.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" required>
            <div class="invalid-feedback">
                Password harus diisi.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" required>
            <div class="invalid-feedback">
                Format email tidak valid.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
                Alamat harus diisi.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputNoHp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="inputNoHp" name="no_hp" required>
            <div class="invalid-feedback">
                No. Telepon harus diisi.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
    </form>
</div>
