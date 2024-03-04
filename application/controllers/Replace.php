<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replace extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_replace');
		$this->load->model('m_detail_barang');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Replace';
        $data['replace'] = $this->m_replace->tampil_replace()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('replace', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_replace()
    {
        $data['title'] = 'Replace';
        $data['Replace'] = $this->m_replace->tampil_datareplace()->result();
        $data['barang'] = $this->m_replace->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_data_replace', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah_replace()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("ganti","id_replace","DRT","DRT"."001","001");
        $nama = $this->input->post('nama');
        $date = $this->input->post('tgl_replace');
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $qty = $this->input->post('qty');
        $keterangan = $this->input->post('keterangan');

        $this->Mmain->qIns("ganti", array(
            $id,
            $nama,
            $date,
            $id_barang,
            $jumlah,
            $qty,
            $keterangan
        ));
        $this->session->set_flashdata('success', 'Data Replace <strong>Berhasil</strong> Ditambahkan!');
        redirect('replace');
    }
    

    public function edit_replace($id)
    {
        $data['title'] = 'Replace';
        $data['Replace'] = $this->m_replace->edit_replace($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_replace', $data);
        $this->load->view('templates/footer');
    }
 
    public function proses_edit_replace()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'id_replace' => $this->input->post('id_replace'),
            'nama' => $this->input->post('nama'),
            'tgl_replace' => $this->input->post('tgl_replace'),
            'id_barang' => $this->input->post('id_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'qty' => $this->input->post('qty'),
            'keterangan' => $this->input->post('keterangan'),

        ];

        if ($this->m_data->edit($data)) {
            $this->session->set_flashdata('success', 'Jenis Barang <strong>Berhasil</strong> Diubah!');
            redirect('replace');
        } else {
            $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Diubah!');
            redirect('replace');
        }
    }

    public function hapus_replace($id)
    {
        $result = $this->m_replace->hapus_replace($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Jenis Barang <strong>Berhasil</strong> Dihapus!');
            redirect('replace');
        } else {
            $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Dihapus!');
            redirect('replace');
        }
    }
}
