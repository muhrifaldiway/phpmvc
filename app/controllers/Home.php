<?php

class Home extends Controller {
    public function index()
    {   
        $data['title'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        
        $this->view('templates/header',$data);
        $this->view('templates/sidebar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
} 