<?php

class calonKaryawan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getCalonKaryawan()
    {
        $this->db->query("SELECT ck.*,
        GROUP_CONCAT(rp.id) AS id_riwayat_pendidikan,
        GROUP_CONCAT(rp.id_calon_karyawan) AS rp_id_calon_karyawan,
        GROUP_CONCAT(DISTINCT(rp.jenis_pendidikan)) AS jenis_pendidikan,
        GROUP_CONCAT(rp.jenjang_pendidikan) AS jenjang_pendidikan,
        GROUP_CONCAT(rp.program_keahlian) AS program_keahlian,
        GROUP_CONCAT(rp.nama_lembaga) AS nama_lembaga,
        GROUP_CONCAT(rp.alamat_lembaga) AS alamat_lembaga,
        GROUP_CONCAT(rp.berijazah) AS berijazah,
        GROUP_CONCAT(rp.created_at) AS rp_created_at,
        GROUP_CONCAT(pk.id) AS id_pengalaman_kerja,
        GROUP_CONCAT(pk.id_calon_karyawan) AS pk_id_calon_karyawan,
        GROUP_CONCAT(DISTINCT(pk.nama_perusahaan)) AS nama_perusahaan,
        GROUP_CONCAT(pk.jabatan) AS jabatan,
        GROUP_CONCAT(pk.dept) AS dept,
        GROUP_CONCAT(pk.durasi) AS durasi,
        GROUP_CONCAT(pk.alasan_berhenti) AS alasan_berhenti,
        GROUP_CONCAT(pk.jobdesc) AS jobdesc,
        GROUP_CONCAT(pk.gaji_terakhir) AS gaji_terakhir,
        GROUP_CONCAT(pk.created_at) AS pk_created_at
        FROM calon_karyawan AS ck
        INNER JOIN riwayat_pendidikan AS rp ON ck.id = rp.id_calon_karyawan
        LEFT JOIN pengalaman_kerja AS pk ON ck.id = pk.id_calon_karyawan
        GROUP BY ck.id");
        return $this->db->resultSet();
    }

    public function store($data)
    {
        $query = "INSERT INTO calon_karyawan VALUES ('', :nama_depan, :nama_tengah, :nama_belakang, :tempat_lahir, :tgl_lahir, :jenis_kelamin, :agama, :alamat, :status_pernikahan, :email, :no_hp, :no_ktp,  :no_kk, :nama_ayah, :alamat_ayah, :pekerjaan_ayah, :no_hp_ayah, :nama_ibu, :alamat_ibu, :pekerjaan_ibu, :no_hp_ibu, :hubungan_kontak_darurat, :nama_kontak_darurat, :alamat_kontak_darurat, :pekerjaan_kontak_darurat, :no_hp_kontak_darurat, :referensi, :keinginan_gaji, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama_depan', $data['nama_depan']);
        $this->db->bind('nama_tengah', $data['nama_tengah']);
        $this->db->bind('nama_belakang', $data['nama_belakang']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('no_ktp', $data['no_ktp']);
        $this->db->bind('no_kk', $data['no_kk']);
        $this->db->bind('nama_ayah', $data['nama_ayah']);
        $this->db->bind('alamat_ayah', $data['alamat_ayah']);
        $this->db->bind('pekerjaan_ayah', $data['pekerjaan_ayah']);
        $this->db->bind('no_hp_ayah', $data['no_hp_ayah']);
        $this->db->bind('nama_ibu', $data['nama_ibu']);
        $this->db->bind('alamat_ibu', $data['alamat_ibu']);
        $this->db->bind('pekerjaan_ibu', $data['pekerjaan_ibu']);
        $this->db->bind('no_hp_ibu', $data['no_hp_ibu']);
        $this->db->bind('hubungan_kontak_darurat', $data['hubungan_kontak_darurat']);
        $this->db->bind('nama_kontak_darurat', $data['nama_kontak_darurat']);
        $this->db->bind('alamat_kontak_darurat', $data['alamat_kontak_darurat']);
        $this->db->bind('pekerjaan_kontak_darurat', $data['pekerjaan_kontak_darurat']);
        $this->db->bind('no_hp_kontak_darurat', $data['no_hp_kontak_darurat']);
        $this->db->bind('referensi', $data['referensi']);
        $this->db->bind('keinginan_gaji', $data['keinginan_gaji']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE calon_karyawan SET
            id = :id,
            nama_depan = :nama_depan,
            nama_tengah = :nama_tengah,
            nama_belakang = :nama_belakang,
            tempat_lahir = :tempat_lahir,
            tgl_lahir = :tgl_lahir,
            jenis_kelamin = :jenis_kelamin,
            agama = :agama,
            alamat = :alamat,
            status_pernikahan = :status_pernikahan,
            email = :email,
            no_hp = :no_hp,
            no_ktp = :no_ktp,
            no_kk = :no_kk,
            nama_ayah = :nama_ayah,
            alamat_ayah = :alamat_ayah,
            pekerjaan_ayah = :pekerjaan_ayah,
            no_hp_ayah = :no_hp_ayah,
            nama_ibu = :nama_ibu,
            alamat_ibu = :alamat_ibu,
            pekerjaan_ibu = :pekerjaan_ibu,
            no_hp_ibu = :no_hp_ibu,
            hubungan_kontak_darurat = :hubungan_kontak_darurat,
            nama_kontak_darurat = :nama_kontak_darurat,
            alamat_kontak_darurat = :alamat_kontak_darurat,
            pekerjaan_kontak_darurat = :pekerjaan_kontak_darurat,
            no_hp_kontak_darurat = :no_hp_kontak_darurat,
            referensi = :referensi,
            keinginan_gaji = :keinginan_gaji,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_depan', $data['nama_depan']);
        $this->db->bind('nama_tengah', $data['nama_tengah']);
        $this->db->bind('nama_belakang', $data['nama_belakang']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('no_ktp', $data['no_ktp']);
        $this->db->bind('no_kk', $data['no_kk']);
        $this->db->bind('nama_ayah', $data['nama_ayah']);
        $this->db->bind('alamat_ayah', $data['alamat_ayah']);
        $this->db->bind('pekerjaan_ayah', $data['pekerjaan_ayah']);
        $this->db->bind('no_hp_ayah', $data['no_hp_ayah']);
        $this->db->bind('nama_ibu', $data['nama_ibu']);
        $this->db->bind('alamat_ibu', $data['alamat_ibu']);
        $this->db->bind('pekerjaan_ibu', $data['pekerjaan_ibu']);
        $this->db->bind('no_hp_ibu', $data['no_hp_ibu']);
        $this->db->bind('hubungan_kontak_darurat', $data['hubungan_kontak_darurat']);
        $this->db->bind('nama_kontak_darurat', $data['nama_kontak_darurat']);
        $this->db->bind('alamat_kontak_darurat', $data['alamat_kontak_darurat']);
        $this->db->bind('pekerjaan_kontak_darurat', $data['pekerjaan_kontak_darurat']);
        $this->db->bind('no_hp_kontak_darurat', $data['no_hp_kontak_darurat']);
        $this->db->bind('referensi', $data['referensi']);
        $this->db->bind('keinginan_gaji', $data['keinginan_gaji']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM calon_karyawan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLastId()
    {
        $this->db->query("SELECT LAST_INSERT_ID() AS last_id FROM calon_karyawan");

        return $this->db->single();
    }
}