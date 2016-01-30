<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * stl controllers class 
 *
 * 
 */
class Stl extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Stl_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Habis Kontrak view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['stl'] = $this->Stl_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/stl/index');
        $config['total_rows'] = count($this->Stl_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Tanda Lulus';
        $data['main'] = 'admin/stl/stl_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Stl_model->get(array('id' => $id)) == NULL) {
            redirect('admin/stl');
        }
        $data['stl'] = $this->Stl_model->get(array('id' => $id));
        $data['title'] = 'Surat Tanda Lulus';
        $data['main'] = 'admin/stl/stl_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('stl_date', 'Tanggal Periode', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('stl')) {
                $params['stl_id'] = $this->input->post('stl_id');
            } else {
                $lastnumber = $this->Stl_model->get(array('limit' => 1, 'order_by' => 'stl_id'));
                $num = $lastnumber['stl_number'];
                $params['stl_number'] = sprintf('%04d', $num + 01);
                $params['stl_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['stl_date'] = $this->input->post('stl_date');
            $params['stl_batch'] = $this->input->post('stl_batch'); 
            $params['stl_ipk'] = $this->input->post('stl_ipk');
            $params['stl_desc'] = $this->input->post('stl_desc');            
            $params['employe_id'] = $this->input->post('employe_id');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['stl_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Stl_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Tanda Lulus',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/stl');
        } else {
            if ($this->input->post('stl_id')) {
                redirect('admin/stl/edit/' . $this->input->post('stl_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['stl'] = $this->Stl_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Tanda Lulus';
            $data['main'] = 'admin/stl/stl_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Tanda Lulus
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Stl_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Tanda Lulus',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat berhasil');
            redirect('admin/stl');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/stl/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/stl');

        $data['stl'] = $this->Stl_model->get(array('id' => $id));

        $html = $this->load->view('admin/stl/stl_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

}



/* End of file Stl.php */
/* Location: ./application/controllers/admin/stl.php */
