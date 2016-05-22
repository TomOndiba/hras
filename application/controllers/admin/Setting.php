<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Setting controllers class
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */

class Setting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    public function index() {
        $this->load->model('Setting_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('setting_branch', 'Setting Branch', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_address', 'Setting Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_city', 'Setting Kota', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_pic', 'Setting PIC', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_employe_nik', 'Setting PDM', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_initial', 'Setting Inisial Branch', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_initial_bm', 'Setting Inisial BM', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_initial_pdm', 'Setting Inisial PDM', 'trim|required|xss_clean');
        $this->form_validation->set_rules('setting_unit', 'Setting Kode Branch', 'trim|required|xss_clean');        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            
            $param['setting_branch'] = $this->input->post('setting_branch');
            $param['setting_address'] = $this->input->post('setting_address');
            $param['setting_city'] = $this->input->post('setting_city');
            $param['setting_pic'] = $this->input->post('setting_pic');
            $param['setting_employe_nik'] = $this->input->post('setting_employe_nik');
            $param['setting_employe_name'] = $this->input->post('setting_employe_name');
            $param['setting_employe_position'] = $this->input->post('setting_employe_position');
            $param['setting_initial'] = $this->input->post('setting_initial');
            $param['setting_initial_bm'] = $this->input->post('setting_initial_bm');
            $param['setting_initial_pdm'] = $this->input->post('setting_initial_pdm');
            $param['setting_unit'] = $this->input->post('setting_unit');
            $this->Setting_model->save($param);
            $this->session->set_flashdata('success', ' Sunting pengaturan berhasil');
            redirect('admin/setting');
        } else {
            $data['title'] = 'Pengaturan';
            $data['setting_branch'] = $this->Setting_model->get(array('id' => 1));
            $data['setting_address'] = $this->Setting_model->get(array('id' => 2));
            $data['setting_city'] = $this->Setting_model->get(array('id' => 3));
            $data['setting_pic'] = $this->Setting_model->get(array('id' => 4));
            $data['setting_employe_nik'] = $this->Setting_model->get(array('id' => 5));
            $data['setting_employe_name'] = $this->Setting_model->get(array('id' => 6));
            $data['setting_employe_position'] = $this->Setting_model->get(array('id' => 7));
            $data['setting_initial'] = $this->Setting_model->get(array('id' => 8));
            $data['setting_initial_bm'] = $this->Setting_model->get(array('id' => 9));
            $data['setting_initial_pdm'] = $this->Setting_model->get(array('id' => 10));
            $data['setting_unit'] = $this->Setting_model->get(array('id' => 11));
            $data['main'] = 'admin/setting/setting_list';
            $this->load->view('admin/layout', $data);
        }
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
