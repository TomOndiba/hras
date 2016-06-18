<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * disn controllers class 
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Disn extends CI_Controller {

    private $pk    = 'disn_nik';
    private $table = 'disn';

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Disn_model', 'Activity_log_model', 'Employe_model', 'Setting_model'));
        $this->load->helper('string');
    }

    // disn Keterangan view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['disn'] = $this->Disn_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/disn/index');
        $config['total_rows'] = count($this->Disn_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Surat Keterangan Disnaker';
        $data['main'] = 'admin/disn/disn_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Disn_model->get(array('id' => $id)) == NULL) {
            redirect('admin/disn');
        }
        $data['disn'] = $this->Disn_model->get(array('id' => $id));               
        $data['title'] = 'Surat Keterangan Disnaker';
        $data['main'] = 'admin/disn/disn_view';
        $this->load->view('admin/layout', $data);
    }

    // Add disn and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('disn_name', 'Nama', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('disn_nik', 'NIK', 'trim|required|xss_clean');  
        $this->form_validation->set_rules('disn_position', 'Position', 'trim|required|xss_clean');          
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('disn_id')) {
                $params['disn_id'] = $this->input->post('disn_id');
            } else {
                $lastnumber = $this->Disn_model->get(array('limit' => 1, 'order_by' => 'disn_id'));
                $num = $lastnumber['disn_number'];
                $params['disn_number'] = sprintf('%04d', $num + 001);                
                
            }
            $params['disn_name'] = $this->input->post('disn_name');
            $params['disn_nik'] = $this->input->post('disn_nik');            
            $params['disn_position'] = $this->input->post('disn_position');
            $params['disn_entry_date'] = $this->input->post('disn_entry_date');
            $params['disn_end_date'] = $this->input->post('disn_end_date');
            $status = $this->Disn_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Keterangan Disnaker',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:NULL' 
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Surat Keterangan Disnaker berhasil');
            redirect('admin/disn');
        } else {
            if ($this->input->post('disn_id')) {
                redirect('admin/disn/edit/' . $this->input->post('disn_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['disn'] = $this->Disn_model->get(array('id' => $id));
            }
            $data['employe'] = $this->Employe_model->get();
            $data['title'] = $data['operation'] . ' Surat Keterangan Disnaker';
            $data['main'] = 'admin/disn/disn_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete disn Keterangan
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Disn_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Surat Keterangan Disnaker',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Surat Keterangan Disnaker berhasil');
            redirect('admin/disn');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/disn/edit/' . $id);
        }
    } 

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Disn_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $disn = $this->input->post('msg');
            for ($i = 0; $i < count($disn); $i++) {
                $print[] = $disn[$i];
            }
            $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
            $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
            $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7)); 
            $data['setting_initial'] = $this->Setting_model->get(array('id' => 8));
            $data['setting_branch'] = $this->Setting_model->get(array('id' => 1));
            $data['disn'] = $this->Disn_model->get(array('multiple_id' => $print));

            $html = $this->load->view('admin/disn/disn_multiple_pdf', $data, true);
            $data = pdf_create($html, 'A4', TRUE);
        }        
        redirect('admin/disn');
    }

    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/disn');
        $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
        $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
        $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7)); 
        $data['setting_initial'] = $this->Setting_model->get(array('id' => 8));
        $data['setting_address'] = $this->Setting_model->get(array('id' => 2));
        $data['setting_branch'] = $this->Setting_model->get(array('id' => 1));
        $data['setting_city'] = $this->Setting_model->get(array('id' => 3));
        $data['disn'] = $this->Disn_model->get(array('id' => $id));
        $html = $this->load->view('admin/disn/disn_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }



    public function import()
    { 
        $this->load->library('excel_reader');
        if ($this->input->post('upload'))   
        {
            if (empty($_FILES['file']['name']))
            {
                $this->session->set_flashdata('alert', alert('warning', 'Anda belum memilih file untuk diupload !'));
                redirect(uri_string());
            }
            else
            {
                $this->load->helper('file');
                $config['upload_path']   = './uploads/';               
                $config['allowed_types'] = 'xls';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                    $this->session->set_flashdata('alert', alert('error', 'Data tidak sesuai !'));
                    redirect(uri_string());
                }
                else
                {
                    $upload_data = $this->upload->data();
                    $this->load->library('excel_reader');
                    $this->excel_reader->setOutputEncoding('CP1251');
                    $this->excel_reader->read($upload_data['full_path']);
                    $data       = $this->excel_reader->sheets[0];
                    $data_excel = array();

                    for ($i = 1; $i <= $data['numRows']; $i++)
                    {
                        if($data['cells'][$i][1] == '') break;

                        $var  = $data['cells'][$i][5];
                        $entry = str_replace('/', '-', $var);
                        $var2  = $data['cells'][$i][6];
                        $end = str_replace('/', '-', $var2);

                        $data_excel[$i-1]['disn_nember']     = $data['cells'][$i][1];
                        $data_excel[$i-1]['disn_name']       = $data['cells'][$i][2];
                        $data_excel[$i-1]['disn_nik']        = $data['cells'][$i][3];
                        $data_excel[$i-1]['disn_position']   = $data['cells'][$i][4];
                        $data_excel[$i-1]['disn_entry_date'] = date('Y-m-d', strtotime($entry));                       
                        $data_excel[$i-1]['disn_end_date']   = date('Y-m-d', strtotime($end));



                    }

                    // echo '<pre>';
                    // print_r($data_excel);
                    // echo '</pre>';
                    // die();

                    @unlink('./uploads/'.$upload_data['file_name']);
                    $this->Disn_model->import_disn($data_excel) ?                   
                    $this->session->set_flashdata('success', 'Import Disnaker Berhasil !') :
                    $this->session->set_flashdata('success', 'Data tidak tersimpan dan/atau data sudah ada dalam database. Periksa kembali data anda!');
                    redirect(uri_string());
                }
            }
        }
        else
        {
            $data['title']   = 'Upload Disnaker';
            $data['action']  = site_url(uri_string());
            $data['disn'] = $this->data['import_disn'] = TRUE;
            $data['main'] = 'admin/disn/disn_upload';
            $data['alert']   = $this->session->flashdata('alert');
            $data['query']   = FALSE;
            $data['content'] = 'disn/import';
            $this->load->view('admin/layout', $data);
        }
    }

    public function download()
    {
        $data = file_get_contents("./media/template_excel/template_upload_disnaker.xls");
        $name = 'Template_Disnaker.xls';
        $this->load->helper('download');
        force_download($name, $data);
    }
}

/* End of file disn.php */
/* Location: ./application/controllers/admin/disn.php */
