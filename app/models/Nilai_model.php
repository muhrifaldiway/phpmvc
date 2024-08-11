<?php

class Nilai_model {
    private $table = 'nilai';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    

    public function getAllNilai()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSiswaByKelas($kelasId)
    {
        $query = "SELECT * FROM siswa WHERE kelas_id = :kelas_id";
        $this->db->query($query);
        $this->db->bind('kelas_id', $kelasId);
        return $this->db->resultSet();
    }


    public function getNilaiByKelas($kelasId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE kelas_id = :kelas_id";
        $this->db->query($query);
        $this->db->bind('kelas_id', $kelasId);
        return $this->db->resultSet();
    }

    public function getNamaSiswa()
    {
        $query = "SELECT siswa.nama, nilai.siswa_id
        FROM siswa
        INNER JOIN nilai ON nilai.siswa_id = siswa.id_siswa";
        $this->db->query($query);
        return $this->db->resultSet();
    }


    
    public function getNilaiById($id)
    {
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_nilai=:id_nilai');
        $this->db->bind('id_nilai', $id);
        return $this->db->single();
    }

    public function tambahDataNilai($data)
    {
        $query = "INSERT INTO nilai
                    VALUES 
                    ('', :kelas_id, :siswa_id,:praktek_harian,:praktek_semester,:praktek_akhir,:nilai_akhir,:keterangan)";

        $this->db->query($query);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('siswa_id', $data['siswa_id']);
        $this->db->bind('praktek_harian', $data['praktek_harian']);
        $this->db->bind('praktek_semester', $data['praktek_semester']);
        $this->db->bind('praktek_akhir', $data['praktek_akhir']);
        $this->db->bind('nilai_akhir', $data['nilai_akhir']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function hapusDataNilai($id)
    {
        $query = "DELETE FROM nilai WHERE id_nilai = :id_nilai";
        $this->db->query($query);
        $this->db->bind('id_nilai', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataNilai($data)
    {
        $query = "UPDATE nilai 
                    SET 
                praktek_harian = :praktek_harian,
                praktek_semester = :praktek_semester,
                praktek_akhir = :praktek_akhir,
                nilai_akhir = :nilai_akhir,
                keterangan = :keterangan                    
                WHERE id_nilai = :id_nilai"; 

        $this->db->query($query);
        $this->db->bind('praktek_harian', $data['praktek_harian']);
        $this->db->bind('praktek_semester', $data['praktek_semester']);
        $this->db->bind('praktek_akhir', $data['praktek_akhir']);
        $this->db->bind('nilai_akhir', $data['nilai_akhir']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id_nilai', $data['id_nilai']);
        $this->db->execute(); 
        return $this->db->rowCount();
    }

    public function cariDataNilai()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM kelas WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}