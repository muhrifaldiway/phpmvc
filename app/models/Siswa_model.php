<?php

class Siswa_model {
    private $table = 'siswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    

    public function getAllSiswa()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function JumlahSiswa()
    {
        $query = "SELECT kelas.nama, COUNT(siswa.kelas_id) as jumlah_siswa
                FROM kelas
                LEFT JOIN siswa ON siswa.kelas_id = kelas.id_kelas
                GROUP BY kelas.id_kelas";

        $this->db->query($query);

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
    
    public function getSiswaById($id)
    {
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_siswa=:id_siswa');
        $this->db->bind('id_siswa', $id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO siswa 
                    VALUES 
                    ('', :nama,:kelas_id,:jenis_kelamin,:alamat,:telepon,:keterangan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM siswa WHERE id_siswa = :id_siswa";
        $this->db->query($query);
        $this->db->bind('id_siswa', $id);
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