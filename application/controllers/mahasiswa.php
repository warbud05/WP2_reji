<?php
class mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
    }
    function index()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('mahasiswa', $data);
    }
    function hapus($nim)
    {
        $this->m_mahasiswa->hapus($nim);
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('mahasiswa', $data);
    }
}