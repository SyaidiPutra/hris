<?php

class jabatan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getJabatan()
    {
        $this->db->query("SELECT * FROM master_jabatan");
        return $this->db->resultSet();
    }
    
    public function checkExistJabatan($data)
    {
        $this->db->query("SELECT * FROM master_jabatan WHERE nama_jabatan = :data");
        
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function store($data)
    {
        $query = "INSERT INTO master_jabatan VALUES ('', :nama_jabatan, :jobdesc, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama_jabatan', $data['nama_jabatan']);
        $this->db->bind('jobdesc', $data['jobdesc']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE master_jabatan SET
            id = :id,
            nama_jabatan = :nama_jabatan,
            jobdesc = :jobdesc,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_jabatan', $data['nama_jabatan']);
        $this->db->bind('jobdesc', $data['jobdesc']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('d-M-Y h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM master_jabatan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}