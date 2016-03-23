<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Cetak controllers class
 * 
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
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

    // Cetak view in list
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

        
        $params['bpjs_cetak'] = 1;
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;


        $data['bpjs'] = $this->Bpjs_model->get($params);        
        $config['base_url'] = site_url('admin/cetak/index');
        $config['total_rows'] = count($this->Bpjs_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'Cetak Kartu BPJS';
        $data['main'] = 'admin/cetak/cetak_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Bpjs_model->get(array('id' => $id)) == NULL) {
            redirect('admin/cetak');
        }
        $data['cetak'] = $this->Bpjs_model->get(array('id' => $id));        
        $data['title'] = 'Cetak Selesai';
        $data['main'] = 'admin/cetak/cetak_view';
        $this->load->view('admin/layout', $data);
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
        redirect('admin/cetak');
    }

    function uncetak($id = NULL) {
        $this->Bpjs_model->add(array('bpjs_id' => $id, 'bpjs_cetak' => 0));
        $this->session->set_flashdata('success', 'Sunting Hapus berhasil');
        redirect('admin/cetak');
    }
    
}

/* End of file cetak.php */
/* Location: ./application/controllers/admin/cetak.php */
