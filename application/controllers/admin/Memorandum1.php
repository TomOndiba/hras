<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Memorandum1 controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Memorandum1 extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Memorandum1_model', 'Activity_log_model', 'Employe_model', 'Memorandum2_model'));
        $this->load->helper('string');
    }

    // Memorandum view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['memorandum'] = $this->Memorandum1_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/memorandum1/index');
        $config['total_rows'] = count($this->Memorandum1_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Panggilan 1';
        $data['main'] = 'admin/memorandum1/memorandum_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Memorandum1_model->get(array('id' => $id)) == NULL) {
            redirect('admin/memorandum1');
        }
        $data['memorandum'] = $this->Memorandum1_model->get(array('id' => $id));
        $data['memorandum2'] = $this->Memorandum2_model->get(array('memorandum1_id' => $id));
        $data['title'] = 'Surat Panggilan 1';
        $data['main'] = 'admin/memorandum1/memorandum_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Memorandum and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('memorandum_absent_date', 'Tanggal Mangkir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('memorandum_date_sent', 'Tanggal Kirim', 'trim|required|xss_clean');
        $this->form_validation->set_rules('memorandum_call_date', 'Tanggal Panggilan', 'trim|required|xss_clean'); 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('memorandum_id')) {
                $params['memorandum_id'] = $this->input->post('memorandum_id');
            } else {
                $params['memorandum_input_date'] = date('Y-m-d H:i:s');
                $params['memorandum_number'] = sprintf('%04d', 01);
            }

            $params['memorandum_email_date'] = $this->input->post('memorandum_email_date');
            $params['memorandum_absent_date'] = $this->input->post('memorandum_absent_date');
            $params['memorandum_date_sent'] = $this->input->post('memorandum_date_sent');
            $params['memorandum_call_date'] = $this->input->post('memorandum_call_date');
            $params['employe_id'] = $this->input->post('employe_id');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['memorandum_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Memorandum1_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Surat Panggilan 1',
                        'log_action' => $data['operation'],
                        'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat Panggilan berhasil');
            redirect('admin/memorandum1');
        } else {
            if ($this->input->post('memorandum_id')) {
                redirect('admin/memorandum/edit/' . $this->input->post('memorandum_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['memorandum'] = $this->Memorandum1_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Panggilan 1';
            $data['main'] = 'admin/memorandum1/memorandum_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Memorandum
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Memorandum1_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Surat Panggilan 1',
                        'log_action' => 'Hapus',
                        'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus Surat Panggilan berhasil');
            redirect('admin/memorandum1');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/memorandum1/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/memorandum1');

        $data['memorandum'] = $this->Memorandum1_model->get(array('id' => $id));

        $html = $this->load->view('admin/memorandum1/memorandum_pdf', $data, true);
        $data = pdf_create($html, '$paper', TRUE);
    }

}

/* End of file memorandum.php */
/* Location: ./application/controllers/admin/memorandum.php */
