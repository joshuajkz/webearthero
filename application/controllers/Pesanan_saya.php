<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'v_pesanan_saya' => $this->m_home->get_all_data(),
            'isi' => 'v_pesanan_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
