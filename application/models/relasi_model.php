<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relasi_model extends CI_Model
{
    public function getAllRelasi()
    {
        $query = "SELECT `relasi`.*, `gejala`.`nama_gejala`,`diagnosa`.`nama_diagnosa`
                  FROM `relasi` 
                  INNER JOIN `gejala`
                  ON `relasi`.`gejala_id` = `gejala`.`id`
                  INNER JOIN `diagnosa`
                  ON `relasi`.`diagnosa_id` = `diagnosa`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function get_by_gejela($gejala)
    {
        $sql = "SELECT distinct diagnosa_id,p.kode_diagnosa,p.nama_diagnosa,p.keterangan 
                FROM relasi r 
                INNER JOIN diagnosa p on r.diagnosa_id=p.id 
                WHERE gejala_id in (" . $gejala . ") 
                ORDER by diagnosa_id,gejala_id";
        return $this->db->query($sql);
    }
    public function get_gejala_by_diagnosa($id, $gejala = null)
    {
        $sql = "select relasi.gejala_id,mb,md from relasi where diagnosa_id=" . $id;
        if ($gejala != null)
            $sql = $sql . " and gejala_id in (" . $gejala . ")";
        $sql = $sql . " order by gejala_id";
        return $this->db->query($sql);
    }
    function getgejala()
    {
        return $this->db->get('gejala');
    }

    function getdiagnosa()
    {
        return $this->db->get('diagnosa');
    }

    function total_rows($q = NULL)
    {
        $this->db->from('relasi');
        return $this->db->count_all_results();
    }

    public function getRelasiById($id)
    {
        return $this->db->get_where('relasi', ['id' => $id])->row_array();
    }
    public function editDataRelasi()
    {
        $id = $this->input->post('id', true);
        $diagnosa_id = $this->input->post('diagnosa_id', true);
        $gejala_id = $this->input->post('gejala_id', true);
        $md = $this->input->post('mb', true);
        $mb = $this->input->post('md', true);
        $this->db->set('diagnosa_id', $diagnosa_id);
        $this->db->set('gejala_id', $gejala_id);
        $this->db->set('md', $md);
        $this->db->set('mb', $mb);
        $this->db->where('id', $id);
        $this->db->update('relasi');
    }
    public function delete_Relasi($id)
    {
        $this->db->delete('relasi', ['id' => $id]);
    }
}
