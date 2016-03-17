<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * user Model Class
 *
 * @package     SYSCMS
 * @subpackage  Controller
 * @category    Controller
 * @author      Andi Dwi Saputro 
 */
class Upload_file extends CI_Controller {

	function __construct() {
		parrent::__construct();
		$this->load->model('Upload_file_model');
	}

	// upload / store file into database, it's not a good practice but still you can try

	function upload() {
		 $this->load->library('upload');
 		 $file = $_FILES['file']['tmp_name'];
 		 $filename = mysql_real_escape_string($_FILES['file']['name']);
 		 $filedata = mysql_real_escape_string(file_get_contents($file));
  		 //echo $file;
  		 $this->load->model('Upload_file_model');
  		 $this->Upload_file_model->upload($filedata,$filename);
	}
}

/* End of file Upload_file.php */
/* Location: ./application/controllers/admin/Upload_file.php */