<?php

class Dashboard_model {
    private $table = 'kelas';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    

    public function getAllKelas()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    
    public function getKelasById($id)
    {
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id_kelas');
        $this->db->bind('id_kelas', $id);
        return $this->db->single();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO kelas VALUES ('', :nama)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function hapusDataKelas($id)
    {
        $query = "DELETE FROM kelas WHERE id_kelas = :id_kelas";
        $this->db->query($query);
        $this->db->bind('id_kelas', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKelas($data)
    {
        $query = "UPDATE kelas SET nama = :nama WHERE id_kelas = :id_kelas"; 
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function cariDataKelas()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM kelas WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}