<?php

class Login extends Controller {
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header',$data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

       
}