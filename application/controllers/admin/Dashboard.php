<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Dashboard controllers class
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));            
        }
    }

    // Dashboard View
    public function index()
    {
        $this->load->model('Setting_model');
        $this->load->model('Employe_model');
        $this->load->model('Memorandum3_model');
        $this->load->model('Memorandum1_model');
        $this->load->model('Bpjs_model');
        $this->load->model('Suratk_model');
        $data['setting_branch'] = $this->Setting_model->get(array('id' => 1));
        $data['employe'] = count($this->Employe_model->get());
        $data['bpjs'] = count($this->Bpjs_model->get());
        $data['sk'] = count($this->Suratk_model->get());
        $data['memorandum3'] = count($this->Memorandum3_model->get(array('present' => 0)));
        $data['memorandum1'] = count($this->Memorandum1_model->get(array('present' => 1, 'finish' => 0)));
        $data['title'] = 'Dashboard';
        $data['main'] = 'admin/dashboard/dashboard';
        $this->load->view('admin/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
