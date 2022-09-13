<?php

class dept_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getDept()
    {
        $this->db->query("SELECT * FROM master_dept");
        return $this->db->resultSet();
    }
    
    public function checkExistDept($data)
    {
        $this->db->query("SELECT * FROM master_dept WHERE nama_dept = :data");
        
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function store($data)
    {
        $query = "INSERT INTO master_dept VALUES ('', :nama_dept, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama_dept', $data['nama_dept']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE master_dept SET
            id = :id,
            nama_dept = :nama_dept,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_dept', $data['nama_dept']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('d-M-Y h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM master_dept WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}