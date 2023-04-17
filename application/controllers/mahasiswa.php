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
    function insert()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('insert_mahasiswa', $data);
    }
    function insertData()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nim',
            'nim',
            'required|min_length[8]|is_unique[mahasiswa.nim]',
            [
                'required' => '* Nim Harus DiIsi',
                'min_lenght' => '* Nim Harus 8 Digit',
                'is_unique' => '*Nim Sudah Terpakai'
            ]
        );


        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => '* Nama Harus Diisi Harus DiIsi',

            ]
        );

        $this->form_validation->set_rules(
            'jurusan',
            'Jurusan',
            'required',
            [
                'required' => '* Jurusan Harus Diisi Harus DiIsi',

            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            [
                'required' => '* alamat Harus Diisi Harus DiIsi',

            ]
        );

        if ($this->form_validation->run() != true) {
            $this->load->helper('url');
            $this->load->view('insert_mahasiswa ');

        } else {

            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'alamat' => $alamat
            );

            $this->m_mahasiswa->input_data($data, 'mahasiswa');
            redirect('https://localhost/myci/index.php/mahasiswa');
        }
    }
    function edit($nim)
    {
        $where = array('nim' => $nim);
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData($where, 'mahasiswa')->result();
        $this->load->view('v_edit', $data);
    }
    function update()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => '* Nama Harus Diisi Harus DiIsi',

            ]
        );

        $this->form_validation->set_rules(
            'jurusan',
            'Jurusan',
            'required',
            [
                'required' => '* Jurusan Harus Diisi Harus DiIsi',

            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            [
                'required' => '* alamat Harus Diisi Harus DiIsi',

            ]
        );
        if ($this->form_validation->run() != true) {

            $where = array('nim' => $nim);
            $data['mahasiswa'] = $this->m_mahasiswa->edit_data($where, 'mahasiswa')->result();
            $this->load->view('v_edit', $data);

        } else {

            $data = array(

                'nama' => $nama,
                'jurusan' => $jurusan,
                'alamat' => $alamat
            );

            $where = array(
                'nim' => $nim
            );

            $this->m_mahasiswa->update_data($where, $data, 'mahasiswa');
            redirect('http://localhost/myci/index.php/mahasiswa');

        }
    }
}