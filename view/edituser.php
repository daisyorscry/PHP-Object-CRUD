<!-- edit_form.php -->
<div class="card-header text-center">
    Edit Data
</div>


<div class="card-body">
    <?php foreach($model as $user):?>
    <form class="row g-3 needs-validation" action="/update/<?= $user['id'] ?>" method="post" novalidate>
        <div class="col-md-6">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>
            <div class="invalid-feedback">
                Nama harus diisi.
            </div>
        </div>

        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            <div class="invalid-feedback">
                Format email tidak valid.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="inputAlamat" name="alamat" value="<?= htmlspecialchars($user['alamat']) ?>" required>
            <div class="invalid-feedback">
                Alamat harus diisi.
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputNoHp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="inputNoHp" name="no_hp" value="<?= htmlspecialchars($user['no_hp']) ?>" required>
            <div class="invalid-feedback">
                No. Telepon harus diisi.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
    <?php endforeach ?>
</div>
