<?php

class Matapelajaran extends Controller {
    public function index()
    {
        $data['title'] = 'Daftar Matapelajaran';
        $data['mapel'] = $this->model('Matapelajaran_model')->getAllMapel();

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('matapelajaran/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Matapelajaran_model')->tambahDataMapel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/matapelajaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/matapelajaran');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Matapelajaran_model')->hapusDataMapel($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success');
            header('Location: ' . BASE_URL . '/matapelajaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger');
            header('Location: ' . BASE_URL . '/matapelajaran');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
    
}