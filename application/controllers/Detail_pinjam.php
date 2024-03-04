<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pinjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();

        $this->load->model('M_detail_pinjam');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index($id)
    {
        $data['title'] = 'Detail_pinjam';
        $data['Detail_pinjam'] = $this->M_detail_pinjam->tampil_detail()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_pinjam/detail_pinjam', $data);
        $this->load->view('templates/footer');
    }
	
	
	    public function init($id)
    {
        $data['title'] = 'Detail_pinjam';
        //$data['Detail_pinjam'] = $this->M_detail_pinjam->tampil_detail()->result();
        $data['Detail_pinjam'] = $this->Mmain->qRead("pinjam where id_pinjam ='$id' ","")->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_pinjam/detail_pinjam', $data);
        $this->load->view('templates/footer');
    }
	
    public function tambah_detail()
    {
        $data['title'] = 'TambahDetail';
        $data['Detail_pinjam'] = $this->M_detail_pinjam->tambah_detail()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_pinjam/tambah_data', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }

        $id = $this->Mmain->autoId("detail_pinjam", "id_detail_pinjam", "DP", "DP" . "001", "001");

        $id_pinjam = $this->input->post('id_pinjam');
        $id_detail_barang = $this->input->post('id_detail_barang');
        $keterangan = $this->input->post('keterangan');

        $this->Mmain->qIns("detail_pinjam", array(

            $id,
            $id_pinjam,
            $id_detail_barang,
            $keterangan,

        ));
        // $data = [
        //     'id_pinjam' => $this->input->post('id_pinjam'),
        //     'id_detail_barang' => $this->input->post('id_detail_barang'),
        //     'keterangan' => $this->input->post('keterangan'),
        // ];

        // $this->db->insert('detail_pinjam', $data);
        $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
        redirect('detail_pinjam');
    }

    public function edit_data($id)
    {
        $data['title'] = 'edit_detail';
        $data['Detail_pinjam'] = $this->M_detail_pinjam->edit_data($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_pinjam/edit', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'id_pinjam' => $this->input->post('id_pinjam'),
            'id_detail_barang' => $this->input->post('id_detail_barang'),
            'keterangan' => $this->input->post('keterangan'),

        ];

        if ($this->M_detail_pinjam->ubah($data)) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
            redirect('detail_pinjam');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
            redirect('detail_pinjam');
        }
    }
	

    public function hapus_data($id)
    {
        $result = $this->M_detail_pinjam->hapus($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
            redirect('detail_pinjam');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
            redirect('detail_pinjam');
        }
    }
}
