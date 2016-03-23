<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Employe controllers class
 *
 ** @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Employe extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Employe_model', 'Activity_log_model'));
        $this->load->helper('string');
    }

    // Employe view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // Nip
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['employe_nik'] = $f['n'];
        }

        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $data['employe'] = $this->Employe_model->get($params);

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/employe/index');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Employe_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Karyawan';
        $data['main'] = 'admin/employe/employe_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Employe_model->get(array('id' => $id)) == NULL) {
            redirect('admin/employe');
        }
        $data['employe'] = $this->Employe_model->get(array('id' => $id));
        $data['title'] = 'Detail Karyawan';
        $data['main'] = 'admin/employe/employe_view';
        $this->load->view('admin/layout', $data);
    }

    function upload() {
        if ($_FILES) {
            $sql_file = $this->do_upload('userfile');
            $file_restore = $this->load->file(FCPATH . 'uploads/sql_file/' . $sql_file, true);
            $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
            $this->db->query($file_restore);
            $this->db->query("SET FOREIGN_KEY_CHECKS = 1");

            $this->session->set_flashdata('success', 'Upload data karyawan berhasil');
            redirect('admin/employe');
        } else {
            $data['title'] = 'Upload Karyawan';
            $data['main'] = 'admin/employe/employe_upload';
            $this->load->view('admin/layout', $data);
        }
    }

    // Add Employe and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employe_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_divisi', 'Divisi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_position', 'Position', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_departement', 'Departement', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employe_date_register', 'Date Register', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('employe_id')) {
                $params['employe_id'] = $this->input->post('employe_id');
            } else {
                $params['employe_nik'] = $this->input->post('employe_nik');
            }

            $params['employe_name'] = $this->input->post('employe_name');
            $params['employe_phone'] = $this->input->post('employe_phone');
            $params['employe_address'] = stripslashes($this->input->post('employe_address'));
            $params['employe_divisi'] = stripslashes($this->input->post('employe_divisi'));
            $params['employe_position'] = $this->input->post('employe_position');
            $params['employe_departement'] = $this->input->post('employe_departement');
            $params['employe_date_register'] = $this->input->post('employe_date_register');
            $status = $this->Employe_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Karyawan',
                        'log_action' => $data['operation'],
                        'log_info' => 'ID:' . $status . ';Title:' . $params['employe_name']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Karyawan berhasil');
            redirect('admin/employe');
        } else {
            if ($this->input->post('employe_id')) {
                redirect('admin/employe/edit/' . $this->input->post('employe_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['employe'] = $this->Employe_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Karyawan';
            $data['main'] = 'admin/employe/employe_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Employe
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Employe_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Karyawan',
                        'log_action' => 'Hapus',
                        'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus Karyawan berhasil');
            redirect('admin/employe');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/employe/edit/' . $id);
        }
    }

    public function do_upload($file) {
        $this->load->library('upload');
        $config['upload_path'] = FCPATH . 'uploads/sql_file';

        /* create directory if not exist */
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $config['allowed_types'] = 'sql|csv';
        $config['max_size'] = '32000';
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file)) {
            $this->session->set_flashdata('failed', $this->upload->display_errors(''));
            redirect(uri_string());
        }

        $upload_data = $this->upload->data();

        return $upload_data['file_name'];
    }

}

/* End of file employe.php */
/* Location: ./application/controllers/admin/employe.php */
