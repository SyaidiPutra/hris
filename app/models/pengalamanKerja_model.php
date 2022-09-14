<?php

class pengalamanKerja_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getPengalamanKerja()
    {
        $this->db->query("SELECT * FROM pengalaman_kerja");
        return $this->db->resultSet();
    }

    public function store1($data)
    {
        if($data[0]['nama_perusahaan1'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO pengalaman_kerja VALUES ('', :id_calon_karyawan, :nama_perusahaan, :jabatan, :dept, :durasi, :alasan_berhenti, :jobdesc, :gaji_terakhir, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
            $this->db->bind('nama_perusahaan', $data[0]['nama_perusahaan1']);
            $this->db->bind('jabatan', $data[0]['jabatan1']);
            $this->db->bind('dept', $data[0]['dept1']);
            $this->db->bind('durasi', $data[0]['durasi1']);
            $this->db->bind('alasan_berhenti', $data[0]['alasan_berhenti1']);
            $this->db->bind('jobdesc', $data[0]['jobdesc1']);
            $this->db->bind('gaji_terakhir', $data[0]['gaji_terakhir1']);
            $this->db->bind('created_at', date('Y-m-d h:i:s'));
            $this->db->bind('updated_at', null);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function store2($data)
    {
        if($data[0]['nama_perusahaan2'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO pengalaman_kerja VALUES ('', :id_calon_karyawan, :nama_perusahaan, :jabatan, :dept, :durasi, :alasan_berhenti, :jobdesc, :gaji_terakhir, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
            $this->db->bind('nama_perusahaan', $data[0]['nama_perusahaan2']);
            $this->db->bind('jabatan', $data[0]['jabatan2']);
            $this->db->bind('dept', $data[0]['dept2']);
            $this->db->bind('durasi', $data[0]['durasi2']);
            $this->db->bind('alasan_berhenti', $data[0]['alasan_berhenti2']);
            $this->db->bind('jobdesc', $data[0]['jobdesc2']);
            $this->db->bind('gaji_terakhir', $data[0]['gaji_terakhir2']);
            $this->db->bind('created_at', date('Y-m-d h:i:s'));
            $this->db->bind('updated_at', null);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function store3($data)
    {
        if($data[0]['nama_perusahaan3'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO pengalaman_kerja VALUES ('', :id_calon_karyawan, :nama_perusahaan, :jabatan, :dept, :durasi, :alasan_berhenti, :jobdesc, :gaji_terakhir, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
            $this->db->bind('nama_perusahaan', $data[0]['nama_perusahaan3']);
            $this->db->bind('jabatan', $data[0]['jabatan3']);
            $this->db->bind('dept', $data[0]['dept3']);
            $this->db->bind('durasi', $data[0]['durasi3']);
            $this->db->bind('alasan_berhenti', $data[0]['alasan_berhenti3']);
            $this->db->bind('jobdesc', $data[0]['jobdesc3']);
            $this->db->bind('gaji_terakhir', $data[0]['gaji_terakhir3']);
            $this->db->bind('created_at', date('Y-m-d h:i:s'));
            $this->db->bind('updated_at', null);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update($data)
    {
        $query = "UPDATE pengalaman_kerja SET
            id = :id,
            id_calon_karyawan = :id_calon_karyawan,
            nama_perusahaan = :nama_perusahaan,
            jabatan = :jabatan,
            dept = :dept,
            durasi = :durasi,
            alasan_berhenti = :alasan_berhenti,
            jobdesc = :jobdesc,
            gaji_terakhir = :gaji_terakhir,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id_pengalaman_kerja']);
        $this->db->bind('id_calon_karyawan', $data['pk_id_calon_karyawan']);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('dept', $data['dept']);
        $this->db->bind('durasi', $data['durasi']);
        $this->db->bind('alasan_berhenti', $data['alasan_berhenti']);
        $this->db->bind('jobdesc', $data['jobdesc']);
        $this->db->bind('gaji_terakhir', $data['gaji_terakhir']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id_pengalaman_kerja']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM pengalaman_kerja WHERE id_calon_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}