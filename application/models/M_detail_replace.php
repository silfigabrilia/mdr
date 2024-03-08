<?php 
 
class M_detail_replace extends CI_Model
{
    function tampil_detail(){
        return $this->db->get('detail_ganti');
     }
     function tampil_data_detail(){
       return $this->db->get('detail_ganti');
    }
	
	public function getseri()
{
    $query = $this->db->query("SELECT * FROM detail_barang ORDER BY serial_code  ASC");
	//$query = $this->db->query("SELECT id_barang, nama_barang, COALESCE(stok, 0) AS stok FROM barang WHERE stok <> 0");

    if ($query->num_rows() == 0) {
        $query = [];
    } else {
        $query = $query->result_array();
    }

    return $query;
}
    
    public function getBarang()
    {
        $query = $this->db->query("SELECT * FROM barang ORDER BY nama_barang ASC");

        if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->result_array();
        }

        return $query;
    }
    
    function tambah_data_detail($data){
        return $this->db->insert($this->_table->$data);
        }
        function edit_detail($id)
        {
            $query = $this->db->query("SELECT * FROM detail_ganti WHERE id_detail_replace = '$id'");
        
            if ($query->num_rows() == 0) {
                $query = [];
            } else {
                $query = $query->row_array();
            }
        
            return $query;
        }
        public function edit_detail_replace($data)
        {
            $this->db->set('nama_replace', $data['nama_replace']);
            $this->db->set('tgl_replace', $data['tgl_replace']);
            $this->db->set('jml_replace', $data['jml_replace']);
            $this->db->set('qty_replace', $data['qty_replace']);
            $this->db->set('status', $data['status']);
            $this->db->set('keterangan', $data['keterangan']);
            $this->db->where('id_detail_replace', $data['id_detail_replace']);
        
            return $this->db->update('detail_ganti');
        }
        
        public function del_replace($id)
        {
            $this->db->where('id_detail_replace', $id);
            return $this->db->delete('detail_ganti');
        }
    
    
    
    
}