<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa_model extends CI_Model
{
    // ========================================== Diagnosa ====================

    public function getDiagnosa()
    {
        return $this->db->get('diagnosa');
    }
    public function getDiagnosaById($id)
    {
        return $this->db->get_where('diagnosa', ['id' => $id])->row_array();
    }
    public function editDataDiagnosa()
    {
        $id = $this->input->post('id', true);
        $kode_diagnosa = $this->input->post('kode_diagnosa', true);
        $nama_diagnosa = $this->input->post('nama_diagnosa', true);
        $keterangan = $this->input->post('keterangan', true);
        $this->db->set('kode_diagnosa', $kode_diagnosa);
        $this->db->set('nama_diagnosa', $nama_diagnosa);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id', $id);
        $this->db->update('diagnosa');
    }

    public function delete_diagnosa($id)
    {

        $this->db->delete('diagnosa', ['id' => $id]);
    }
}
