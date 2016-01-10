<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Bank controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Bank extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Bank_model', 'Activity_log_model'));
        $this->load->helper('string');
    }

    // Bank view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['bank'] = $this->Bank_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/bank/index');
        $config['total_rows'] = count($this->Bank_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Bank';
        $data['main'] = 'admin/bank/bank_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Bank_model->get(array('id' => $id)) == NULL) {
            redirect('admin/bank');
        }
        $data['bank'] = $this->Bank_model->get(array('id' => $id));
        $data['title'] = 'Detail BANK';
        $data['main'] = 'admin/bank/bank_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Bank and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank_name', 'Name', 'trim|required|xss_clean');        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('bank_id')) {
                $params['bank_id'] = $this->input->post('bank_id');
            } else {                
                
            }

            $params['bank_name'] = $this->input->post('bank_name');            
            $params['user_id'] = $this->session->userdata('user_id');            
            $status = $this->Bank_model->add($params);

            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Bank',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:' . $params['bank_name']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Bank berhasil');
            redirect('admin/bank');
        } else {
            if ($this->input->post('bank_id')) {
                redirect('admin/bank/edit/' . $this->input->post('bank_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['bank'] = $this->Bank_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Bank';
            $data['main'] = 'admin/bank/bank_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Bank
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Bank_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Bank',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Bank berhasil');
            redirect('admin/bank');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/bank/edit/' . $id);
        }
    }

}

/* End of file bank.php */
/* Location: ./application/controllers/admin/bank.php */
