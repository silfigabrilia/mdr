<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_barang extends CI_Controller
{

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
        $data['Detail_Barang'] = $this->m_detail_barang->tampil_datadetail()->result();
        $data['barang'] = $this->m_detail_barang->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/add', $data);
        $this->load->view('templates/footer');

        // $txtVal[0]=$newId;
        // $cboemp="";
        // $cbotype=$this->fn->createCbofromDb("tb_barang","id_barang as id, _barang as nm","",$txtVal[0]);
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
        redirect('Barang');
    }

    public function edit($id){
        $data['title'] = 'Detail_Barang';
        $data['Detail_Barang'] = $this->m_detail_barang->edit_detail($id);
		$data['barang'] = $this->m_detail_barang->getBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang/editdetail',$data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($id)
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        // $id = $this->Mmain->autoId("detail_request","id_detail_request","DRQ","DRQ"."001","001");

        $data = [
            'id_detail_barang' => $id,
            'id_barang' => $this->input->post('id_barang'),
            'serial_code' => $this->input->post('serial_code'),
            'lokasi' => $this->input->post('lokasi'),
            'qtty' => $this->input->post('qtty'),
        ];

        if ($this->m_detail_barang->ubah_detail($data)) {
            $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diubah!');
			//echo $data;
           redirect("detail_barang/init/".$data['id_barang']);
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diubah!');
            redirect('detail_barang');
        }
    }

    public function update(){
		$id_detail_barang = $this->input->post('id_detail_barang');
        $id_barang = $this->input->post('id_barang');
        $serial_code = $this->input->post('serial_code');
        $lokasi = $this->input->post('lokasi');
        $qtty = $this->input->post('qtty');

        $data = array(
        'id_barang' => $id_barang,
        'serial_code' => $serial_code,
        'lokasi' =>$lokasi,
        'qtty' => $qtty,
        );
        
        $where = array(
        'id_detail_barang' => $id_detail_barang
        );
        
        $this->m_detail_barang->update_data_detail($where,$data,'detail_barang');
        redirect('detail_barang');
       }

    public function hapus_data($id)
       {
           $result = $this->m_detail_barang->hapus_detail($id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
               redirect("detail_barang/init/".$data['id_barang']);
           } else {
               $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
               redirect('detail_barang');
           }
       } 
	   
	   /* public function hapus_data($id)
       {
           $result = $this->Mmain->qdel($id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
               redirect('detail_barang');
           } else {
               $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
               redirect('detail_barang');
           }
       } */
}