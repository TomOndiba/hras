<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Suratk controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Suratk extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Suratk_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Keterangan view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['surat'] = $this->Suratk_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/suratk/index');
        $config['total_rows'] = count($this->Suratk_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Keterangan';
        $data['main'] = 'admin/suratk/surat_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Suratk_model->get(array('id' => $id)) == NULL) {
            redirect('admin/suratk');
        }
        $data['surat'] = $this->Suratk_model->get(array('id' => $id));        
        $data['title'] = 'Surat Keterangan';
        $data['main'] = 'admin/suratk/surat_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sk_description', 'Keterangan Untuk', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sk_date', 'Tanggal Surat', 'trim|required|xss_clean');         
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('sk_id')) {
                $params['sk_id'] = $this->input->post('sk_id');
            } else {
                $lastnumber = $this->Suratk_model->get(array('limit' => 1, 'order_by' => 'sk_id'));
                $num = $lastnumber['sk_number'];
                $params['sk_number'] = sprintf('%04d', $num + 01);
                $params['sk_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['sk_description'] = $this->input->post('sk_description');
            $params['sk_date'] = $this->input->post('sk_date');            
            $params['sk_employe_nik'] = $this->input->post('employe_nik');
            $params['sk_employe_name'] = $this->input->post('employe_name');
            $params['sk_employe_position'] = $this->input->post('employe_position');
            $params['sk_employe_date_register'] = $this->input->post('employe_date_register');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['sk_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Suratk_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Keterangan',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat Keterangan berhasil');
            redirect('admin/suratk');
        } else {
            if ($this->input->post('sk_id')) {
                redirect('admin/suratk/edit/' . $this->input->post('surat_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['surat'] = $this->Suratk_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Keterangan';
            $data['main'] = 'admin/suratk/surat_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Suratk_model->delete($this->input->post('del_id'));
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
            $this->session->set_flashdata('success', 'Hapus Surat Keterangan berhasil');
            redirect('admin/suratk');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/suratk/edit/' . $id);
        }
    } 

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Suratk_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $sk = $this->input->post('msg');
            for ($i = 0; $i < count($sk); $i++) {
                $print[] = $sk[$i];
            }
            $data['sk'] = $this->Suratk_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/suratk/sk_multiple_pdf', $data, true);
            $data = pdf_create($html, '$paper', TRUE);
        }        
        redirect('admin/suratk');
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/suratk');

        $data['suratk'] = $this->Suratk_model->get(array('id' => $id));

        $html = $this->load->view('admin/suratk/suratk_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

}



/* End of file Suratk.php */
/* Location: ./application/controllers/admin/Suratk.php */
