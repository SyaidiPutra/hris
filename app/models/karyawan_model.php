<?php

class karyawan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKaryawan()
    {
        $this->db->query("SELECT * FROM karyawan");
        return $this->db->resultSet();
    }
}