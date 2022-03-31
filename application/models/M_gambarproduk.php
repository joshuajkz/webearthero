<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambarproduk extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('tbl_produk.*,COUNT(tbl_gambar.id_produk)as total_gambar');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_produk = tbl_produk.id_produk', 'left');
        $this->db->group_by('tbl_produk.id_produk');
        $this->db->order_by('tbl_produk.id_produk', 'desc');
        return $this->db->get()->result();
    }
    public function get_gambar($id_produk){
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();
    }
}
