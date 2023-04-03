<?php
class m_mahasiswa extends CI_Model
{
    private $table = "mahasiswa";
    private $primary = "nim";
    function tampilData()
    {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary, 'asc');
        else
            $this->db->order_by();
        return $this->db->get($this->table);
        //SELECT * FROM mahasiswa ORDER BY nim asc
    }
    function hapus($nim)
    {
        $this->db->where($this->primary, $nim);
        $this->db->delete($this->table);
        //DELETE FROM mahasiswa WHERE nim = $nim;
    }
}