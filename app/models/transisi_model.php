<?php

class transisi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getTransisi()
    {
        $this->db->query("SELECT * FROM master_transisi");
        return $this->db->resultSet();
    }
    
    public function checkExistTransisi($data)
    {
        $this->db->query("SELECT * FROM master_transisi WHERE nama_transisi = :data");
        
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function store($data)
    {
        $query = "INSERT INTO master_transisi VALUES ('', :nama_transisi, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama_transisi', $data['nama_transisi']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE master_transisi SET
            id = :id,
            nama_transisi = :nama_transisi,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_transisi', $data['nama_transisi']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('d-M-Y h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM master_transisi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}