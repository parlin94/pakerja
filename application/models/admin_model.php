<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getAllRole()
    {
        $query = "SELECT *
                  FROM `user_menu` 
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    // Tambah Role
    public function tambahRole()
    {
        $data = [
            'role' => $this->input->post('role', true)
        ];
        $this->db->insert('user_role', $data);
    }

    // Ambil Data Role
    public function getRoleId($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    // Edit Data Role
    public function ubahRole()
    {

        $id = $this->input->post('id', true);
        $role = $this->input->post('role', true);
        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');
    }

    // Hapus Data Role
    public function deleteRole($id)
    {

        $this->db->delete('user_role', ['id' => $id]);
    }
}
