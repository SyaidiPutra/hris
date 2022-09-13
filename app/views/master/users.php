<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newFormModal">
        <i class="bi bi-person-plus"></i> Users
    </button>
</div>

<div class="table-responsive">
    <table class="table" id="table_id">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Username</th>
                <th>Role Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach($data['data'] as $d) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d['nama_depan'] ?></td>
                <td><?= $d['username'] ?></td>
                <td><?= $d['nama_role'] ?></td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editFormModal<?= $d['id'] ?>"><i class="bi bi-pencil-fill"></i></button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFormModal<?= $d['id'] ?>"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- New Form Modal -->
<div class="modal fade" id="newFormModal" tabindex="-1" aria-labelledby="newFormModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newFormModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL; ?>/users/store" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">Karyawan</label>
                <select name="id_karyawan" id="id_karyawan" class="form-select">
                    <option value="" disabled selected>Pilih</option>
                    <?php foreach($data['karyawan'] as $role) : ?>
                        <option value="<?= $d['id'] ?>"><?= $d['nama_role'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="mb-3">
                <label for="id_role" class="form-label">Role</label>
                <select name="id_role" id="" class="form-select" required>
                    <option value="" disabled selected>Pilih</option>
                    <?php foreach($data['roles'] as $role) : ?>
                        <option value="<?= $role['id'] ?>"><?= $role['nama_role'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Form Modal -->
<?php foreach($data['data'] as $d) : ?>
    <div class="modal fade" id="editFormModal<?= $d['id'] ?>" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/users/update" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="password" value="<?= $d['password'] ?>">
                <input type="hidden" name="created_at" value="<?= $d['created_at'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_karyawan" class="form-label">Karyawan</label>
                        <select name="id_karyawan" id="id_karyawan" class="form-select">
                        <?php if($d['id_karyawan'] == NULL ) : ?>
                            <option value="" disabled selected>Pilih</option>
                        <?php endif; ?>
                            <option value="<?= $d['id_karyawan'] ?>" selected><?= $d['nama_depan'] ?> <?= $d['nama_tengah'] ?> <?= $d['nama_belakang'] ?></option>
                            <?php foreach($data['karyawan'] as $k) : ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama_depan'] ?> <?= $k['nama_tengah'] ?> <?= $k['nama_belakang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?= $d['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_role" class="form-label">Role</label>
                        <select name="id_role" id="" class="form-select" required>
                        <?php if($d['id_role'] == NULL) : ?>
                            <option value="" disabled selected>Pilih</option>
                        <?php endif; ?>
                            <option value="<?= $d['id_role'] ?>" selected><?= $d['nama_role'] ?></option>
                            <?php foreach($data['roles'] as $role) : ?>
                                <option value="<?= $role['id'] ?>"><?= $role['nama_role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Delete Form Modal -->
<?php foreach($data['data'] as $d) : ?>
    <div class="modal fade" id="deleteFormModal<?= $d['id'] ?>" tabindex="-1" aria-labelledby="deleteFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteFormModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/users/destroy" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="username" value="<?= $d['username'] ?>">
                <div class="container text-center mt-3">
                    <p>User "<?= $d['username'] ?>" akan dihapus secara permanen <i class="bi bi-exclamation-octagon text-warning"></i></p>
                    <h3 class="text-danger">Yakin hapus data ini <i class="bi bi-question-octagon"></i></h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>