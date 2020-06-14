<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
    public function getG()
    {
    }

    public function getGejala()
    {
        return  $this->db->get('gejala');
    }
    // Ambil Data Gejala
    public function getGejalaById($id)
    {
        return $this->db->get_where('gejala', ['id' => $id])->row_array();
    }
    function get_list_by_id($id)
    {
        $sql = "select id,kode_gejala,nama_gejala from gejala where id in (" . $id . ")";
        return $this->db->query($sql);
    }
    // Simpan Gejala Edit
    public function editDataGejala()
    {
        $id          = $this->input->post('id', true);
        $kode_gejala = $this->input->post('kode_gejala', true);
        $nama_gejala = $this->input->post('nama_gejala', true);
        $keterangan  = $this->input->post('keterangan', true);
        $this->db->set('kode_gejala', $kode_gejala);
        $this->db->set('nama_gejala', $nama_gejala);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id', $id);
        $this->db->update('gejala');
    }
    // public function getMaxGejala()
    // {
    //     $sql = "SELECT MAX(kode_diagnosa) AS maxKode 
    //                 FROM diagnosa";
    //     $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $n = ((int) $row->maxKode) + 1;
    //         $no = sprintf("%'.04d", $n);
    //     } else {
    //         $no = "0001";
    //     }
    //     $max_kode = "KS" . $no;
    //     return $max_kode;
    // }
    public function delete($id)
    {
        $this->db->delete('gejala', ['id' => $id]);
    }
}
