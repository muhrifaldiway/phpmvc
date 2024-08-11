<?php

class Dashboard extends Controller {
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->JumlahSiswa();

        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
    
}