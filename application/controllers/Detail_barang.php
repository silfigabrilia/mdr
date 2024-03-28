<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_barang extends CI_Controller
{
private $mainTable = 'detail_barang';
var $data="id_barang";

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Commonfunction','','fn');
        $this->load->model('m_detail_barang');
        $this->load->model('Mmain');
        $this->load->helper('url');
    }
	
    public function index()
    {
        $data['title'] = 'Detail_Barang';
        //$data['Detail_Barang'] = $this->m_detail_barang->tampil_detail()->result();
		$data['Detail_Barang'] = $this->m_detail_barang->tampil_detail()->result();
       // $render  = $this->Mmain->qRead("detail_barang det 
        //INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang  = '$id' ",
        //"det.id_detail_barang, b.nama_barang, det.serial_code, det.lokasi, det.qtty");

        // $a=$this->Mmain->qRead("detail_barang db right OUTER JOIN barang b ON b.id_barang = b.id_barang = b.id_barang","db.id_barang, db.serial_code, db.lokasi, db.qtty");
        //$data['Detail_Barang'] = $render->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/detail_barang', $data);
        $this->load->view('templates/footer');
    }
	
	    public function init($id)
    {
        $data['title'] = 'Detail_Barang';
        //$data['Detail_Barang'] = $this->m_detail_barang->tampil_detail()->result();
		$render  = $this->Mmain->qRead("detail_barang det 
        INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang  = '$id' ",
        "det.id_detail_barang, b.nama_barang, det.serial_code, det.lokasi, det.qtty");

        // $a=$this->Mmain->qRead("detail_barang db right OUTER JOIN barang b ON b.id_barang = b.id_barang = b.id_barang","db.id_barang, db.serial_code, db.lokasi, db.qtty");
        $data['Detail_Barang'] = $render->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Detail_Barang';
        //$data['Detail_Barang'] = $this->m_detail_barang->tampil_datadetail()->result();
		$render  = $this->Mmain->qRead("detail_barang det 
        INNER JOIN barang b ON det.id_barang = b.id_barang WHERE det.id_barang ",
        "det.id_detail_barang, b.nama_barang, det.serial_code, det.lokasi, det.qtty");
		$data['Detail_Barang'] = $render->result();
        $data['barang'] = $this->m_detail_barang->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/add', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        // $this->_validasi();
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("detail_barang","id_detail_barang","DB","DB"."001","001");

        $id_barang = $this->input->post('id_barang');
        $serial_code = $this->input->post('serial_code');
        $lokasi = $this->input->post('lokasi');
        $qtty = $this->input->post('qtty');
        
        $this->Mmain->qIns("detail_barang", array(
            $id,
            $id_barang,
            $serial_code,
            $lokasi,
            $qtty,
        ));

        $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
        redirect("detail_barang/init/".$id_barang);
    }

    public function edit($id){
        $data['title'] = 'Detail_Barang';
        $data['Detail_Barang'] = $this->m_detail_barang->edit_detail($id);
		//$render = $this->Mmain->qRead("detail_barang WHERE id_detail_barang='".$id."'","id_detail_barang","")->row()->id_detail_barang;
		//$render=$this->Mmain->qRead("detail_barang det WHERE id_detail_barang = '$id'");
		//$render = $this->Mmain->qRead("detail_barang WHERE id_detail_barang = '$id'");
		/* $render = $this->Mmain->qRead("detail_barang WHERE id_detail_barang = '$id'");
		$data['Detail_Barang'] = $render->result(); */
		$data['barang'] = $this->m_detail_barang->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/editdetail',$data);
        $this->load->view('templates/footer');
    }

    /* public function proses_ubah($id)
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        // $id = $this->Mmain->autoId("detail_request","id_detail_request","DRQ","DRQ"."001","001");

        /* $data = [
            'id_detail_barang' => $id,
            'id_barang' => $this->input->post('id_barang'),
            'serial_code' => $this->input->post('serial_code'),
            'lokasi' => $this->input->post('lokasi'),
            'qtty' => $this->input->post('qtty'),
        ]; */
		/* $id_detail_barang = $this->input->post('id_detail_barang');
		$id_barang = $this->input->post('id_barang');
        $serial_code = $this->input->post('serial_code');
        $lokasi = $this->input->post('lokasi');
        $qtty = $this->input->post('qtty');
		
		$this->Mmain->qUpd("detail_barang", array(
            $id,
            $id_barang,
            $serial_code,
            $lokasi,
            $qtty,
        ));  */

         /* if ($this->Mmain->qUpd($data)) {
            $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diubah!');
			//echo $data;
           redirect("detail_barang/init/".$data['id_barang']);
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diubah!');
            redirect('detail_barang');
        } 
		
		$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> DiUpdate!');
        redirect("detail_barang/init/".$id_barang);
		
    } */ 
	
	public function proses_ubah($id)
	{
		if ($this->session->login['role'] == 'admin') {
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		
		// Mengambil nilai-nilai yang dikirimkan melalui form
		$data = [
			'id_detail_barang' => $id,
			'id_barang' => $this->input->post('id_barang'),
			'serial_code' => $this->input->post('serial_code'),
			'lokasi' => $this->input->post('lokasi'),
			'qtty' => $this->input->post('qtty'),
		];

		// Load database and model
		$this->load->database();
		$this->load->model('Mmain');

		// Menggunakan metode qUpdpart untuk mengubah data
		$this->Mmain->qUpdpart($this->mainTable, 'id_detail_barang', $data['id_detail_barang'], ['id_barang', 'serial_code', 'lokasi', 'qtty'], [$data['id_barang'], $data['serial_code'], $data['lokasi'], $data['qtty']]);

		// Set flash data for success notification
		$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
		
		// Redirect to the appropriate page
		redirect("detail_barang/init/".$data['id_barang']); 
	}

    public function hapus_data($id)
       {
		   $id_barang = $this->input->post('id_barang');
           //$result = $this->Mmain->qDel($id);
		   $result = $this->Mmain->qDel("detail_barang","id_detail_barang",$id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
               redirect('detail_barang/init/'.$id_barang);
           } else {
               $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
               redirect('detail_barang');
           }
       } 
	
	
	   
}