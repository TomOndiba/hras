<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Spb controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Spb extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Spb_model', 'Activity_log_model', 'Bank_model'));
        $this->load->helper('string');
    }

    // Surat Bank view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['spb'] = $this->Spb_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/spb/index');
        $config['total_rows'] = count($this->Spb_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Pengantar Bank';
        $data['main'] = 'admin/spb/spb_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Spb_model->get(array('id' => $id)) == NULL) {
            redirect('admin/spb');
        }
        $data['spb'] = $this->Spb_model->get(array('id' => $id));
        $data['title'] = 'Surat Pengantar Bank';
        $data['main'] = 'admin/spb/spb_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('spb_date', 'Tanggal Kirim', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('spb_id')) {
                $params['spb_id'] = $this->input->post('spb_id');
            } else {
                $lastnumber = $this->Spb_model->get(array('limit' => 1, 'order_by' => 'spb_id'));
                $num = $lastnumber['spb_number'];
                $params['spb_number'] = sprintf('%04d', $num + 01);
                $params['spb_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['spb_date'] = $this->input->post('spb_date');
            $params['bank_id'] = $this->input->post('bank_id');             
            $params['spb_name1'] = $this->input->post('spb_name1');
            $params['spb_name2'] = $this->input->post('spb_name2');
            $params['spb_name3'] = $this->input->post('spb_name3');
            $params['spb_name4'] = $this->input->post('spb_name4');
            $params['spb_name5'] = $this->input->post('spb_name5');
            $params['spb_name6'] = $this->input->post('spb_name6');
            $params['spb_name7'] = $this->input->post('spb_name7');
            $params['spb_name8'] = $this->input->post('spb_name8');
            $params['spb_name9'] = $this->input->post('spb_name9');
            $params['spb_name10'] = $this->input->post('spb_name10');
            $params['spb_nik1'] = $this->input->post('spb_nik1');
            $params['spb_nik2'] = $this->input->post('spb_nik2');
            $params['spb_nik3'] = $this->input->post('spb_nik3');
            $params['spb_nik4'] = $this->input->post('spb_nik4');
            $params['spb_nik5'] = $this->input->post('spb_nik5');
            $params['spb_nik6'] = $this->input->post('spb_nik6');
            $params['spb_nik7'] = $this->input->post('spb_nik7');
            $params['spb_nik8'] = $this->input->post('spb_nik8');
            $params['spb_nik9'] = $this->input->post('spb_nik9');
            $params['spb_nik10'] = $this->input->post('spb_nik10');
            $params['user_id'] = $this->session->userdata('user_id');            
            $params['spb_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Spb_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Pengantar Bank',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/spb');
        } else {
            if ($this->input->post('spb_id')) {
                redirect('admin/spb/edit/' . $this->input->post('spb_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['spb'] = $this->Spb_model->get(array('id' => $id));
            }
            $data['bank'] = $this->Bank_model->get();
            $data['title'] = $data['operation'] . ' Surat Pengantar Bank';
            $data['main'] = 'admin/spb/spb_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Bank
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Spb_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Bank',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat Bank berhasil');
            redirect('admin/spb');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/spb/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/spb');

        $data['spb'] = $this->Spb_model->get(array('id' => $id));

        $html = $this->load->view('admin/spb/spb_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

}



/* End of file Spb.php */
/* Location: ./application/controllers/admin/Spb.php */
