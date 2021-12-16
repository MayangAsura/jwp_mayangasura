<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'm_auth');

        if (!$this->session->userdata('id'))
			redirect('auth');
    }

    public function index(){
        
        $user = $this->m_auth->get_information_access($this->session->userdata('id'));
        
        $data = [
            'user'    => $user, 
            'data'    => $user,   
            'js'      => 'home',  
            'title'   => 'Home',
            'content' => 'pages/home',
        ];
        
        $this->load->view('index', $data);
        
    }

}