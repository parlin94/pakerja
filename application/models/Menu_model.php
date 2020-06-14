<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    // Ambil Data Menu
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    // Ubah Data Menu
    public function editDataMenu()
    {
        $id = $this->input->post('id', true);
        $menu = $this->input->post('menu', true);
        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }

    // Delete Menu
    public function deleteMenu($id)
    {

        $this->db->delete('user_menu', ['id' => $id]);
    }

    // =============SUBMENU==========================

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    // Ambil Data Submenu
    public function getSubmenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    // Simpan Submenu Edit
    public function editDataSubmenu()
    {
        $id        = $this->input->post('id', true);
        $title     = $this->input->post('title', true);
        $menu_id   = $this->input->post('menu_id', true);
        $url       = $this->input->post('url', true);
        $icon      = $this->input->post('icon', true);
        $is_active = $this->input->post('is_active', true);
        $this->db->set('title', $title);
        $this->db->set('menu_id', $menu_id);
        $this->db->set('url', $url);
        $this->db->set('icon', $icon);
        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }
    // Delete Menu
    public function deleteSubMenu($id)
    {

        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
