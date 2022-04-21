<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_pelanggan($email, $password);
        if ($cek) {
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $level_user = $cek->level_user;
            //session
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email', $email);
            redirect('home');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error','Email Atau Password Salah');
            redirect('pelanggan/login');

        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('nama_pelanggan')=='') {
            $this->ci->session->set_flashdata('error','Anda Belum Login');
            redirect('pelanggan/login');
        }
    }

    public function logout(){
        $this->ci->session->set_userdata('nama_pelanggan');
        $this->ci->session->set_userdata('email');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout');
        redirect('pelanggan/login');
    }
}

/* End of file User_login.php */
