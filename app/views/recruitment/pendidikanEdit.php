<form action="<?= BASEURL; ?>/calonKaryawan/pendidikanUpdate" method="POST">
    <?php foreach($data['data'] as $d) : ?>
        <input type="hidden" name="id" value="<?= $d['id'] ?>">
        <input type="hidden" name="id_calon_karyawan" value="<?= $d['id_calon_karyawan'] ?>">
        <input type="hidden" name="created_at" value="<?= $d['created_at'] ?>">
        <input type="hidden" name="nama_depan" value="<?= $d['nama_depan'] ?>">
        <div class="mb-3">
            <label for="jenis_pendidikan" class="form-label">Jenis Pendidikan</label>
            <select name="jenis_pendidikan" id="jenis_pendidikan" class="form-select" required>
                <?php if($d['jenis_pendidikan'] == 'Formal') : ?>
                    <option value="Formal">Formal</option>
                    <option value="Non Formal">Non Formal</option>
                <?php else : ?>
                    <option value="Non Formal">Non Formal</option>
                    <option value="Formal">Formal</option>
                <?php endif;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
            <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" autocomplete="off" value="<?= $d['jenjang_pendidikan'] ?>">
        </div>
        <div class="mb-3">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" value="<?= $d['program_keahlian'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
            <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" placeholder="Universitas Indonesia" autocomplete="off" value="<?= $d['nama_lembaga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat_lembaga" class="form-label">Alamat Lembaga</label>
            <textarea name="alamat_lembaga" id="alamat_lembaga" class="form-control" required><?= $d['alamat_lembaga'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="berijazah" class="form-label">Berijazah</label>
            <select name="berijazah" id="berijazah" class="form-select">
                <?php if($d['berijazah'] == 'Ya') : ?>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                <?php else : ?>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                <?php endif;?>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
            <a href="<?= BASEURL ?>/calonKaryawan" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <div class="mb-5">
            <hr>
        </div>
    <?php endforeach;?>
</form>

<div class="mb-3">
    <a href="#top"><sup><i class="bi bi-chevron-up"></i></sup> <span style="font-size: 12px;">back to top</span></a>
</div>