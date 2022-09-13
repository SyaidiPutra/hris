<?php

class roles_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getRoles()
    {
        $this->db->query("SELECT * FROM master_role");
        return $this->db->resultSet();
    }

    public function store($data)
    {
        $query = "INSERT INTO master_role VALUES ('', :nama_role, :keterangan, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('nama_role', $data['nama_role']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE master_role SET
            id = :id,
            nama_role = :nama_role,
            keterangan = :keterangan,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_role', $data['nama_role']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('d-M-Y h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM master_role WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}