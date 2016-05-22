<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * par controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */ 
class Par extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Par_model', 'Cost_model', 'Activity_log_model', 'Employe_model', 'Setting_model'));
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
            $params['par_employe_nik'] = $q['n'];
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


        $data['par'] = $this->Par_model->get($params);        
        $config['base_url'] = site_url('admin/par/index');
        $config['total_rows'] = count($this->Par_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'PAR Nikah';
        $data['main'] = 'admin/par/par_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Par_model->get(array('id' => $id)) == NULL) {
            redirect('admin/par');
        }
        $data['par'] = $this->Par_model->get(array('id' => $id));
        $data['title'] = 'PAR Nikah';
        $data['main'] = 'admin/par/par_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('par_number', 'Nomor PAR', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('par_id')) {
                $params['par_id'] = $this->input->post('par_id');
            } else {
                $params['par_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['par_number'] = $this->input->post('par_number');
            $params['cost_id'] = $this->input->post('cost_id');             
            $params['par_employe_nik'] = $this->input->post('employe_nik');
            $params['par_employe_name'] = $this->input->post('employe_name');
            $params['par_employe_position'] = $this->input->post('employe_position');
            $params['par_employe_unit'] = $this->input->post('employe_unit');
            $params['par_employe_bussiness'] = $this->input->post('employe_bussiness');
            $params['par_employe_departement'] = $this->input->post('employe_departement');
            $params['par_employe_account'] = $this->input->post('employe_account');
            $params['par_paid'] = $this->input->post('par_paid');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['par_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Par_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'PAR',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' PAR berhasil');
            redirect('admin/par');
        } else {
            if ($this->input->post('par_id')) {
                redirect('admin/par/edit/' . $this->input->post('par_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['par'] = $this->Par_model->get(array('id' => $id));
            }
            $data['cost'] = $this->Cost_model->get(); 
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' PAR';
            $data['main'] = 'admin/par/par_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Par_model->delete($this->input->post('del_id'));
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
            $this->session->set_flashdata('success', 'Hapus PAR berhasil');
            redirect('admin/par');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/par/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal')); 
        $this->load->helper(array('terbilang')); 
        if ($id == NULL)
            redirect('admin/par');
        $data['setting_branch'] = $this->Setting_model->get(array('id' => 1));
        $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
        $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
        $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7)); 
        $data['setting_initial'] = $this->Setting_model->get(array('id' => 8));
        $data['setting_initial_bm'] = $this->Setting_model->get(array('id' => 9));
        $data['setting_initial_pdm'] = $this->Setting_model->get(array('id' => 10));
        $data['setting_unit'] = $this->Setting_model->get(array('id' => 11));
        $data['par'] = $this->Par_model->get(array('id' => $id));

        $html = $this->load->view('admin/par/par_pdf', $data, true);
        $data = pdf_create($html, $data['par']['par_employe_name'], TRUE, [0,0,615,468], TRUE);
    }

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Par_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
            $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
            $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7)); 
            $data['setting_initial'] = $this->Setting_model->get(array('id' => 8));
            $data['par'] = $this->Par_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/par/par_multiple_pdf', $data, true);
            $data = pdf_create($html, 'A4', TRUE);
        }
        elseif ($action == "printEnvl") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['par'] = $this->Par_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/par/par_multiple_envelope', $data, true);
            $data = pdf_create($html, 'A4', TRUE);
        }
        redirect('admin/par');
    }

}



/* End of file par.php */
/* Location: ./application/controllers/admin/par.php */
