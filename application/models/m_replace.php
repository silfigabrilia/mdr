<?php 
 
class M_replace extends CI_Model{

//replace//
function tampil_replace(){
    return $this->db->get('ganti');
 }
 function tampil_datareplace(){
   return $this->db->get('ganti');
}

function tambah_data_replace($data){
    return $this->db->insert($this->_table->$data);
    }
    function edit_replace($id)
    {
        $query = $this->db->query("SELECT * FROM ganti WHERE id_replace = '$id'");
    
        if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->row_array();
        }
    
        return $query;
    }
    
    public function edit($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('tgl_replace', $data['tgl_replace']);
        $this->db->set('jumlah', $data['jumlah']);
        $this->db->set('keterangan', $data['keterangan']);
        $this->db->where('id_replace', $data['id_replace']);
    
        return $this->db->update('ganti');
    }
    
    public function hapus_replace($id)
    {
        $this->db->where('id_replace', $id);
        return $this->db->delete('ganti');
    }
}

