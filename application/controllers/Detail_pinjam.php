<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pinjam extends CI_Controller
{
	private $mainTable = 'detail_pinjam';
    /* private $mainPk = 'id_pinjam';  */
	
    public function __construct()
    {
        parent::__construct();
        // cek_login();

        $this->load->model('M_detail_pinjam');
		$this->load->model('m_pinjam');
        $this->load->model('Mmain');
        $this->load->helper('url');
   
		
		if (!$this->session->userdata('email')){
		redirect('auth');
		}
    }
	

    public function index()
    {
        $data['title'] = 'Detail_pinjam';
        $data['Detail_pinjam'] = $this->M_detail_pinjam->tampil_detail();
		/* echo json_encode($data['Detail_pinjam']); die; */
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
        //$data['Detail_pinjam'] = $this->Mmain->qRead("pinjam where id_pinjam ='$id' ","")->result();
		
		
		$render = $this->Mmain->qRead("pinjam p 
		INNER JOIN detail_pinjam dp ON p.id_pinjam = dp.id_pinjam 
		INNER JOIN detail_barang bd ON dp.id_detail_barang = bd.id_detail_barang
		INNER JOIN barang b ON b.id_barang = bd.id_barang WHERE p.id_pinjam = '$id' ",
		"dp.qtty, dp.keterangan, b.nama_barang, bd.serial_code, bd.item_description, dp.id_detail_pinjam, p.id_pinjam, dp.id_detail_barang"); 
		 
		/* $render = $this->Mmain->qRead("detail_pinjam dpm INNER JOIN pinjam p ON dpm.id_pinjam = p.id_pinjam INNER JOIN detail_barang b ON dpm.id_detail_barang=b.id_detail_barang WHERE dpm.id_pinjam = '$id'",
		"dpm.id_detail_pinjam, dpm.id_pinjam, dpm.id_detail_barang,
		dpm.keterangan"); */  
		$data['id'] = $id;
		$data['Detail_pinjam'] = $render->result();
		//$data['Detail_pinjam'] = $this->Mmain->getDataPinjam($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_pinjam/detail_pinjam', $data);
        $this->load->view('templates/footer');
		
    }
	
    public function tambah_detail($id)
    {
		
        $data['title'] = 'TambahDetail';
		
		/* $render = $this->Mmain->qRead("barang b INNER JOIN detail_barang bd ON b.id_barang = bd.id_barang 
		INNER JOIN detail_pinjam dj ON bd.id_detail_barang = dj.id_detail_barang 
		INNER JOIN pinjam pj ON pj.id_pinjam = dj.id_pinjam WHERE pj.id_pinjam = '$id' ",
		"pj.id_pinjam, dj.id_detail_pinjam, bd.id_detail_barang, dj.keterangan, bd.serial_code, bd.item_description, dj.qtty, b.nama_barang, b.id_barang"); */
		
		$render = $this->Mmain->qRead("pinjam p 
		INNER JOIN detail_pinjam dp ON p.id_pinjam = dp.id_pinjam 
		INNER JOIN detail_barang bd ON dp.id_detail_barang = bd.id_detail_barang
		INNER JOIN barang b ON b.id_barang = bd.id_barang WHERE p.id_pinjam = '$id' ",
		"dp.qtty, dp.keterangan, b.nama_barang, bd.serial_code, bd.item_description, dp.id_detail_barang"); 
		$data['id'] = $id;
		/* var_dump ($id_pinjam,$id_detail_barang,$id_barang,$serial_code,$item_description,$qtty,$keterangan);
die; */
		$data['Detail_pinjam'] = $render->result();
		 // Mengambil data dari tabel detail_barang
		//$data['detail_barang'] = $this->M_detail_pinjam->getDetailBarang();
		$data['detail_barang'] = $this->M_detail_pinjam->getItemDescription();
        $data['detail_barang'] = $this->M_detail_pinjam->getBarang();
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

        $id_pinjam 			= $this->input->post('id_pinjam');
		$id_detail_barang	= $this->input->post('id_detail_barang');
		$id_barang 			= $this->input->post('id_barang');
		$serial_code 		= $this->input->post('serial_code');
		$item_description 	= $this->input->post('item_description');
		$qtty 				= $this->input->post('qtty');
        $keterangan 		= $this->input->post('keterangan');
		
/* var_dump ($id_pinjam,$id_detail_barang,$id_barang,$serial_code,$item_description,$qtty,$keterangan);
die; */
		
		$detail_barang_data = $this->Mmain->qRead("detail_barang where serial_code = '$serial_code' ", "id_detail_barang");
		
		if ($detail_barang_data->num_rows()>0 ) {
        $idDetailBarang = $detail_barang_data->row()->id_detail_barang;
		
		$this->Mmain->qIns("detail_pinjam", array(
            $id,
            $id_pinjam,
			$idDetailBarang, // ini value hasil dari qRead diatas.
			$qtty,
            $keterangan,
        )); 
        
		} 
	
        $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
		
        redirect("detail_pinjam/init/".$id_pinjam);
    }

    public function edit_data($id)
    {
        $data['title'] = 'edit_detail';
        $data['Detail_pinjam'] = $this->M_detail_pinjam->edit_data($id);
		$data['id'] = $id;
		$data['detail_barang'] = $this->M_detail_pinjam->getBarang();
		$data['detail_barang'] = $this->M_detail_pinjam->getSeri();
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
		
		$id = $this->input->post('id_detail_pinjam');
		//$serial_code = $this->input->post('serial_code');

		$detail_barang_data = $this->Mmain->qRead("detail_barang where serial_code = '$serial_code' ", "id_detail_barang");

		if ($detail_barang_data->num_rows() > 0) {
			$idDetailBarang = $detail_barang_data->row()->id_detail_barang; 
			
			$data = [
				'id_detail_pinjam' => $id,
				'id_pinjam' => $this->input->post('id_pinjam'),
				'id_detail_barang' => $idDetailBarang, 
				'qtty' => $this->input->post('qtty'),
				'keterangan' => $this->input->post('keterangan'),
			];

			// Menggunakan metode qUpdpart untuk mengubah data
			$this->Mmain->qUpdpart("detail_pinjam", 'id_detail_pinjam', $id, array_keys($data), array_values($data)); // Menambahkan argumen terakhir
			
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			
			redirect('pinjam'); 
		} else {
			$this->session->set_flashdata('error', 'Serial code tidak ditemukan!');
			redirect('pinjam');
		}
	}





    public function hapus($id,$idPinjam) 
{
    $result = $this->Mmain->qDel("detail_pinjam", "id_detail_pinjam", $id);
    //$result = $this->Mmain->delDetail($id);
    
    if ($result) {
        $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
        redirect("detail_pinjam/init/".$idPinjam);
    } else {
        $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
        redirect("detail_pinjam/init/".$idPinjam);
    }
}
}



