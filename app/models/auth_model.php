<?php

class auth_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkUserExist($data)
    {
        $this->db->query("SELECT * FROM `users` WHERE `username` = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function getUser($data)
    {
        $this->db->query("SELECT u.username, u.password, r.nama_role, k.* FROM users AS u INNER JOIN master_role AS r ON u.id_role = r.id LEFT JOIN karyawan AS k ON u.id_karyawan = k.id WHERE u.username = :data");
        $this->db->bind('data', $data);
        return $this->db->single();
    }
}
