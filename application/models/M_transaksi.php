<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
        
    }
    public function simpan_rincian_transaksi($data_rincian)
    {
        $this->db->insert('tbl_rincian_transaksi', $data_rincian);
        
    }
}