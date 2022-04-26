<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }


    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja',
            'isi' => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name')
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );

            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang berhasil di Update !');
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function checkout()
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules(
            'provinsi',
            'Provinsi',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'ekspedisi',
            'Ekspedisi',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'paket',
            'Paket',
            'required',
            array('required' => '%s Harus Diisi !')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Checkout Belanja',
                'isi' => 'v_checkout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            /* Simpan ke Tabel Transaksi */
            $data = array(
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'ekspedisi' => $this->input->post('ekspedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'akumulasi_harga' => $this->input->post('akumulasi_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            /* Simpan ke Tabel Rincian Transaksi */
            $this->m_transaksi->simpan_transaksi($data);
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rincian = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_produk' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rincian_transaksi($data_rincian);
            }
            $this->session->set_flashdata('pesan', 'Pesanan berhasil di Proses !');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
