<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Memorandum2 controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Memorandum2 extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Memorandum2_model', 'Activity_log_model', 'Memorandum1_model', 'Memorandum3_model'));
        $this->load->helper('string');
    }

    // Memorandum view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $q = $this->input->get(NULL, TRUE);

        $data['q'] = $q;
        $params = array(); 

        // Employe Nik
        if (isset($q['n']) && !empty($q['n']) && $q['n'] != '') {
            $params['memorandum_employe_nik'] = $q['n'];
        }
        
        $params['present'] = 0;
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;

        $data['memorandum'] = $this->Memorandum2_model->get($params);
        $data['memorandum3'] = $this->Memorandum3_model->get();
        $config['base_url'] = site_url('admin/memorandum2/index');
        $config['total_rows'] = count($this->Memorandum2_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Panggilan 2';
        $data['main'] = 'admin/memorandum2/memorandum_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Memorandum2_model->get(array('id' => $id)) == NULL) {
            redirect('admin/memorandum2');
        }
        $data['memorandum'] = $this->Memorandum2_model->get(array('id' => $id));
        $data['memorandum3'] = $this->Memorandum3_model->get(array('memorandum2_id' => $id));
        $data['title'] = 'Surat Panggilan 2';
        $data['main'] = 'admin/memorandum2/memorandum_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Memorandum and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('memorandum_date_sent', 'Tanggal Kirim', 'trim|required|xss_clean');
        $this->form_validation->set_rules('memorandum_call_date', 'Tanggal Panggilan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('memorandum1_id', 'Memorandum 1', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('memorandum_id')) {
                $params['memorandum_id'] = $this->input->post('memorandum_id');
            } else {
                $lastnumber = $this->Memorandum2_model->get(array('limit' => 1, 'order_by' => 'memorandum_id'));
                $num = $lastnumber['memorandum_number'];
                $params['memorandum_number'] = sprintf('%04d', $num + 01);
                $params['memorandum_input_date'] = date('Y-m-d H:i:s');
            }

            $params['memorandum_date_sent'] = $this->input->post('memorandum_date_sent');
            $params['memorandum_call_date'] = $this->input->post('memorandum_call_date');
            $params['memorandum1_id'] = $this->input->post('memorandum1_id');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['memorandum_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Memorandum2_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Panggilan 2',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:' . $status . ';Title:NULL'
                    )
                );

            if ($this->input->post('from_memorandum1')) {
                $this->session->set_flashdata('success', $data['operation'] . ' Surat Panggilan berhasil');
                redirect('admin/memorandum1/detail/'.$params['memorandum1_id']);
            } else {
                $this->session->set_flashdata('success', $data['operation'] . ' Surat Panggilan berhasil');
                redirect('admin/memorandum2');
            }
        } else {
            if ($this->input->post('memorandum_id')) {
                redirect('admin/memorandum/edit/' . $this->input->post('memorandum_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['memorandum'] = $this->Memorandum2_model->get(array('id' => $id));
            }
            $data['memorandum1'] = $this->Memorandum1_model->get();
            $data['title'] = $data['operation'] . ' Surat Panggilan 2';
            $data['main'] = 'admin/memorandum2/memorandum_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Memorandum
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Memorandum2_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Panggilan 2',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat Panggilan berhasil');
            redirect('admin/memorandum2');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/memorandum2/edit/' . $id);
        }
    }

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Memorandum2_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['memorandum'] = $this->Memorandum2_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/memorandum2/memorandum_multiple_pdf', $data, true);
            $data = pdf_create($html, '$paper', TRUE);
        }
        elseif ($action == "printEnvl") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['memorandum'] = $this->Memorandum2_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/memorandum2/memorandum_multi_envelope', $data, true);
            $data = pdf_create($html, '$paper', TRUE);
        }
        redirect('admin/memorandum2');
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/memorandum2');

        $data['memorandum'] = $this->Memorandum2_model->get(array('id' => $id));

        $html = $this->load->view('admin/memorandum2/memorandum_pdf', $data, true);
        $data = pdf_create($html, '', TRUE);
    }

    function printEnvl($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/memorandum2');

        $data['memorandum'] = $this->Memorandum2_model->get(array('id' => $id));

        $html = $this->load->view('admin/memorandum2/memorandum_envelope', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

    function present($id = NULL) {
        $memorandum2 = $this->Memorandum2_model->get(array('id' => $id));
        $this->Memorandum2_model->add(array('memorandum_id'=> $id, 'memorandum_is_present' => 1));
        $this->Memorandum1_model->add(array('memorandum_id'=> $memorandum2['memorandum1_memorandum_id'], 'memorandum_is_present' => 1));
        $this->session->set_flashdata('success', 'Sunting Surat Panggilan berhasil');
        redirect('admin/memorandum2');
    }
}



/* End of file memorandum.php */
/* Location: ./application/controllers/admin/memorandum.php */
