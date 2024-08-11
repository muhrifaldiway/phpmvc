<?php

class About extends Controller {

    public function index($nama = 'Rifaldi', $pekerjaan = 'Guru', $umur = 33)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['title'] = 'About';
        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {   
        $data['title'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('about/page',$data);
        $this->view('templates/footer');
    }
}