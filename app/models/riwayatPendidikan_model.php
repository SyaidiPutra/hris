<?php

class riwayatPendidikan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getRiwayatPendidikan($id)
    {
        $this->db->query("SELECT rp.*, ck.nama_depan FROM riwayat_pendidikan AS rp LEFT JOIN calon_karyawan AS ck ON rp.id_calon_karyawan = ck.id WHERE id_calon_karyawan = :id");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function store1($data)
    {
        $query = "INSERT INTO riwayat_pendidikan VALUES ('', :id_calon_karyawan, :jenis_pendidikan, :jenjang_pendidikan, :program_keahlian, :nama_lembaga, :alamat_lembaga, :berijazah, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
        $this->db->bind('jenis_pendidikan', $data[0]['jenis_pendidikan1']);
        $this->db->bind('jenjang_pendidikan', $data[0]['jenjang_pendidikan1']);
        $this->db->bind('program_keahlian', $data[0]['program_keahlian1']);
        $this->db->bind('nama_lembaga', $data[0]['nama_lembaga1']);
        $this->db->bind('alamat_lembaga', $data[0]['alamat_lembaga1']);
        $this->db->bind('berijazah', $data[0]['berijazah1']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function store2($data)
    {
        if($data[0]['jenis_pendidikan2'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO riwayat_pendidikan VALUES ('', :id_calon_karyawan, :jenis_pendidikan, :jenjang_pendidikan, :program_keahlian, :nama_lembaga, :alamat_lembaga, :berijazah, :created_at, :updated_at)";
            $this->db->query($query);
            $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
            $this->db->bind('jenis_pendidikan', $data[0]['jenis_pendidikan2']);
            $this->db->bind('jenjang_pendidikan', $data[0]['jenjang_pendidikan2']);
            $this->db->bind('program_keahlian', $data[0]['program_keahlian2']);
            $this->db->bind('nama_lembaga', $data[0]['nama_lembaga2']);
            $this->db->bind('alamat_lembaga', $data[0]['alamat_lembaga2']);
            $this->db->bind('berijazah', $data[0]['berijazah2']);
            $this->db->bind('created_at', date('Y-m-d h:i:s'));
            $this->db->bind('updated_at', null);

            $this->db->execute();

            return $this->db->rowCount();
        } 
    }

    public function store3($data)
    {
        if($data[0]['jenis_pendidikan3'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO riwayat_pendidikan VALUES ('', :id_calon_karyawan, :jenis_pendidikan, :jenjang_pendidikan, :program_keahlian, :nama_lembaga, :alamat_lembaga, :berijazah, :created_at, :updated_at)";

            $this->db->query($query);
            $this->db->bind('id_calon_karyawan', $data[1]['last_id']);
            $this->db->bind('jenis_pendidikan', $data[0]['jenis_pendidikan3']);
            $this->db->bind('jenjang_pendidikan', $data[0]['jenjang_pendidikan3']);
            $this->db->bind('program_keahlian', $data[0]['program_keahlian3']);
            $this->db->bind('nama_lembaga', $data[0]['nama_lembaga3']);
            $this->db->bind('alamat_lembaga', $data[0]['alamat_lembaga3']);
            $this->db->bind('berijazah', $data[0]['berijazah3']);
            $this->db->bind('created_at', date('Y-m-d h:i:s'));
            $this->db->bind('updated_at', null);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update($data)
    {
        // var_dump($data)       ;
        // die;
            $query = "UPDATE riwayat_pendidikan SET
            id = :id,
            id_calon_karyawan = :id_calon_karyawan,
            jenis_pendidikan = :jenis_pendidikan,
            jenjang_pendidikan = :jenjang_pendidikan,
            program_keahlian = :program_keahlian,
            nama_lembaga = :nama_lembaga,
            alamat_lembaga = :alamat_lembaga,
            berijazah = :berijazah,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_calon_karyawan', $data['id_calon_karyawan']);
        $this->db->bind('jenis_pendidikan', $data['jenis_pendidikan']);
        $this->db->bind('jenjang_pendidikan', $data['jenjang_pendidikan']);
        $this->db->bind('program_keahlian', $data['program_keahlian']);
        $this->db->bind('nama_lembaga', $data['nama_lembaga']);
        $this->db->bind('alamat_lembaga', $data['alamat_lembaga']);
        $this->db->bind('berijazah', $data['berijazah']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM riwayat_pendidikan WHERE id_calon_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}