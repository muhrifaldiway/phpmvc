<?php

class Registrasi extends Controller {
    public function index()
    {
        $data['title'] = 'Registrasi';
        $this->view('templates/header', $data);
        $this->view('registrasi/index');
        $this->view('templates/footer');
    }

    // Fungsi untuk menangani proses registrasi
    public function register()
    {
        // Handle proses registrasi di sini
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Dapatkan data dari formulir
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validasi data jika diperlukan

            // Muat model
            $registerModel = $this->model('Register_model');

            // Lakukan registrasi (Anda perlu mengimplementasikan metode ini di model)
            $registerModel->performRegistration($username, $email, $password);

            // Anda dapat mengarahkan ke halaman sukses atau menampilkan pesan sukses
            // Contoh:
            header('Location: ' . BASE_URL . '/Registrasi?success');
            exit;
        }
    }

    // Anda dapat menambahkan metode lain sesuai kebutuhan
}
