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
class Memorandum extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Memorandum1_model', 'Memorandum2_model', 'Memorandum3_model'));
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

        // Date start
        if (isset($q['ds']) && !empty($q['ds']) && $q['ds'] != '') {
            $params['date_start'] = $q['ds'];
        }

        // Date end
        if (isset($q['de']) && !empty($q['de']) && $q['de'] != '') {
            $params['date_end'] = $q['de'];
        }

        $data['memorandum'] = $this->Memorandum1_model->get(array('limit' => 10, 'present' => 1, 'offset' => $offset));
        $data['memorandum2'] = $this->Memorandum2_model->get();
        $data['memorandum3'] = $this->Memorandum3_model->get();
        $config['base_url'] = site_url('admin/memorandum/index');
        $config['total_rows'] = count($this->Memorandum1_model->get(array('present' => 1,)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Panggilan Selesai';
        $data['main'] = 'admin/memorandum/memorandum_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Memorandum1_model->get(array('id' => $id)) == NULL) {
            redirect('admin/memorandum');
        }
        $data['memorandum'] = $this->Memorandum1_model->get(array('id' => $id));
        $data['memorandum2'] = $this->Memorandum2_model->get(array('memorandum1_id' => $id));
        $data['memorandum3'] = $this->Memorandum3_model->get(array('memorandum1_id' => $id));
        $data['title'] = 'Surat Panggilan Selesai';
        $data['main'] = 'admin/memorandum/memorandum_view';
        $this->load->view('admin/layout', $data);
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/memorandum');

        $data['memorandum'] = $this->Memorandum1_model->get(array('id' => $id));

        $html = $this->load->view('admin/memorandum/memorandum_pdf', $data, true);
        $data = pdf_create($html, '$paper', TRUE);
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
        

        $data['memorandum'] = $this->Memorandum1_model->get($params);
        $csv = array(
            0 => array(
                'No.', 'NIK', 'Nama', 'Tanggal Email', 'Tanggal Mangkir', 'Tanggal SP 1', 'Tanggal SP 2', 'Tanggal Kualifikasi', 'Keterangan'
                
            )
        );
        $i = 1;
        foreach ($data['memorandum'] as $row) {
            $csv[] = array( $i,
                $row['employe_nik'], $row['employe_name'],
                $row['memorandum_email_date'], pretty_date($row['memorandum_email_date'], 'm/d/Y', FALSE),
                $row['memorandum_absent_date'], pretty_date($row['memorandum_absent_date'], 'm/d/Y', FALSE),
                $row['memorandum_finished_desc']
            );
            $i++;
        }
        array_to_csv($csv, 'Report_Surat_Panggilan.csv');
    }

}

/* End of file memorandum.php */
/* Location: ./application/controllers/admin/memorandum.php */
