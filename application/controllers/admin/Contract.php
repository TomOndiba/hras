<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Contract controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */ 
class Contract extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Contract_model', 'Activity_log_model', 'Employe_model'));
        $this->load->helper('string');
    }

    // Surat Habis Kontrak view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');

        // Apply Filter
        // Get $_GET variable
        $q = $this->input->get(NULL, TRUE);

        $data['q'] = $q;
        $params = array(); 

        // Employe Nik
        if (isset($q['n']) && !empty($q['n']) && $q['n'] != '') {
            $params['contract_employe_nik'] = $q['n'];
        }

        // Date start
        if (isset($q['ds']) && !empty($q['ds']) && $q['ds'] != '') {
            $params['date_start'] = $q['ds'];
        }

        // Date end
        if (isset($q['de']) && !empty($q['de']) && $q['de'] != '') {
            $params['date_end'] = $q['de'];
        }
        
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;


        $data['contract'] = $this->Contract_model->get($params);        
        $config['base_url'] = site_url('admin/contract/index');
        $config['total_rows'] = count($this->Contract_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Pemberitahuan Kontrak';
        $data['main'] = 'admin/contract/contract_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Contract_model->get(array('id' => $id)) == NULL) {
            redirect('admin/contract');
        }
        $data['contract'] = $this->Contract_model->get(array('id' => $id));
        $data['title'] = 'Surat Habis Kontrak';
        $data['main'] = 'admin/contract/contract_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Surat and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('contract_date', 'Tanggal Habis', 'trim|required|xss_clean');                 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('contract_id')) {
                $params['contract_id'] = $this->input->post('contract_id');
            } else {
                $lastnumber = $this->Contract_model->get(array('limit' => 1, 'order_by' => 'contract_id'));
                $num = $lastnumber['contract_number'];
                $params['contract_number'] = sprintf('%04d', $num + 01);
                $params['contract_input_date'] = date('Y-m-d H:i:s');
                
            }

            $params['contract_date'] = $this->input->post('contract_date');
            $params['contract_ke'] = $this->input->post('contract_ke');             
            $params['contract_employe_nik'] = $this->input->post('employe_nik');
            $params['contract_employe_name'] = $this->input->post('employe_name');
            $params['contract_employe_position'] = $this->input->post('employe_position');
            $params['contract_employe_address'] = $this->input->post('employe_address');
            $params['contract_employe_phone'] = $this->input->post('employe_phone');
            $params['user_id'] = $this->session->userdata('user_id');
            $params['contaract_last_update'] = date('Y-m-d H:i:s');
            $status = $this->Contract_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Habis Kontrak',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat berhasil');
            redirect('admin/contract');
        } else {
            if ($this->input->post('contract_id')) {
                redirect('admin/contract/edit/' . $this->input->post('contract_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['contract'] = $this->Contract_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Habis Kontrak';
            $data['main'] = 'admin/contract/contract_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Surat Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Contract_model->delete($this->input->post('del_id'));
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
            redirect('admin/contract');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/contract/edit/' . $id);
        }
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/contract');

        $data['contract'] = $this->Contract_model->get(array('id' => $id));

        $html = $this->load->view('admin/contract/contract_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

    function printEnvl($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/contract');

        $data['contract'] = $this->Contract_model->get(array('id' => $id));

        $html = $this->load->view('admin/contract/contract_envelope', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Contract_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['contract'] = $this->Contract_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/contract/contract_multiple_pdf', $data, true);
            $data = pdf_create($html, 'A4', TRUE);
        }
        elseif ($action == "printEnvl") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $memo = $this->input->post('msg');
            for ($i = 0; $i < count($memo); $i++) {
                $print[] = $memo[$i];
            }
            $data['contract'] = $this->Contract_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/contract/contract_multiple_envelope', $data, true);
            $data = pdf_create($html, 'A4', TRUE);
        }
        redirect('admin/contract');
    }

    public function export() {
        $this->load->helper('csv');
        // Apply Filter
        // Get $_GET variable
        $q = $this->input->get(NULL, TRUE);

        $data['q'] = $q;

        $params = array();
        
        // Date start
        if (isset($q['ds']) && !empty($q['ds']) && $q['ds'] != '') {
            $params['date_start'] = $q['ds'];
        }

        // Date end
        if (isset($q['de']) && !empty($q['de']) && $q['de'] != '') {
            $params['date_end'] = $q['de'];
        }
        

        $data['contract'] = $this->Contract_model->get($params);        
        $csv = array(
            0 => array(
                'NO.', 'NIK', 'NAMA', 'JABATAN', 'TGL HABIS KONTRAK', 'KONTRAK KE', 'ALAMAT', 'NO TLP', 'KETERANGAN'
            
                )
            );
        $i = 1;
        foreach ($data['contract'] as $row) {
            $csv[] = array( $i,
                $row['contract_employe_nik'], $row['contract_employe_name'], $row['contract_employe_position'],                
                pretty_date($row['contract_date'], 'm/d/Y', FALSE), 
                $row['contract_ke'],             
                $row['contract_employe_address'],
                $row['contract_employe_phone']
                );
            $i++;
        }
        // echo "<pre>";
       // echo print_r($csv);
         // echo "</pre>";
         // die();
        array_to_csv($csv, 'Report_Surat_Kontrak.csv');
    }


}



/* End of file Contract.php */
/* Location: ./application/controllers/admin/contract.php */
