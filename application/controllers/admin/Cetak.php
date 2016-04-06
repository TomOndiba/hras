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
        $params['limit'] = 100;
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

            for($i = 0; $i < count($data['bpjs']); $i++ ){
            $this->barcode2($data['bpjs'][$i]['bpjs_noka'], '');
        }
            
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
    
    private function barcode2($sparepart_code, $barcode_type=39, $scale=6, $fontsize=1, $thickness=30,$dpi=72) {
    // CREATE BARCODE GENERATOR
    // Including all required classes
    require_once( APPPATH . 'libraries/barcodegen/BCGFontFile.php');
    require_once( APPPATH . 'libraries/barcodegen/BCGColor.php');
    require_once( APPPATH . 'libraries/barcodegen/BCGDrawing.php');

    // Including the barcode technology
    // Ini bisa diganti-ganti mau yang 39, ato 128, dll, liat di folder barcodegen
    require_once( APPPATH . 'libraries/barcodegen/BCGcode39.barcode.php');

    // Loading Font
    // kalo mau ganti font, jangan lupa tambahin dulu ke folder font, baru loadnya di sini
    $font = new BCGFontFile(APPPATH . 'libraries/font/Arial.ttf', $fontsize);
    
    // Text apa yang mau dijadiin barcode, biasanya kode produk
    $text = $sparepart_code;

    // The arguments are R, G, B for color.
    $color_black = new BCGColor(0, 0, 0);
    $color_white = new BCGColor(255, 255, 255);

    $drawException = null;
    try {
        $code = new BCGcode39(); // kalo pake yg code39, klo yg lain mesti disesuaikan
        $code->setScale($scale); // Resolution
        $code->setThickness($thickness); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
        $code->parse($text); // Text
    } catch(Exception $exception) {
        $drawException = $exception;
    }

    /* Here is the list of the arguments
    1 - Filename (empty : display on screen)
    2 - Background color */
    $drawing = new BCGDrawing('', $color_white);
    if($drawException) {
        $drawing->drawException($drawException);
    } else {
        $drawing->setDPI($dpi);
        $drawing->setBarcode($code);
        $drawing->draw();
    }
    // ini cuma labeling dari sisi aplikasi saya, penamaan file menjadi png barcode.
    $filename_img_barcode = $sparepart_code .'_'.$barcode_type.'.png';
    // folder untuk menyimpan barcode
    $drawing->setFilename( FCPATH .'uploads/bpjs/'. $sparepart_code.'.png');
    // proses penyimpanan barcode hasil generate
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);

    return $filename_img_barcode;
}


}

/* End of file cetak.php */
/* Location: ./application/controllers/admin/cetak.php */
