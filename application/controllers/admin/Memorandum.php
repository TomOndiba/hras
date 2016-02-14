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

        // Employe Nik
        if (isset($q['n']) && !empty($q['n']) && $q['n'] != '') {
            $params['memorandum_employe_nik'] = $q['n'];
        }

        // Date start
        if (isset($q['ds']) && !empty($q['ds']) && $q['ds'] != '') {
            $params['date_start'] = $q['ds'];
        }

        // Date end
        if (isset($q['de']) && !empty($q['de']) && $q['de'] != '') {
            $params['date_end'] = $q['de'];
        }
        $params['present'] = 1;
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;


        $data['memorandum'] = $this->Memorandum1_model->get($params);
        $data['memorandum2'] = $this->Memorandum2_model->get();
        $data['memorandum3'] = $this->Memorandum3_model->get();
        $config['base_url'] = site_url('admin/memorandum/index');
        $config['total_rows'] = count($this->Memorandum1_model->get($paramsPage));
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
                'NO.', 'NIK', 'NAMA', 'JABATAN', 'EMAIL', 'MANGKIR', 'SP 1', 'PANGGILAN 1', 'SP 2',
                'PANGGILAN 2', 'SP 3', 'PANGGILAN 3', 'KETERANGAN'
            
                )
            );
        $i = 1;
        foreach ($data['memorandum'] as $row) {
            $csv[] = array( $i,
                $row['memorandum_employe_nik'], $row['memorandum_employe_name'], $row['memorandum_employe_position'],
                pretty_date($row['memorandum_email_date'], 'm/d/Y', FALSE),
                pretty_date($row['memorandum_absent_date'], 'm/d/Y', FALSE),
                pretty_date($row['memorandum_date_sent'], 'm/d/Y', FALSE),
                pretty_date($row['memorandum_call_date'], 'm/d/Y', FALSE),
                ($row['memorandum2_date_sent'] != NULL)? pretty_date($row['memorandum2_date_sent'], 'm/d/Y', FALSE) : '',
                ($row['memorandum2_call_date'] != NULL)? pretty_date($row['memorandum2_call_date'], 'm/d/Y', FALSE) : '',
                ($row['memorandum3_date_sent'] != NULL)? pretty_date($row['memorandum3_date_sent'], 'm/d/Y', FALSE) : '',
                ($row['memorandum3_call_date'] != NULL)? pretty_date($row['memorandum3_call_date'], 'm/d/Y', FALSE) : '',
                $row['memorandum_finished_desc']
                );
            $i++;
        }
        // echo "<pre>";
       // echo print_r($csv);
         // echo "</pre>";
         // die();
        array_to_csv($csv, 'Report_Surat_Panggilan.csv');
    }

}

/* End of file memorandum.php */
/* Location: ./application/controllers/admin/memorandum.php */
