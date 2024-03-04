<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Request';
        $data['Request'] = $this->m_data->tampil_request()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('request', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Request';
        $data['Request'] = $this->m_data->tampil_datarequest()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('addrequest', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("request","id_request","RQ","RQ"."001","001");

        // $data = [
        //     'id_detail_barang' => $this->input->post('id_request'),
        //     'id_barang' => $this->input->post('nama'),
        //     'tgl_request' => $this->input->post('tgl_request'),
        //     'id_barang' => $this->input->post('id_barang'),
        //     'jumlah' => $this->input->post('jumlah'),
        //     'keterangan' => $this->input->post('keterangan'),

        // ];

        $nama = $this->input->post('nama');
        $tgl_request = $this->input->post('tgl_request');
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        
        $this->Mmain->qIns("request", array(
            $id,
            $nama,
            $tgl_request,
            $barang,
            $jumlah,
            $keterangan

        ));

        $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
        redirect('request');

    }

    public function edit($id){
        $data['title'] = 'Request';
        $data['Request'] = $this->m_data->edit_request($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_request',$data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("request","id_request","RQ","RQ"."001","001");

        $data = [
            'id_request' => $this->input->post('id_request'),
            'nama' => $this->input->post('nama'),
            'tgl_request' => $this->input->post('tgl_request'),
            'id_barang' => $this->input->post('id_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),

        ];

        if ($this->m_data->ubah_request($data)) {
            $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diubah!');
            redirect('request');
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diubah!');
            redirect('request');
        }
    }

    public function update(){
        $id_request = $this->input->post('id_request');
        $nama = $this->input->post('nama');
        $tgl_request = $this->input->post('tgl_request');
        $id_barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        $data = array(
        'nama' => $nama,
        'tgl_request' => $tgl_frequest,
        'id_barang' => $id_barang,
        'jumlah' => $jumlah,
        'keterangan' => $keterangan,
        );
        
        $where = array(
        'id_request' => $id_request
        );
        
        $this->m_data->update_data_request($where,$data,'request');
        redirect('request');
       }

    public function hapus_data($id)
       {
           $result = $this->m_data->hapus_request($id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
               redirect('request');
           } else {
               $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
               redirect('request');
           }
       }
}