<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/**
 * cost controllers class
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Cost extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Cost_model', 'Activity_log_model', 'Setting_model'));
        $this->load->helper('string');
    }

    // cost view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['cost'] = $this->Cost_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/cost/index');
        $config['total_rows'] = count($this->Cost_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Cost Center';
        $data['main'] = 'admin/cost/cost_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Cost_model->get(array('id' => $id)) == NULL) {
            redirect('admin/cost');
        }
        $data['cost'] = $this->Cost_model->get(array('id' => $id));
        $data['title'] = 'Detail Cost Center';
        $data['main'] = 'admin/cost/cost_view';
        $this->load->view('admin/layout', $data);
    }

    // Add cost and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_code', 'Kode', 'trim|required|xss_clean');    
        $this->form_validation->set_rules('cost_name', 'Name', 'trim|required|xss_clean');        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('cost_id')) {
                $params['cost_id'] = $this->input->post('cost_id');
            } else {                
                
            }

            $params['cost_code'] = $this->input->post('cost_code');
            $params['cost_name'] = $this->input->post('cost_name');            
            $params['user_id'] = $this->session->userdata('user_id');            
            $status = $this->Cost_model->add($params);

            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'cost',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:' . $params['cost_name']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' cost center berhasil');
            redirect('admin/cost');
        } else {
            if ($this->input->post('cost_id')) {
                redirect('admin/cost/edit/' . $this->input->post('cost_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['cost'] = $this->Cost_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' cost';
            $data['main'] = 'admin/cost/cost_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete cost
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Cost_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'cost',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus cost center berhasil');
            redirect('admin/cost');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/cost/edit/' . $id);
        }
    }

}

/* End of file cost.php */
/* Location: ./application/controllers/admin/cost.php */
