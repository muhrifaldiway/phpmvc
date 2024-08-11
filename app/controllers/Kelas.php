<?php

class Kelas extends Controller {
    public function index()
    {
        $data['title'] = 'Kelas Siswa';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['idkelas'] = $this->model('Kelas_model')->getKelasById($id);

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Kelas';
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('kelas/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Kelas_model')->tambahDataKelas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Kelas_model')->hapusDataKelas($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Kelas_model')->getKelasById($_POST['id_kelas']));
    }

    public function ubah()
    {
        if ($this->model('Kelas_model')->ubahDataKelas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/kelas');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Daftar Kelas';
        $data['kelas'] = $this->model('Kelas_model')->cariDataKelas();

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }
    
}