<?php

class Matapelajaran_model {
    private $table = 'mapel';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    

    public function getAllMapel()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasSiswa()
    {
        $query = "SELECT kelas.nama, siswa.kelas_id
                FROM kelas
                INNER JOIN siswa ON siswa.kelas_id = kelas.id_kelas";
        $this->db->query($query);
        return $this->db->resultSet();
    }


    
    public function getMapelById($id)
    {
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_mapel=:id_mapel');
        $this->db->bind('id_mapel', $id);
        return $this->db->single();
    }

    public function tambahDataMapel($data)
    {
        $query = "INSERT INTO mapel
                    VALUES 
                    ('', :nama)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function hapusDataMapel($id)
    {
        $query = "DELETE FROM mapel WHERE id_mapel = :id_mapel";
        $this->db->query($query);
        $this->db->bind('id_mapel', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMapel($data)
    {
        $query = "UPDATE mapel SET nama = :nama WHERE id_mapel = :id_mapel"; 
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_mapel', $data['id_mapel']);
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