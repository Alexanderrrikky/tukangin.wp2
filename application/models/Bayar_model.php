<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_model extends CI_Model
{
    public function simpanTransaksi($data = null)
    {
        $this->db->insert('transaksi', $data);
    }

    public function getmbayar()
    {
        return $this->db->get('metode_bayar');
    }
}
