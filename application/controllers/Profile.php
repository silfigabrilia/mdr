<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model Auth_model
        $this->load->model('Auth_model');
        // Cek apakah pengguna sudah login, jika tidak, redirect ke halaman login
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Auth_model->userdata($email);
         //var_dump($data); // Tampilkan data sebelum memuat view
        //die;
        // Load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile/user', $data);
        $this->load->view('templates/footer');
    }
}
