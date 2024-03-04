<?php 
 
class M_detail_req extends CI_Model{

    function tampil_request()
    {
        return $this->db->get('detail_request');
    }

    function tampil_datarequest(){
        return $this->db->get('detail_request');
    }

    function edit_request($id)
    { 
        $query = $this->db->query("SELECT * FROM detail_request WHERE id_detail_request = '$id'");

        if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->row_array();
        }

        return $query;
    }

    public function ubah_request($data)
    {
        $this->db->set('nama_barang_request', $data['nama_barang_request']);
        $this->db->set('jumlah_request', $data['jumlah_request']);
        $this->db->set('keterangan', $data['keterangan']);
        $this->db->set('id_barang', $data['id_barang']);
        $this->db->set('serial_number', $data['serial_number']);
        $this->db->set('jumlah', $data['jumlah']);
        $this->db->set('tanggal_waktu', $data['tanggal_waktu']);
        $this->db->set('status', $data['status']);
        $this->db->where('id_detail_request', $data['id_detail_request']);

        return $this->db->update('detail_request');
    }

    function update_data_detail($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

    public function hapus_request($id)
    {
        $this->db->where('id_detail_request', $id);
        return $this->db->delete('detail_request');
    }
    
    // public function count($table)
    // {
    //     return $this->db->count_all($table);
    // }
}