<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * user Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Andi Dwi Saputro 
 */
class Upload_file_model extends CI_Model {
	
	function __construct() {
		parrent::__construct();
	}

	/**-------------------------------------------------------------------------
	* because i didn't modify your database.
	* so on your datatable "employe" you must add new coloumn called:
	* "employe_file" with LONGBLOB type. and "employe_filename" with varchar(255)
	*---------------------------------------------------------------------------
	*/

	function upload($filedata, $filename) {
		$query = $this->db->query("INSERT INTO employe (employe_file,employe_filename) VALUES ('$filedata','$filename')");
		return $query;
	}

	 /* function tampil_upload($k){
 		 $query = $this->db->query("SELECT * FROM employe where employe_id='$k'");
 		 foreach($query->result_array() as $ok){
  		 //header('Content-type: image');
    	$file = $ok['file']; 
  	}
  	*/	
 }

}

/* End of file upload_file_model.php */
/* Location: ./application/model/Upload_file_model.php */

