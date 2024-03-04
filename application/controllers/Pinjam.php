<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();

        $this->load->model('m_pinjam');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pinjam';
        $data['Pinjam'] = $this->m_pinjam->pinjam()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjam/pinjam', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pinjam()
    {
        $data['title'] = 'TambahPinjam';
        $data['Pinjam'] = $this->m_pinjam->tambah_pinjam()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjam/tambah_data', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'id_pinjam' => $this->input->post('id_pinjam'),
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'nama_pemberi' => $this->input->post('nama_pemberi'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'jam_pinjam' => $this->input->post('jam_pinjam'),
            'jam_kembali' => $this->input->post('jam_kembali'),
            'keterangan' => $this->input->post('keterangan'),

        ];

        $nama_peminjam = $this->input->post('nama_peminjam');
        $nama_penerima = $this->input->post('nama_penerima');
        $nama_pemberi = $this->input->post('nama_pemberi');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $jam_pinjam = $this->input->post('jam_pinjam');
        $jam_kembali = $this->input->post('jam_kembali');
        $keterangan = $this->input->post('keterangan');

        // var_dump($nama_peminjam, $nama_penerima, $nama_pemberi,);
        // die;
        $this->Mmain->qIns("pinjam", array(

            0,
            $nama_peminjam,
            $nama_penerima,
            $nama_pemberi,
            $tgl_pinjam,
            $tgl_kembali,
            $jam_pinjam,
            $jam_kembali,
            $keterangan

        ));

        $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
        redirect('pinjam');
    }
    public function edit_data($id)
    {
        $data['title'] = 'Pinjam';
        $data['Pinjam'] = $this->m_pinjam->edit_data($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjam/edit_data', $data);
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
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'nama_pemberi' => $this->input->post('nama_pemberi'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'jam_pinjam' => $this->input->post('jam_pinjam'),
            'jam_kembali' => $this->input->post('nama_kembali'),
            'keterangan' => $this->input->post('keterangan'),


        ];

        if ($this->m_pinjam->ubah($data)) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
            redirect('pinjam');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
            redirect('pinjam');
        }
    }
    public function hapus_data($id)
    {
        $result = $this->m_pinjam->hapus($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
            redirect('pinjam');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
            redirect('pinjam');
        }
    }
}
