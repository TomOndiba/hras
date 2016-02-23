<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Procuration controllers class 
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Procuration extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Procuration_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Habis Kontrak view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['procuration'] = $this->Procuration_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/procuration/index');
        $config['total_rows'] = count($this->Procuration_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Kuasa';
        $data['main'] = 'admin/procuration/procuration_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Procuration_model->get(array('id' => $id)) == NULL) {
            redirect('admin/procuration');
        }
        $data['procuration'] = $this->Procuration_model->get(array('id' => $id));
        $data['title'] = 'Surat Kuasa';
        $data['main'] = 'admin/procuration/procuration_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('procuration_date', 'Tanggal Habis', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('procuration_id')) {
                $params['procuration_id'] = $this->input->post('procuration_id');
            } else {
                $lastnumber = $this->Procuration_model->get(array('limit' => 1, 'order_by' => 'procuration_id'));
                $num = $lastnumber['procuration_number'];
                $params['procuration_number'] = sprintf('%04d', $num + 01);
                $params['procuration_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['procuration_desc'] = $this->input->post('procuration_desc');  
            $params['procuration_date'] = $this->input->post('procuration_date');                     
            $params['procuration_employe_nik'] = $this->input->post('employe_nik');
            $params['procuration_employe_name'] = $this->input->post('employe_name');
            $params['procuration_employe_position'] = $this->input->post('employe_position');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['procuration_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Procuration_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Kuasa',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/procuration');
        } else {
            if ($this->input->post('procuration_id')) {
                redirect('admin/procuration/edit/' . $this->input->post('procuration_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['procuration'] = $this->Procuration_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Kuasa';
            $data['main'] = 'admin/procuration/procuration_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Procuration_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Kuasa',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat Keterangan berhasil');
            redirect('admin/procuration');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/procuration/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/procuration');

        $data['procuration'] = $this->Procuration_model->get(array('id' => $id));

        $html = $this->load->view('admin/procuration/procuration_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

}



/* End of file Procuration.php */
/* Location: ./application/controllers/admin/procuration.php */
