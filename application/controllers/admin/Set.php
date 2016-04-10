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
        $data['set'] = $this->Set_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/set/index');
        $config['total_rows'] = count($this->Set_model->get(array('status' => TRUE)));
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
        $this->form_validation->set_rules('set_branch', 'branch', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('set_id')) {
                $params['set_id'] = $this->input->post('set_id');
            } else {                
                $params['set_branch'] = $this->input->post('set_branch');
            }           
            
            $params['set_city'] = $this->input->post('set_city'); 
            $params['set_address'] = $this->input->post('set_address');            
            $params['set_pic'] = $this->input->post('set_pic');
            $params['set_employe_nik'] = $this->input->post('employe_nik');
            $params['set_employe_name'] = $this->input->post('employe_name');
            $params['set_employe_position'] = $this->input->post('employe_position');           
            $params['set_initial'] = $this->input->post('set_initial');            
            $status = $this->Set_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Pengaturan',
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



/* End of file Set.php */
/* Location: ./application/controllers/admin/set.php */