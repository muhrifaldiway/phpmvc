<?php

class Nilai extends Controller {
    public function index()
    {
        $data['title'] = 'Nilai Siswa';

        // Tambahkan logika untuk menangani filter kelas di sini
        if (isset($_POST['filterKelas'])) {
            $selectedKelas = $_POST['filterKelas'];
            // Lakukan query sesuai dengan filter kelas
            $data['nilai'] = $this->model('Nilai_model')->getNilaiByKelas($selectedKelas);
        } else {
            // Jika tidak ada filter, ambil semua nilai
            $data['nilai'] = $this->model('Nilai_model')->getAllNilai();
        }
    
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['nama'] = $this->model('Nilai_model')->getNamaSiswa();
    
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('nilai/index', $data);
        $this->view('templates/footer');
    }

    public function getSiswaByKelasAjax()
    {
        $kelasId = $_POST['kelas_id'];
        $siswa = $this->model('Nilai_model')->getSiswaByKelas($kelasId);
        echo json_encode($siswa);
        exit;
    }


    public function detail($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Nilai_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/Nilai');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/Nilai');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Nilai_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success');
            header('Location: ' . BASE_URL . '/nilai');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger');
            header('Location: ' . BASE_URL . '/nilai');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Nilai_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/nilai');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/nilai');
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