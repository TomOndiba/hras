<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Spm controllers class 
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Spm extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Spm_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Habis Kontrak view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['spm'] = $this->Spm_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/spm/index');
        $config['total_rows'] = count($this->Spm_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Pengantar Mutasi';
        $data['main'] = 'admin/spm/spm_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Spm_model->get(array('id' => $id)) == NULL) {
            redirect('admin/spm');
        }
        $data['spm'] = $this->Spm_model->get(array('id' => $id));
        $data['title'] = 'Surat Pengantar Mutasi';
        $data['main'] = 'admin/spm/spm_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('spm_date', 'Tanggal Habis', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('spm_id')) {
                $params['spm_id'] = $this->input->post('spm_id');
            } else {
                $lastnumber = $this->Spm_model->get(array('limit' => 1, 'order_by' => 'spm_id'));
                $num = $lastnumber['spm_number'];
                $params['spm_number'] = sprintf('%04d', $num + 01);
                $params['spm_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['spm_date'] = $this->input->post('spm_date');
            $params['spm_branch'] = $this->input->post('spm_branch');             
            $params['spm_employe_nik'] = $this->input->post('employe_nik');
            $params['spm_employe_name'] = $this->input->post('employe_name');
            $params['spm_employe_position'] = $this->input->post('employe_position');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['spm_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Spm_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Pengantar Mutasi',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/spm');
        } else {
            if ($this->input->post('spm_id')) {
                redirect('admin/spm/edit/' . $this->input->post('spm_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['spm'] = $this->Spm_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Habis Kontrak';
            $data['main'] = 'admin/spm/spm_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Spm_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Pengantar Mutasi',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat Keterangan berhasil');
            redirect('admin/spm');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/spm/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/spm');

        $data['spm'] = $this->Spm_model->get(array('id' => $id));

        $html = $this->load->view('admin/spm/spm_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

}



/* End of file Spm.php */
/* Location: ./application/controllers/admin/spm.php */
