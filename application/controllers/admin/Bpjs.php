<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* BPJS Controllers
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */
class Bpjs extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Bpjs_model', 'Activity_log_model'));
        $this->load->helper('string');
    }

    // Bpjs view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // Nip
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['bpjs_npp'] = $f['n'];
        }

        // Nip
        if (isset($f['k']) && !empty($f['k']) && $f['k'] != '') {
            $params['bpjs_ktp'] = $f['k'];
        }
        
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $data['bpjs'] = $this->Bpjs_model->get($params);

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/bpjs/index');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Bpjs_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'BPJS';
        $data['main'] = 'admin/bpjs/bpjs_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Bpjs_model->get(array('id' => $id)) == NULL) {
            redirect('admin/bpjs');
        }
        $data['bpjs'] = $this->Bpjs_model->get(array('id' => $id));
        $data['title'] = 'Detail Bpjs';
        $data['main'] = 'admin/bpjs/bpjs_view';
        $this->load->view('admin/layout', $data);
    }
    

    // Add Bpjs and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bpjs_noka', 'Noka', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_ktp', 'Ktp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_npp', 'NIK', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_name', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_hub', 'Hub Kel', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_tmt', 'TMT Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_faskes', 'Faskes', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjs_kelas', 'Kelas', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('bpjs_id')) {
                $params['bpjs_id'] = $this->input->post('bpjs_id');
            } else {                
                $params['bpjs_noka'] = $this->input->post('bpjs_noka');
            }

            $params['bpjs_ktp'] = $this->input->post('bpjs_ktp');
            $params['bpjs_npp'] = $this->input->post('bpjs_npp');
            $params['bpjs_name'] = stripslashes($this->input->post('bpjs_name'));
            $params['bpjs_hub'] = stripslashes($this->input->post('bpjs_hub'));
            $params['bpjs_date'] = $this->input->post('bpjs_date');
            $params['bpjs_tmt'] = $this->input->post('bpjs_tmt');            
            $params['bpjs_faskes'] = $this->input->post('bpjs_faskes'); 
            $params['bpjs_kelas'] = $this->input->post('bpjs_kelas');         
            $status = $this->Bpjs_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'BPJS',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:' . $params['bpjs_name']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' BPJS berhasil');
            redirect('admin/bpjs');
        } else {
            if ($this->input->post('bpjs_id')) {
                redirect('admin/bpjs/edit/' . $this->input->post('bpjs_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['bpjs'] = $this->Bpjs_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' BPJS';
            $data['main'] = 'admin/bpjs/bpjs_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Bpjs
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Bpjs_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'BPJS',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Bpjs berhasil');
            redirect('admin/bpjs');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/bpjs/edit/' . $id);
        }
    }

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Bpjs_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $bpjsk = $this->input->post('msg');
            for ($i = 0; $i < count($bpjsk); $i++) {
                $print[] = $bpjsk[$i];
            }
            $data['bpjs'] = $this->Bpjs_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/bpjs/bpjs_multiple_pdf', $data, true);
            $data = pdf_create($html, '', TRUE, [0,0,325,620], 'landscape');
        }   
        elseif ($action == "cetak") {
            $cetak = $this->input->post('msg');
            for ($i = 0; $i < count($cetak); $i++) {
                $this->Bpjs_model->add(array('bpjs_id' => $cetak[$i], 'bpjs_cetak' => 1));
                $this->session->set_flashdata('success', 'Sunting Cetak berhasil');
            }
        }
        redirect('admin/bpjs');
    }


    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/bpjs');

        $data['bpjs'] = $this->Bpjs_model->get(array('id' => $id));

        $html = $this->load->view('admin/bpjs/bpjs_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, [0,0,325,620], 'landscape');
    }

    function cetak($id = NULL) {
        $this->Bpjs_model->add(array('bpjs_id' => $id, 'bpjs_cetak' => 1));
        $this->session->set_flashdata('success', 'Sunting Cetak berhasil');
        redirect('admin/bpjs');
    }

}

/* End of file bpjs.php */
/* Location: ./application/controllers/admin/bpjs.php */
