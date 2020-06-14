 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Diagnosa extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('diagnosa_model', 'diagnosa');
            is_logged_in();
        }

        public function index()
        {
            $data['title'] = 'Data Diagnosa';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['tanda'] = $this->db->get('diagnosa')->result_array();

            $this->form_validation->set_rules('kode_diagnosa', 'Kode diagnosa', 'required|trim|is_unique[diagnosa.kode_diagnosa]', [
                'is_unique' => 'kode sudah Ada'
            ]);
            $this->form_validation->set_rules('nama_diagnosa', 'Nama diagnosa', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan');


            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('data/diagnosa/index', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'kode_diagnosa' => $this->input->post('kode_diagnosa'),
                    'nama_diagnosa' => $this->input->post('nama_diagnosa'),
                    'keterangan' => $this->input->post('keterangan')
                ];
                $this->db->insert('diagnosa', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Diagnosa added!</div>');
                redirect('diagnosa/index');
            }
        }
        public function getDiagnosa()
        {
            echo json_encode($this->diagnosa->getDiagnosaById($_POST['id']));
        }
        public function editDiagnosa()
        {
            $data['title'] = 'Data Diagnosa';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['tanda'] = $this->db->get('diagnosa')->result_array();

            $this->form_validation->set_rules('kode_diagnosa', 'Kode diagnosa', 'required');
            $this->form_validation->set_rules('nama_diagnosa', 'Nama diagnosa', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('data/diagnosa/index', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'kode_diagnosa' => $this->input->post('kode_diagnosa'),
                    'nama_diagnosa' => $this->input->post('nama_diagnosa'),
                    'keterangan' => $this->input->post('keterangan'),

                ];
                $this->diagnosa->editDataDiagnosa();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Diagnosa updated!</div>');
                redirect('diagnosa/index');
            }
        }
        public function deleteDiagnosa($id)
        {
            $this->diagnosa->delete_diagnosa($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Diagnosa Deleted!</div>');
            redirect('diagnosa/index');
        }
    }
