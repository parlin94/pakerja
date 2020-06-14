<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relasi_model', 'relasi');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Relasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gabung'] = $this->relasi->getAllRelasi();
        $data['diag'] = $this->db->get('diagnosa')->result_array();
        $data['gejala'] = $this->db->get('gejala')->result_array();

        $this->form_validation->set_rules('diagnosa_di', 'Diagnosa');
        $this->form_validation->set_rules('gejala_di', 'Gejala');
        $this->form_validation->set_rules('md', 'Nilai md', 'required');
        $this->form_validation->set_rules('mb', 'Nilai mb', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/relasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'diagnosa_id' => $this->input->post('diagnosa_id'),
                'gejala_id' => $this->input->post('gejala_id'),
                'md' => $this->input->post('md'),
                'mb' => $this->input->post('mb')
            ];
            $this->db->insert('relasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Relasi added!</div>');
            redirect('relasi');
        }
    }
    public function getRelasi()
    {
        echo json_encode($this->relasi->getRelasiById($_POST['id']));
    }
    public function editRelasi()
    {
        $data['title'] = 'Data Relasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gabung'] = $this->relasi->getAllRelasi();
        $data['diag'] = $this->db->get('diagnosa')->result_array();
        $data['gejala'] = $this->db->get('gejala')->result_array();

        $this->form_validation->set_rules('diagnosa_di', 'Diagnosa');
        $this->form_validation->set_rules('gejala_di', 'Gejala');
        $this->form_validation->set_rules('md', 'Nilai md', 'required');
        $this->form_validation->set_rules('mb', 'Nilai mb', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/relasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'diagnosa_id' => $this->input->post('diagnosa_id'),
                'gejala_id' => $this->input->post('gejala_id'),
                'mb' => $this->input->post('mb'),
                'md' => $this->input->post('md')
            ];
            $this->relasi->editDataRelasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Relasi added!</div>');
            redirect('relasi/index');
        }
    }
    public function deleteRelasi($id)
    {
        $this->relasi->delete_Relasi($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Diagnosa Deleted!</div>');
        redirect('relasi/index');
    }
    public function hasil_diagnosa()
    {
    }
}
