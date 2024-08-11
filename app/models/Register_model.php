<?php

class Register_model {
    private $table = 'user';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllRegister()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Metode untuk menangani proses registrasi
    public function performRegistration($username, $email, $password)
    {
        // Anda perlu mengimplementasikan kode untuk menyimpan data registrasi ke dalam database
        // Contoh:
        $this->db->query('INSERT INTO ' . $this->table . ' (username, email, password) VALUES (:username, :email, :password)');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        // Jalankan query
        $this->db->execute();
    }
}
