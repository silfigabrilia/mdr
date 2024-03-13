<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Replace extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detail_replace');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Detail Replace';
        $data['Detail_replace'] = $this->M_detail_replace->tampil_detail()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_replace', $data);
        $this->load->view('templates/footer');
    }
	

	/* public function init($id)
    {
        $data['title'] = 'Detail_Replace';
        //$data['Detail_Barang'] = $this->m_detail_barang->tampil_detail()->result();
		$render  = $this->Mmain->qRead("detail_ganti det 
        INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang  = '$id' ",
        "det.id_detail_replace, b.nama_barang, det.nama_replace, det.tgl_replace, det.jml_replace, det.qty_replace, det.status, det.keterangan");

        // $a=$this->Mmain->qRead("detail_barang db right OUTER JOIN barang b ON b.id_barang = b.id_barang = b.id_barang","db.id_barang, db.serial_code, db.lokasi, db.qtty");
        $data['Detail_Replace'] = $render->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/detail_barang', $data);
        $this->load->view('templates/footer');
	} */
	
    public function tambah_data_detail()
    {
        $data['title'] = 'Detail Replace';
        $data['Detail_Replace'] = $this->M_detail_replace->tampil_data_detail()->result();
        $data['barang'] = $this->M_detail_replace->getBarang();
		$data['detail_barang'] = $this->M_detail_replace->getseri();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_data_detail', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah_detail()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            // $id = $this->Mmain->autoId("detail_replace","id_detail_replace","DRT","DRT"."001","001");
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("detail_ganti","id_detail_replace","DRT","DRT"."001","001");
        $nama_replace = $this->input->post('nama_replace');
        $date = $this->input->post('tgl_replace');
        $id_barang = $this->input->post('id_barang');
        $jml_replace = $this->input->post('jml_replace');
        $qty_replace = $this->input->post('qty_replace');
        $serial_code = $this->input->post('serial_code');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');

        $this->Mmain->qIns("detail_ganti", array(
            $id,
            $nama_replace,
            $date,
            $id_barang,
            $jml_replace,
            $qty_replace,
            $serial_code,
            $status,
            $keterangan
        ));
        $this->session->set_flashdata('success', 'Data Detail Replace <strong>Berhasil</strong> Ditambahkan!');
        redirect('detail_replace');
    }
    

    public function edit_detail($id)
    {
        $data['title'] = 'Detail Replace';
        $data['Detail_Replace'] = $this->M_detail_replace->edit_detail($id);
		$data['barang'] = $this->M_detail_replace->getBarang();
		$data['detail_barang'] = $this->M_detail_replace->getseri();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_detail', $data);
        $this->load->view('templates/footer');
    }
 
    public function proses_edit_detail()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'id_detail_replace' => $this->input->post('id_detail_replace'),
            'nama_replace' => $this->input->post('nama_replace'),
            'tgl_replace' => $this->input->post('tgl_replace'),
            'id_barang' => $this->input->post('id_barang'),
            'jml_replace' => $this->input->post('jml_replace'),
            'qty_replace' => $this->input->post('qty_replace'),
            'serial_code' => $this->input->post('serial_code'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        if ($this->M_detail_replace->edit_detail_replace($data)) {
            $this->session->set_flashdata('success', 'Jenis Barang <strong>Berhasil</strong> Diubah!');
            redirect('detail_replace');
        } else {
            $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Diubah!');
            redirect('detail_replace');
        }
    }

    public function del_replace($id)
    {
        $result = $this->M_detail_replace->del_replace($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Jenis Barang <strong>Berhasil</strong> Dihapus!');
            redirect('detail_replace');
        } else {
            $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Dihapus!');
            redirect('detail_replace');
        }
    }
}
