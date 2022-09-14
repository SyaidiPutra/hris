<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newFormModal">
        <i class="bi bi-patch-plus"></i> Calon Karyawan
    </button>
</div>

<div class="table-responsive">
    <table class="table" id="table_id">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach($data['data'] as $d) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d['nama_depan'] ?></td>
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
                <h5 class="modal-title" id="newFormModalLabel">Add New Calon Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="tab-content" id="myTabContent">
                <form action="<?= BASEURL; ?>/calonKaryawan/store" method="POST">
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata-tab-pane" type="button" role="tab" aria-controls="biodata-tab-pane" aria-selected="true">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="riwayatPendidikan-tab" data-bs-toggle="tab" data-bs-target="#riwayatPendidikan-tab-pane" type="button" role="tab" aria-controls="riwayatPendidikan-tab-pane" aria-selected="false">Riwayat Pendidikan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pengalamanKerja-tab" data-bs-toggle="tab" data-bs-target="#pengalamanKerja-tab-pane" type="button" role="tab" aria-controls="pengalamanKerja-tab-pane" aria-selected="false">Pengalaman Kerja</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="biodata-tab-pane" role="tabpanel" aria-labelledby="biodata-tab" tabindex="0">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" autocomplete="off" required>
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_tengah" name="nama_tengah" placeholder="Nama tengah" autocomplete="off">
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" autocomplete="off">
                                </div>
                                <label for="tempat_lahir" class="form-labe">Tempat, Tanggal Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                                    <span class="input-group-text">,</span>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" id="agama" class="form-select" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Tulis alamat lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-select" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" autocomplete="off" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input type="number" class="form-control" id="no_ktp" name="no_ktp" autocomplete="off" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                                    <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" placeholder="Tulis alamat Ayah lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
                                    <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                                    <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" placeholder="Tulis alamat Ibu lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ibu" class="form-label">No HP Ibu</label>
                                    <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="hubungan_kontak_darurat" class="form-label">Hubungan Kontak Darurat</label>
                                    <input type="text" class="form-control" id="hubungan_kontak_darurat" name="hubungan_kontak_darurat" placeholder="Adik / Kakak / Sepupu / ..." autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kontak_darurat" class="form-label">Nama Kontak Darurat</label>
                                    <input type="text" class="form-control" id="nama_kontak_darurat" name="nama_kontak_darurat" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_kontak_darurat" class="form-label">Alamat Kontak Darurat</label>
                                    <textarea class="form-control" name="alamat_kontak_darurat" id="alamat_kontak_darurat" placeholder="Tulis alamat kontak darurat lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_kontak_darurat" class="form-label">Pekerjaan Kontak Darurat</label>
                                    <input type="text" class="form-control" id="pekerjaan_kontak_darurat" name="pekerjaan_kontak_darurat" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_kontak_darurat" class="form-label">No HP Kontak Darurat</label>
                                    <input type="number" class="form-control" id="no_hp_kontak_darurat" name="no_hp_kontak_darurat" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="referensi" class="form-label">Referensi</label>
                                    <input type="text" class="form-control" id="referensi" name="referensi" autocomplete="off" placeholder="Tulis jika ada">
                                </div>
                                <label for="keinginan_gaji" class="form-label">Permintaan Gaji</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id="keinginan_gaji" name="keinginan_gaji" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="riwayatPendidikan-tab-pane" role="tabpanel" aria-labelledby="riwayatPendidikan-tab" tabindex="0">
                                <!-- Riwayat Pendidikan 1 -->
                                <h6 class="text-primary" id="titleRiwayatPendidikan1" style="display: none;">Pendidikan #1 <span class="text-muted">Wajib</span></h6>
                                <div class="mb-3">
                                    <label for="jenis_pendidikan1" class="form-label">Jenis Pendidikan</label>
                                    <select name="jenis_pendidikan1" id="jenis_pendidikan1" class="form-select" required>
                                        <option value="Formal" selected>Formal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jenjang_pendidikan1" class="form-label">Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" id="jenjang_pendidikan1" name="jenjang_pendidikan1" placeholder="Pendidikan terakhir (SMK/SMA/S1/..)" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="program_keahlian1" class="form-label">Program Keahlian</label>
                                    <input type="text" class="form-control" id="program_keahlian1" name="program_keahlian1" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lembaga1" class="form-label">Nama Lembaga</label>
                                    <input type="text" class="form-control" id="nama_lembaga1" name="nama_lembaga1" placeholder="Universitas Indonesia" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lembaga1" class="form-label">Alamat Lembaga</label>
                                    <textarea name="alamat_lembaga1" id="alamat_lembaga1" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Berijazah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="berijazah1" id="ya1" value="Ya" checked>
                                        <label class="form-check-label" for="ya1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="berijazah1" id="tidak1" value="Tidak">
                                        <label class="form-check-label" for="tidak1">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="button" class="btn btn-success btn-sm" onclick="toggleElement1()"><i class="bi bi-journal-plus"></i> Pendidikan</button>
                                </div>

                                <!-- Riwayat Pendidikan 2 -->
                                <div class="mb-3" id="riwayatPendidikan2" style="display: none;">
                                    <hr class="text-primary">
                                    <h6 class="text-primary">Pendidikan #2 (Kursus Keterampilan #1) <span class="text-muted">Jika ada</span></h6>
                                    <div class="mb-3">
                                        <label for="jenis_pendidikan2" class="form-label">Jenis Pendidikan</label>
                                        <select name="jenis_pendidikan2" id="jenis_pendidikan2" class="form-select">
                                            <option value="" selected>Pilih</option>
                                            <option value="Non Formal">Non Formal</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenjang_pendidikan2" class="form-label">Jenjang Pendidikan</label>
                                        <select name="jenjang_pendidikan2" id="jenjang_pendidikan2" class="form-select">
                                            <option value="" selected>Pilih</option>
                                            <option value="Basic">Basic</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Advanced">Advanced</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="program_keahlian2" class="form-label">Program Keahlian</label>
                                        <input type="text" class="form-control" id="program_keahlian2" name="program_keahlian2" placeholder="Business Analyst" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lembaga2" class="form-label">Nama Lembaga</label>
                                        <input type="text" class="form-control" id="nama_lembaga2" name="nama_lembaga2" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_lembaga2" class="form-label">Alamat Lembaga</label>
                                        <textarea name="alamat_lembaga2" id="alamat_lembaga2" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Berijazah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="berijazah2" id="ya2" value="Ya">
                                            <label class="form-check-label" for="ya2">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="berijazah2" id="tidak2" value="Tidak">
                                            <label class="form-check-label" for="tidak2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="button" class="btn btn-success btn-sm" onclick="toggleElement2()"><i class="bi bi-journal-plus"></i> Pendidikan</button>
                                    </div>
                                </div>


                                <!-- Riwayat Pendidikan 3 -->
                                <div class="mb-3" id="riwayatPendidikan3" style="display: none;">
                                    <hr class="text-primary">
                                    <h6 class="text-primary">Pendidikan #3 (Kursus Keterampilan #2) <span class="text-muted">Jika ada</span></h6>
                                    <div class="mb-3">
                                        <label for="jenis_pendidikan3" class="form-label">Jenis Pendidikan</label>
                                        <select name="jenis_pendidikan3" id="jenis_pendidikan3" class="form-select">
                                            <option value="" selected>Pilih</option>
                                            <option value="Non Formal">Non Formal</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenjang_pendidikan3" class="form-label">Jenjang Pendidikan</label>
                                        <select name="jenjang_pendidikan3" id="jenjang_pendidikan3" class="form-select">
                                            <option value="" selected>Pilih</option>
                                            <option value="Basic">Basic</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Advanced">Advanced</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="program_keahlian3" class="form-label">Program Keahlian</label>
                                        <input type="text" class="form-control" id="program_keahlian3" name="program_keahlian3" placeholder="Driving Forklift" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lembaga3" class="form-label">Nama Lembaga</label>
                                        <input type="text" class="form-control" id="nama_lembaga3" name="nama_lembaga3" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_lembaga3" class="form-label">Alamat Lembaga</label>
                                        <textarea name="alamat_lembaga3" id="alamat_lembaga3" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Berijazah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="berijazah3" id="ya3" value="Ya">
                                            <label class="form-check-label" for="ya3">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="berijazah3" id="tidak3" value="Tidak">
                                            <label class="form-check-label" for="tidak3">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>                                

                                <script>
                                    function toggleElement1() {
                                        var a = document.getElementById('riwayatPendidikan2');
                                        var b = document.getElementById('titleRiwayatPendidikan1');
                                        if(a.style.display === 'none') {
                                            a.style.display = 'block';
                                            b.style.display = 'block';
                                        } else {
                                            a.style.display = 'none';
                                            b.style.display = 'none';
                                        }
                                    }

                                    function toggleElement2() {
                                        var a = document.getElementById('riwayatPendidikan3');
                                        if(a.style.display === 'none') {
                                            a.style.display = 'block';
                                        } else {
                                            a.style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>
                            
                            <div class="tab-pane fade" id="pengalamanKerja-tab-pane" role="tabpanel" aria-labelledby="pengalamanKerja-tab" tabindex="0">
                                <!-- Pengalaman Kerja 1 -->
                                <h6 class="text-primary" id="titlePengalamanKerja1" style="display: none;">Pengalaman Kerja #1</h6>
                                <div class="mb-3">
                                    <label for="nama_perusahaan1" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan1" name="nama_perusahaan1" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan1" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan1" name="jabatan1" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="dept1" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="dept1" name="dept1" autocomplete="off">
                                </div>
                                <label for="durasi1" class="form-label">Durasi Kerja</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="durasi1" name="durasi1" autocomplete="off">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <div class="mb-3">
                                    <label for="alasan_berhenti1" class="form-label">Alasan Berhenti</label>
                                    <input type="text" class="form-control" id="alasan_berhenti1" name="alasan_berhenti1" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="jobdesc1" class="form-label">Uraian Pekerjaan</label>
                                    <textarea name="jobdesc1" id="jobdesc1" class="form-control"></textarea>
                                </div>
                                <label for="gaji_terakhir1" class="form-label">Gaji Terakhir</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id="gaji_terakhir1" name="gaji_terakhir1">
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-success" onclick="togglePengalamanKerja1()"><i class="bi bi-journal-plus"></i> Pengalaman</button>
                                </div>

                                <!-- Pengalaman Kerja 2 -->
                                <div class="mb-3" id="pengalamanKerja2" style="display: none;">
                                    <hr class="text-primary">
                                    <h6 class="text-primary">Pengalaman Kerja #2</h6>
                                    <div class="mb-3">
                                        <label for="nama_perusahaan2" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan2" name="nama_perusahaan2" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan2" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan2" name="jabatan2" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dept2" class="form-label">Department</label>
                                        <input type="text" class="form-control" id="dept2" name="dept2" autocomplete="off">
                                    </div>
                                    <label for="durasi2" class="form-label">Durasi Kerja</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="durasi2" name="durasi2" autocomplete="off">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alasan_berhenti2" class="form-label">Alasan Berhenti</label>
                                        <input type="text" class="form-control" id="alasan_berhenti2" name="alasan_berhenti2" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobdesc2" class="form-label">Uraian Pekerjaan</label>
                                        <textarea name="jobdesc2" id="jobdesc2" class="form-control"></textarea>
                                    </div>
                                    <label for="gaji_terakhir2" class="form-label">Gaji Terakhir</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" class="form-control" id="gaji_terakhir2" name="gaji_terakhir2">
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-success" onclick="togglePengalamanKerja2()"><i class="bi bi-journal-plus"></i> Pengalaman</button>
                                    </div>
                                </div>

                                <!-- Pengalaman Kerja 3 -->
                                <div class="mb-3" id="pengalamanKerja3" style="display: none;">
                                    <hr class="text-primary">
                                    <h6 class="text-primary">Pengalaman Kerja #3</h6>
                                    <div class="mb-3">
                                        <label for="nama_perusahaan3" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan3" name="nama_perusahaan3" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan3" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan3" name="jabatan3" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dept3" class="form-label">Department</label>
                                        <input type="text" class="form-control" id="dept3" name="dept3" autocomplete="off">
                                    </div>
                                    <label for="durasi3" class="form-label">Durasi Kerja</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="durasi3" name="durasi3" autocomplete="off">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alasan_berhenti3" class="form-label">Alasan Berhenti</label>
                                        <input type="text" class="form-control" id="alasan_berhenti3" name="alasan_berhenti3" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobdesc3" class="form-label">Uraian Pekerjaan</label>
                                        <textarea name="jobdesc3" id="jobdesc3" class="form-control"></textarea>
                                    </div>
                                    <label for="gaji_terakhir3" class="form-label">Gaji Terakhir</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" class="form-control" id="gaji_terakhir3" name="gaji_terakhir3">
                                    </div>
                                </div>

                                <script>
                                    function togglePengalamanKerja1() {
                                        var a = document.getElementById('pengalamanKerja2');
                                        var b = document.getElementById('titlePengalamanKerja1');
                                        if(a.style.display === 'none') {
                                            a.style.display = 'block';
                                            b.style.display = 'block';
                                        } else {
                                            a.style.display = 'none';
                                            b.style.display = 'none';
                                        }
                                    }

                                    function togglePengalamanKerja2() {
                                        var a = document.getElementById('pengalamanKerja3');
                                        if(a.style.display === 'none') {
                                            a.style.display = 'block';
                                        } else {
                                            a.style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>
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
</div>

<!-- Edit Form Modal -->
<?php foreach($data['data'] as $d) : ?>
    <div class="modal fade" id="editFormModal<?= $d['id'] ?>" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFormModalLabel">Edit Calon Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASEURL; ?>/calonKaryawan/update" method="POST">
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="biodataUpdate-tab" data-bs-toggle="tab" data-bs-target="#biodataUpdate-tab-pane<?= $d['id'] ?>" type="button" role="tab" aria-controls="biodataUpdate-tab-pane" aria-selected="true">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="riwayatPendidikanUpdate-tab" data-bs-toggle="tab" data-bs-target="#riwayatPendidikanUpdate-tab-pane<?= $d['id'] ?>" type="button" role="tab" aria-controls="riwayatPendidikanUpdate-tab-pane" aria-selected="false">Riwayat Pendidikan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pengalamanKerjaUpdate-tab" data-bs-toggle="tab" data-bs-target="#pengalamanKerjaUpdate-tab-pane<?= $d['id'] ?>" type="button" role="tab" aria-controls="pengalamanKerjaUpdate-tab-pane" aria-selected="false">Pengalaman Kerja</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="biodataUpdate-tab-pane<?= $d['id'] ?>" role="tabpanel" aria-labelledby="biodataUpdate-tab" tabindex="0">
                                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                <input type="hidden" name="created_at" value="<?= $d['created_at'] ?>">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" autocomplete="off" value="<?= $d['nama_depan'] ?>" required>
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_tengah" name="nama_tengah" placeholder="Nama tengah" autocomplete="off" value="<?= $d['nama_tengah'] ?>" >
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" autocomplete="off" value="<?= $d['nama_belakang'] ?>" >
                                </div>
                                <label for="tempat_lahir" class="form-labe">Tempat, Tanggal Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $d['tempat_lahir'] ?>" required>
                                    <span class="input-group-text">,</span>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $d['tgl_lahir'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <?php if($d['jenis_kelamin'] == 'L') : ?>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php else : ?>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki-laki</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" id="agama" class="form-control" required>
                                        <option value="<?= $d['agama'] ?>" selected><?= $d['agama'] ?></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Tulis alamat lengkap" required><?= $d['alamat'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-control" required>
                                        <option value="<?= $d['status_pernikahan'] ?>"><?= $d['status_pernikahan'] ?></option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?= $d['email'] ?>" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" autocomplete="off" value="<?= $d['no_hp'] ?>" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input type="number" class="form-control" id="no_ktp" name="no_ktp" autocomplete="off" value="<?= $d['no_ktp'] ?>" required>
                                </div>            
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off" value="<?= $d['no_kk'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" autocomplete="off" value="<?= $d['nama_ayah'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                                    <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" placeholder="Tulis alamat Ayah lengkap" required><?= $d['alamat_ayah'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" autocomplete="off" value="<?= $d['pekerjaan_ayah'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
                                    <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah" autocomplete="off" value="<?= $d['no_hp_ayah'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" autocomplete="off" value="<?= $d['nama_ibu'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                                    <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" placeholder="Tulis alamat Ibu lengkap" required><?= $d['alamat_ibu'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" autocomplete="off" value="<?= $d['pekerjaan_ibu'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ibu" class="form-label">No HP Ibu</label>
                                    <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu" autocomplete="off" value="<?= $d['no_hp_ibu'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="hubungan_kontak_darurat" class="form-label">Hubungan Kontak Darurat</label>
                                    <input type="text" class="form-control" id="hubungan_kontak_darurat" name="hubungan_kontak_darurat" placeholder="Adik / Kakak / Sepupu / ..." autocomplete="off" value="<?= $d['hubungan_kontak_darurat'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kontak_darurat" class="form-label">Nama Kontak Darurat</label>
                                    <input type="text" class="form-control" id="nama_kontak_darurat" name="nama_kontak_darurat" autocomplete="off" value="<?= $d['nama_kontak_darurat'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_kontak_darurat" class="form-label">Alamat Kontak Darurat</label>
                                    <textarea class="form-control" name="alamat_kontak_darurat" id="alamat_kontak_darurat" placeholder="Tulis alamat Ibu lengkap" required><?= $d['alamat_kontak_darurat'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_kontak_darurat" class="form-label">Pekerjaan Kontak Darurat</label>
                                    <input type="text" class="form-control" id="pekerjaan_kontak_darurat" name="pekerjaan_kontak_darurat" autocomplete="off" value="<?= $d['pekerjaan_kontak_darurat'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_kontak_darurat" class="form-label">No HP Kontak Darurat</label>
                                    <input type="number" class="form-control" id="no_hp_kontak_darurat" name="no_hp_kontak_darurat" autocomplete="off" value="<?= $d['no_hp_kontak_darurat'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="referensi" class="form-label">Referensi</label>
                                    <input type="text" class="form-control" id="referensi" name="referensi" autocomplete="off" placeholder="Tulis jika ada" value="<?= $d['referensi'] ?>">
                                </div>
                                <label for="keinginan_gaji" class="form-label">Permintaan Gaji</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id="keinginan_gaji" name="keinginan_gaji" value="<?= $d['keinginan_gaji'] ?>" required>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="riwayatPendidikanUpdate-tab-pane<?= $d['id'] ?>" role="tabpanel" aria-labelledby="riwayatPendidikanUpdate-tab" tabindex="0">
                                <input type="hidden" name="id_riwayat_pendidikan" value="<?= $d['id_riwayat_pendidikan'] ?>">
                                <input type="hidden" name="rp_id_calon_karyawan" value="<?= $d['rp_id_calon_karyawan'] ?>">
                                <div class="mb-3">
                                    <label for="jenis_pendidikan" class="form-label">Jenis Pendidikan</label>
                                    <select name="jenis_pendidikan" id="jenis_pendidikan" class="form-select" required>
                                        <?php if($d['jenis_pendidikan'] == 'Formal') : ?>
                                            <option value="Formal" selected>Formal</option>
                                            <option value="Non Formal">Non Formal</option>
                                        <?php else : ?>
                                            <option value="Non Formal" selected>Non Formal</option>
                                            <option value="Formal">Formal</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" placeholder="SMK/SMA/S1/S2/.." autocomplete="off" value="<?= $d['jenjang_pendidikan'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="program_keahlian" class="form-label">Program Keahlian</label>
                                    <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" value="<?= $d['program_keahlian'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                                    <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" autocomplete="off" value="<?= $d['nama_lembaga'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lembaga" class="form-label">Alamat Lembaga</label>
                                    <textarea name="alamat_lembaga" id="alamat_lembaga" class="form-control"><?= $d['alamat_lembaga'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Berijazah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="berijazah" id="yaUpdate" value="Ya" <?= $d['berijazah'] == 'Ya' ? 'checked' : ''  ?>>
                                        <label class="form-check-label" for="yaUpdate">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="berijazah" id="tidakUpdate" value="Tidak" <?= $d['berijazah'] == 'Tidak' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="tidakUpdate">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pengalamanKerjaUpdate-tab-pane<?= $d['id'] ?>" role="tabpanel" aria-labelledby="pengalamanKerjaUpdate-tab" tabindex="0">
                                <input type="hidden" name="id_pengalaman_kerja" value="<?= $d['id_pengalaman_kerja'] ?>">
                                <input type="hidden" name="pk_id_calon_karyawan" value="<?= $d['pk_id_calon_karyawan'] ?>">
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" autocomplete="off" value="<?= $d['nama_perusahaan'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" autocomplete="off" value="<?= $d['jabatan'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="dept" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="dept" name="dept" autocomplete="off" value="<?= $d['dept'] ?>">
                                </div>
                                <label for="durasi" class="form-label">Durasi Kerja</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="durasi" name="durasi" autocomplete="off" value="<?= $d['durasi'] ?>">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <div class="mb-3">
                                    <label for="alasan_berhenti" class="form-label">Alasan Berhenti</label>
                                    <input type="text" class="form-control" id="alasan_berhenti" name="alasan_berhenti" autocomplete="off" value="<?= $d['alasan_berhenti'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jobdesc" class="form-label">Uraian Pekerjaan</label>
                                    <textarea name="jobdesc" id="jobdesc" class="form-control"><?= $d['jobdesc'] ?></textarea>
                                </div>
                                <label for="gaji_terakhir" class="form-label">Gaji Terakhir</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id="gaji_terakhir" name="gaji_terakhir" value="<?= $d['gaji_terakhir'] ?>">
                                </div>
                            </div>
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
            <form action="<?= BASEURL; ?>/calonKaryawan/destroy" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <input type="hidden" name="nama_depan" value="<?= $d['nama_depan'] ?>">
                <div class="container text-center mt-3">
                    <p>Calon Karyawan "<b><?= $d['nama_depan'] ?></b>" akan dihapus secara permanen <i class="bi bi-exclamation-octagon text-warning"></i></p>
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