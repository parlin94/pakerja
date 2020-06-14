<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gejala_model', 'gejala');
        is_logged_in();
    }


    public function index()
    {

        $data['title'] = 'Data Gejala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get('gejala')->result_array();


        $this->form_validation->set_rules('kode_gejala', 'Kode gejala', 'required|trim|is_unique[gejala.kode_gejala]', [
            'is_unique' => 'kode sudah Ada'
        ]);
        $this->form_validation->set_rules('nama_gejala', 'Nama gejala', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/gejala/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->insert('gejala', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('gejala/index');
        }
    }
    //    Ambil Data Gejala
    public function getGejala()
    {
        echo json_encode($this->gejala->getGejalaById($_POST['id']));
    }
    public function editGejala()
    {
        $data['title'] = 'Data Gejala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get('gejala')->result_array();

        $this->form_validation->set_rules('kode_gejala', 'kode Gejala', 'required');
        $this->form_validation->set_rules('nama_gejala', 'nama Gejala', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/gejala/index', $data);
            $this->load->view('templates/footer');
        } else {
            // $table = 'gejala';
            // $field = 'kode_gejala';
            // $lastKode = $this->data->getMaxGejala($table, $field);
            // $noUrut = (int) substr($lastKode, -4, 4);
            // $noUrut++;
            // $str = 'SK';
            // $newKodeGejala = $str . sprintf('%04s', $noUrut);
            // var_dump($newKodeGejala);
            $data = [
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala'),
                'keterangan' => $this->input->post('keterangan'),

            ];
            // var_dump($data);
            $this->gejala->editDataGejala();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gejala updated!</div>');
            redirect('gejala/index');
        }
    }
    public function deleteGejala($id)
    {
        $this->gejala->delete($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Gejala Deleted!</div>');
        redirect('gejala/index');
    }
}
