<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_request extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail_req');
		$this->load->model('m_detail_barang');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Detail_Request';
        //$data['Detail_Request'] = $this->m_detail_req->tampil_request()->result();
		$render  = $this->Mmain->qRead("detail_request det 
        RIGHT OUTER JOIN barang b ON det.id_barang, det.nama_barang = b.id_barang,det.nama_barang WHERE det.id_barang  = '$id' ",
        "det.id_detail_request, b.nama_barang, det.serial_code, det.lokasi, det.qtty");
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_request/detail_request', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Detail_Request';
        $data['Detail_Request'] = $this->m_detail_req->tampil_datarequest()->result();
		$data['barang'] = $this->m_detail_barang->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_request/adddetail', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("detail_request","id_detail_request","DRQ","DRQ"."001","001");

        // $data = [
        //     'id_detail_barang' => $this->input->post('id_request'),
        //     'id_barang' => $this->input->post('nama'),
        //     'tgl_request' => $this->input->post('tgl_request'),
        //     'id_barang' => $this->input->post('id_barang'),
        //     'jumlah' => $this->input->post('jumlah'),
        //     'keterangan' => $this->input->post('keterangan'),

        // ];

        $nama_barang_request = $this->input->post('nama_barang_request');
        $jumlah_request = $this->input->post('jumlah_request');
        $keterangan = $this->input->post('keterangan');
        $id_barang = $this->input->post('id_barang');
        $serial_number = $this->input->post('serial_number');
        $jumlah = $this->input->post('jumlah');
        $tanggal_waktu = $this->input->post('tanggal_waktu');
        $status = $this->input->post('status');
        
        $this->Mmain->qIns("detail_request", array(
            $id,
            $nama_barang_request,
            $jumlah_request,
            $keterangan,
            $id_barang,
            $serial_number,
            $jumlah,
            $tanggal_waktu,
            $status,

        ));

        $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
        redirect('detail_request');

    }

    public function edit($id){
        $data['title'] = 'Detail_Request';
        $data['Detail_Request'] = $this->m_detail_req->edit_request($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_request/editdetail',$data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        // $id = $this->Mmain->autoId("detail_request","id_detail_request","DRQ","DRQ"."001","001");

        $data = [
            'id_detail_request' => $this->input->post('id_detail_request'),
            'nama_barang_request' => $this->input->post('nama_barang_request'),
            'jumlah_request' => $this->input->post('jumlah_request'),
            'keterangan' => $this->input->post('keterangan'),
            'id_barang' => $this->input->post('id_barang'),
            'serial_number' => $this->input->post('serial_number'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_waktu' => $this->input->post('tanggal_waktu'),
            'status' => $this->input->post('status'),

        ];

        if ($this->m_detail_req->ubah_request($data)) {
            $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diubah!');
            redirect('detail_request');
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diubah!');
            redirect('detail_request');
        }
    }

    public function update(){
        // $id_request = $this->input->post('id_request');
        // $nama = $this->input->post('nama');
        // $tgl_request = $this->input->post('tgl_request');
        // $id_barang = $this->input->post('barang');
        // $jumlah = $this->input->post('jumlah');
        // $keterangan = $this->input->post('keterangan');

        $nama_barang_request = $this->input->post('nama_barang_request');
        $jumlah_request = $this->input->post('jumlah_request');
        $keterangan = $this->input->post('keterangan');
        $id_barang = $this->input->post('id_barang');
        $serial_number = $this->input->post('serial_number');
        $jumlah = $this->input->post('jumlah');
        $tanggal_waktu = $this->input->post('tanggal_waktu');
        $status = $this->input->post('status');

        $data = array(
        'nama_barang_request' => $nama_barang_request,
        'jumlah_request' => $jumlah_request,
        'keterangan' =>$keterangan,
        'id_barang' => $id_barang,
        'serial_number' => $serial_number,
        'jumlah' => $jumlah,
        'tanggal_waktu' => $tanggal_waktu,
        'status' => $status,
        );
        
        $where = array(
        'id_detail_request' => $id_detail_request
        );
        
        $this->m_detail_req->update_data_detail($where,$data,'detail_request');
        redirect('detail_request');
       }

    public function hapus_data($id)
       {
           $result = $this->m_detail_req->hapus_request($id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
               redirect('detail_request');
           } else {
               $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
               redirect('detail_request');
           }
       }
}