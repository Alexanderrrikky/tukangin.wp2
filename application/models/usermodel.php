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
}
