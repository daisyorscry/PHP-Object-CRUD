
            <div class="card-header text-center">DATA MAHASISWA</div>
            <div class="card-body">

            <a href="adduser" class="btn btn-sm btn-success mb-2"><i class="bi bi-plus me-2"></i>TAMBAH</a>
            
            <div>
                <table id="myTable" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr class="">
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">No_Tlpn</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach($model as $user):?>
                    <tr>
                        <td><?= htmlspecialchars($user['nama']) ?></td>
                        <td><?= htmlspecialchars($user['no_hp']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['alamat']) ?></td>
                        <td class="flex gap-5 justify-center text-center">
                            <a href="/update/<?= htmlspecialchars($user['id']) ?>" class="btn btn-primary">
                                 <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </td>
                        <td>
                        <form id="deleteForm<?= $user['id'] ?>" action="/destroy/<?= $user['id'] ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i> Delete
                            </button>
                        </form>

                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>


