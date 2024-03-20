<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $data['title'] = 'Barang';
        $data['Barang'] = $this->m_data->tampil_data('barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Barang';
        $data['Barang'] = $this->m_data->tampil_databarang()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('addbarang', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $this->load->model('Mmain');
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }
        $id = $this->Mmain->autoId("barang","id_barang","BR","BR"."001","001");
        
        // $data = [
        //     'id_barang' => $id,
        //     'nama_barang' => $this->input->post('nama_barang'),
        //     'stok' => $this->input->post('stok'),
        //     'satuan_id' => $this->input->post('satuan_id'),
        //     'jenis_id' => $this->input->post('jenis_id'),

        // ];

        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $jenis = $this->input->post('jenis');
        
        $this->Mmain->qIns("barang", array(
            $id,
            $nama,
            $stok,
            $satuan,
            $jenis

        ));

        $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
        redirect('barang');

    }
    
    public function edit($id){
        $data['title'] = 'Barang';
        $data['Barang'] = $this->m_data->edit_data($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_barang',$data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah()
    {
        if ($this->session->login['role'] == 'admin') {
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('dashboard');
        }
        // $id = $this->Mmain->autoId("barang","id_barang","BR","BR"."001","001");

        $data = [
            'id_barang' => $this->input->post('id_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            'satuan_id' => $this->input->post('satuan_id'),
            'jenis_id' => $this->input->post('jenis_id'),

        ];

        if ($this->m_data->ubah($data)) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
            redirect('barang');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
            redirect('barang');
        }
    }

    function update(){
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $stok = $this->input->post('stok');
        $satuan_id = $this->input->post('satuan_id');
        $jenis_id = $this->input->post('jenis_id');
        
        $data = array(
        'nama_barang' => $nama_barang,
        'stok' => $stok,
        'satuan_id' => $satuan_id,
        'jenis_id' => $jenis_id,
        );
        
        $where = array(
        'id_barang' => $id_barang
        );
        
        $this->m_data->update_data($where,$data,'barang');
        redirect('barang');
       }

       public function hapus_data($id)
       {
           $result = $this->m_data->hapus($id);
   
           if ($result) {
               $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
               redirect('barang');
           } else {
               $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
               redirect('barang');
           }
       }
	   
	   public function getdetailbarang(){
		   $id_barang = $this->input->post('id_barang');
		   $render = $this->Mmain->qRead("detail_barang where id_barang = '".$id_barang."'","");
		   $data = null;
		   if($render->num_rows() > 0){			   
			   for($i=0; $i<$render->num_rows(); $i++){
				  //$data .= "<option value=".$render->row()->serial_code."> ".$render->row()->serial_code."" ;
				  $data .= "<option value=".$render->row($i)->serial_code."> ".$render->row($i)->serial_code."</option>";
			   }
			   $retval = $data;
		   }else{
			   $retval = '<option selected>- Item Detail Tidak Ditemukan, Pilih Yang Lain - </option>';
		   }
		  
		   echo $retval;
	   }

}