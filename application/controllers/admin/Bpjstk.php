<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* bpjstk Controllers
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */
class Bpjstk extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Bpjstk_model', 'Activity_log_model', 'Setting_model'));
        $this->load->helper('string');
    }

    // bpjstk view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // Name
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['bpjstk_name'] = $f['n'];
        }
        
        
        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $data['bpjstk'] = $this->Bpjstk_model->get($params);
        
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/bpjstk/index');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Bpjstk_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'BPJS Ketenagakerjaan';
        $data['main'] = 'admin/bpjstk/bpjstk_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {        
        if ($this->Bpjstk_model->get(array('id' => $id)) == NULL) {
            redirect('admin/bpjstk');
        }
        $data['bpjstk'] = $this->Bpjstk_model->get(array('id' => $id));              
        $data['title'] = 'Detail BPJS Ketenagakerjaan';
        $data['main'] = 'admin/bpjstk/bpjstk_view';
        $this->load->view('admin/layout', $data);
    }
    

    // Add bpjstk and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bpjstk_name', 'Nama', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('bpjstk_desc', 'Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bpjstk_date', 'Tanggal', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('bpjstk_npp', 'NPP', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('bpjstk_entry_date', 'Tanggal Awal', 'trim|required|xss_clean');          
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('bpjstk_id')) {
                $params['bpjstk_id'] = $this->input->post('bpjstk_id');
            } else {                
                $params['bpjstk_name'] = $this->input->post('bpjstk_name');
            }

            $params['bpjstk_card'] = $this->input->post('bpjstk_card');
            $params['bpjstk_npp'] = $this->input->post('bpjstk_npp');
            $params['bpjstk_entry_date'] = $this->input->post('bpjstk_entry_date');
            $params['bpjstk_desc'] = $this->input->post('bpjstk_desc');             
            $params['bpjstk_date'] = $this->input->post('bpjstk_date');                   
            $status = $this->Bpjstk_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'bpjstk',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:' . $params['bpjstk_name']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' bpjstk berhasil');
            redirect('admin/bpjstk');
        } else {
            if ($this->input->post('bpjstk_id')) {
                redirect('admin/bpjstk/edit/' . $this->input->post('bpjstk_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['bpjstk'] = $this->Bpjstk_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' BPJS Ketenagakerjaan';
            $data['main'] = 'admin/bpjstk/bpjstk_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete bpjstk
    public function delete($id = NULL) {

        if ($id == NULL) {
            if ($this->session->userdata('user_role') != ROLE_SUPER_ADMIN) {
                redirect('admin/bpjstk');
            } else {
                $this->Bpjstk_model->delete_all();
                redirect('admin/bpjstk');
            }
        }

        if ($_POST) {
            $this->Bpjstk_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'bpjstk',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus bpjstk berhasil');
            redirect('admin/bpjstk');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/bpjstk/edit/' . $id);
        }
    }

    function multiple() {
        $action = $this->input->post('action');
        if ($action == "delete") {
            $delete = $this->input->post('msg');
            for ($i = 0; $i < count($delete); $i++) {
                $this->Bpjstk_model->delete($delete[$i]);
            }
        } elseif ($action == "printPdf") {
            $this->load->helper(array('dompdf'));
            $this->load->helper(array('tanggal'));
            $bpjstkk = $this->input->post('msg');
            for ($i = 0; $i < count($bpjstkk); $i++) {
                $print[] = $bpjstkk[$i];
            }
            $data['bpjstk'] = $this->Bpjstk_model->get(array('multiple_id' => $print));
            $html = $this->load->view('admin/bpjstk/bpjstk_multiple_pdf', $data, true);
            $data = pdf_create($html, 'HRD_BPJSTK_'.date('d_m_Y'), TRUE, [0,0,325,620], 'potrait');
        }   
        redirect('admin/bpjstk');
    }


    function printPdf($id = NULL) {
        $this->load->helper(array('dompdf'));
        $this->load->helper(array('tanggal'));
        if ($id == NULL)
            redirect('admin/bpjstk');
        $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
        $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
        $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7));

        $data['bpjstk'] = $this->Bpjstk_model->get(array('id' => $id));           

        $html = $this->load->view('admin/bpjstk/bpjstk_pdf', $data, true);
        $data = pdf_create($html, '', TRUE, 'A4', TRUE);
    }
}

/* End of file bpjstk.php */
/* Location: ./application/controllers/admin/bpjstk.php */
