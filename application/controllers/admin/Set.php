<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * set controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */ 
class Set extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Set_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Habis Kontrak view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');

        // Apply Filter
        // Get $_GET variable
        $q = $this->input->get(NULL, TRUE);

        $data['q'] = $q;
        $params = array(); 

        // Employe Nik
        if (isset($q['n']) && !empty($q['n']) && $q['n'] != '') {
            $params['set_employe_nik'] = $q['n'];
        }

        // Date start
        if (isset($q['ds']) && !empty($q['ds']) && $q['ds'] != '') {
            $params['date_start'] = $q['ds'];
        }

        // Date end
        if (isset($q['de']) && !empty($q['de']) && $q['de'] != '') {
            $params['date_end'] = $q['de'];
        }
        
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;


        $data['set'] = $this->Set_model->get($params);        
        $config['base_url'] = site_url('admin/set/index');
        $config['total_rows'] = count($this->Set_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Pengaturan';
        $data['main'] = 'admin/set/set_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Set_model->get(array('id' => $id)) == NULL) {
            redirect('admin/set');
        }
        $data['set'] = $this->Set_model->get(array('id' => $id));
        $data['title'] = 'Pengaturan';
        $data['main'] = 'admin/set/set_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('set_date', 'Tanggal Habis', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('set_id')) {
                $params['set_id'] = $this->input->post('set_id');            
            $params['set_branch'] = $this->input->post('set_branch');
            $params['set_city'] = $this->input->post('set_city');             
            $params['set_address'] = $this->input->post('set_pic');
            $params['set_employe_nik'] = $this->input->post('set_employe_nik');
            $params['set_employe_name'] = $this->input->post('set_employe_name');
            $params['set_employe_position'] = $this->input->post('employe_position');
            $params['set_employe_address'] = $this->input->post('employe_address');
            $params['set_initial'] = $this->input->post('set_initial');            
            $status = $this->Set_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Habis Kontrak',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/set');
        } else {
            if ($this->input->post('set_id')) {
                redirect('admin/set/edit/' . $this->input->post('set_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['set'] = $this->Set_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Pengaturan';
            $data['main'] = 'admin/set/set_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Set_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Keterangan',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Pengaturan berhasil');
            redirect('admin/set');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/set/edit/' . $id);
        }
    }

}



/* End of file set.php */
/* Location: ./application/controllers/admin/set.php */
