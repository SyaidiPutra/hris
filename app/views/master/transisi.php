<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newFormModal">
        <i class="bi bi-patch-plus"></i> Transisi
    </button>
</div>

<div class="table-responsive">
    <table class="table" id="table_id">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Ttransisi</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach($data['data'] as $d) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d['nama_transisi'] ?></td>
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
        <h5 class="modal-title" id="newFormModalLabel">Add New Transisi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL; ?>/transisi/store" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_transisi" class="form-label">Nama Transisi</label>
                <input type="text" class="form-control" id="nama_transisi" name="nama_transisi" autocomplete="off" required>
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
                <h5 class="modal-title" id="editFormModalLabel">Edit Transisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/transisi/update" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="created_at" value="<?= $d['created_at'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_transisi" class="form-label">Nama Transisi</label>
                        <input type="text" class="form-control" id="nama_transisi" name="nama_transisi" autocomplete="off" value="<?= $d['nama_transisi'] ?>" required>
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
            <form action="<?= BASEURL; ?>/transisi/destroy" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="nama_transisi" value="<?= $d['nama_transisi'] ?>">
                <div class="container text-center mt-3">
                    <p>Transisi "<?= $d['nama_transisi'] ?>" akan dihapus secara permanen <i class="bi bi-exclamation-octagon text-warning"></i></p>
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