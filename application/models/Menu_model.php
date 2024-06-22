<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function usermenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function  menuWhere($where)
    {
        return $this->db->get_where('user_menu', $where);
    }

    public function updateMenu($where = null, $data = null)
    {
        $this->db->update('user_menu', $data, $where);
    }

    public function submenuWhere($where)
    {
        return $this->db->get_where('user_sub_menu', $where);
    }

    public function updatesubmenu($where = null, $data = null)
    {
        $this->db->update('user_sub_menu', $data, $where);
    }
}
