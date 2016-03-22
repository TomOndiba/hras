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
class Cetak extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Bpjs_model'));
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
            $params['bpjs_npp'] = $q['n'];
        }

        
        $params['cetak'] = 1;
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;


        $data['bpjs'] = $this->Bpjs_model->get($params);        
        $config['base_url'] = site_url('admin/cetak/index');
        $config['total_rows'] = count($this->Bpjs_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Panggilan Selesai';
        $data['main'] = 'admin/cetak/cetak_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Bpjs_model->get(array('id' => $id)) == NULL) {
            redirect('admin/cetak');
        }
        $data['bpjs'] = $this->Bpjs_model->get(array('id' => $id));        
        $data['title'] = 'Cetak Selesai';
        $data['main'] = 'admin/cetak/cetak_view';
        $this->load->view('admin/layout', $data);
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/cetak');

        $data['bpjs'] = $this->Bpjs_model->get(array('id' => $id));

        $html = $this->load->view('admin/memorandum/memorandum_pdf', $data, true);
        $data = pdf_create($html, '$paper', TRUE);
    }
    
}

/* End of file memorandum.php */
/* Location: ./application/controllers/admin/memorandum.php */
