<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newFormModal">
        <i class="bi bi-patch-plus"></i> Jabatan
    </button>
</div>

<div class="table-responsive">
    <table class="table" id="table_id">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Jobdesc</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach($data['data'] as $d) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d['nama_jabatan'] ?></td>
                <td><?= $d['jobdesc'] ?></td>
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
        <h5 class="modal-title" id="newFormModalLabel">Add New Jabatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL; ?>/jabatan/store" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="jobdesc" class="form-label">Jobdesc</label>
                <textarea class="form-control" id="jobdesc" name="jobdesc" placeholder="Tulis jobdesc detail disini" required></textarea>
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
                <h5 class="modal-title" id="editFormModalLabel">Edit Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/jabatan/update" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="created_at" value="<?= $d['created_at'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" autocomplete="off" value="<?= $d['nama_jabatan'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jobdesc" class="form-label">Jobdesc</label>
                        <textarea class="form-control" id="jobdesc" name="jobdesc" placeholder="Tulis jobdesc detail disini" required><?= $d['jobdesc'] ?></textarea>
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
            <form action="<?= BASEURL; ?>/jabatan/destroy" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="nama_jabatan" value="<?= $d['nama_jabatan'] ?>">
                <div class="container text-center mt-3">
                    <p>Jabatan "<?= $d['nama_jabatan'] ?>" akan dihapus secara permanen <i class="bi bi-exclamation-octagon text-warning"></i></p>
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