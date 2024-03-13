<?php

class M_detail_pinjam extends CI_Model
{
	
	  public function getBarang()
    {
        $query = $this->db->query("SELECT * FROM detail_barang ORDER BY id_detail_barang ASC");

        if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    function tampil_detail()
    {
        //return $this->db->get('detail_pinjam');
		$query = $this->db->query("SELECT dpm.id_detail_pinjam, dpm.id_pinjam, dpm.id_detail_barang, dpm.keterangan FROM detail_pinjam dpm INNER JOIN pinjam p ON dpm.id_pinjam = p.id_pinjam ");
		if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->result_array();
        }

        return $query;
    }
    function tambah_detail()
    {
        return $this->db->get('detail_pinjam');
		$query = $this->db->query("SELECT dpm.id_detail_pinjam, dpm.id_pinjam, dpm.id_detail_barang, dpm.keterangan FROM detail_pinjam dpm INNER JOIN pinjam p ON dpm.id_pinjam = p.id_pinjam");
		if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->result_array();
        }

        return $query;
    }
    public function tambah_ubah($data)
    {
        return $this->db->insert($this->_table, $data);
    }
    function edit_data($id)
    {
        $query = $this->db->query("SELECT * FROM detail_pinjam WHERE id_detail_pinjam = '$id'");

        if ($query->num_rows() == 0) {
            $query = [];
        } else {
            $query = $query->row_array();
        }

        return $query;
    }

    public function ubah($data)
    {

        $this->db->set('id_pinjam', $data['id_pinjam']);
        $this->db->set('id_detail_barang', $data['id_detail_barang']);
        $this->db->set('keterangan', $data['keterangan']);


        return $this->db->update('detail_pinjam');
    }
    public function hapus($id)
    {
        $this->db->where('id_detail_pinjam', $id);
        return $this->db->delete('detail_pinjam');
    }
}
