<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usermodel extends CI_Model
{

    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->limit(10, 0);
        return $this->db->get();
    }


    public function roleWhere($where)
    {
        return $this->db->get_where('user_role', $where);
    }

    public function updateRole($where = null, $data = null)
    {
        $this->db->update('user_role', $data, $where);
    }


    public function userrole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function simpanRole($data = null)
    {
        $this->db->insert('user_role', $data);
    }

    public function metodeWhere($where)
    {
        return $this->db->get_where('metode_bayar', $where);
    }

    public function updatePembayaran($where = null, $data = null)
    {
        $this->db->update('metode_bayar', $data, $where);
    }
}
