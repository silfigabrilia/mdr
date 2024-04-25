<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Replace extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detail_replace');
		$this->load->model('m_detail_barang');
		$this->load->database();
        $this->load->model('Mmain');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Detail Replace';
        $data['Detail_Replace'] = $this->Mmain->qRead('detail_ganti');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_replace', $data);
        $this->load->view('templates/footer');
    }
	
public function init($id)
 {
        $data['title'] = 'Detail_Replace';
        //$data['Detail_Barang'] = $this->m_detail_barang->tampil_detail()->result();
		$render  = $this->Mmain->qRead("detail_ganti det
        INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang  = '$id' ",
        "det.id_detail_replace, det.nama_replace, det.tgl_replace, det.id_barang, det.jml_replace, det.qty_replace, det.serial_code, det.status, det.keterangan");
        $data['Detail_Replace'] = $render->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_replace', $data);
        $this->load->view('templates/footer');
    }
    
	public function tambah_data_detail()
	 {
        $data['title'] = 'Detail_Replace';
        //$data['Detail_Replace'] = $this->M_detail_replace->tampil_data_detail()->result();
		$render  = $this->Mmain->qRead("detail_ganti det
        INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang",
        "det.id_detail_replace, det.nama_replace, det.tgl_replace, det.id_barang, det.jml_replace, det.qty_replace, det.serial_code, det.status, det.keterangan");
        $data['Detail_Replace'] = $render->result();
		$data['barang'] = $this->M_detail_replace->getBarang();
		#$data['detail_barang'] = $this->m_detail_req->getseri();
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
        redirect("detail_replace/init/".$id_barang);
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

    // Menggunakan metode qUpdpart untuk mengubah data
    $this->Mmain->qUpdpart('detail_ganti', 'id_detail_replace', $data['id_detail_replace'], 
        ['nama_replace', 'tgl_replace', 'id_barang', 'jml_replace', 'qty_replace', 'serial_code', 'status', 'keterangan'], 
        [$data['nama_replace'], $data['tgl_replace'], $data['id_barang'], $data['jml_replace'], 
        $data['qty_replace'], $data['serial_code'], $data['status'], $data['keterangan']]);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Jenis Barang <strong>Berhasil</strong> Diubah!');
        redirect('detail_replace/init/'.$data['id_barang']);
    } else {
        $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Diubah!');
        redirect('detail_replace');
    }
}

	public function update(){
        $nama_replace = $this->input->post('nama_barang_request');
		$date =  $this->input->post('tgl_replace');
        $id_barang = $this->input->post('id_barang');
        $jml_replace = $this->input->post('jml_replace');
        $qty_replace = $this->input->post('qty_replace');
        $serial_code = $this->input->post('serial_code');
        $status = $this->input->post('status');
        $keterangan= $this->input->post('keterangan');
       

        $data = array(
        'nama_replace' => $nama_replace,
        'tgl_replace' => $date,
        'id_barang' =>$id_barang,
        'jml_replace' => $jml_replace,
        'qty_replace' => $qty_replace,
        'serial_code' => $serial_code,
        'status' => $status,
        'keterangan' => $keterangan,
        );
        
        $where = array(
        'id_detail_replace' => $id_detail_replace
        );
        
        $this->M_detail_replace->update_data($where,$data,'detail_ganti');
        redirect('detail_replace');
       }

   public function del_replace($id,$idBarang)
{
    $result = $this->Mmain->qDel("detail_ganti", "id_detail_replace", $id);
    if ($result) {
        redirect("detail_replace/init/".$idBarang);
    } else {
        $this->session->set_flashdata('error', 'Jenis Barang <strong>Gagal</strong> Dihapus!');
        redirect("detail_replace/init/".$idBarang);
    }
}
}