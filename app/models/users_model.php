<?php

class users_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getUsers()
    {
        $this->db->query("SELECT u.*, r.id AS id_role, r.nama_role, k.id AS id_karyawan, k.nama_depan, k.nama_tengah, k.nama_belakang FROM users AS u INNER JOIN master_role AS r ON u.id_role =  r.id LEFT JOIN karyawan AS k ON u.id_karyawan = k.id");
        return $this->db->resultSet();
    }

    public function store($data)
    {
        $query = "INSERT INTO users VALUES ('', :id_karyawan, :id_role, :username, :password, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('id_karyawan', $data['id_karyawan'] ?? null);
        $this->db->bind('id_role', $data['id_role']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE users SET
            id_karyawan = :id_karyawan,
            id_role = :id_role,
            username = :username,
            password = :password,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id_karyawan', $data['id_karyawan'] ?? NULL);
        $this->db->bind('id_role', $data['id_role']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}