<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Suratk Model Class
 *
 * @package     SGCMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Procuration_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('procuration.procuration_id', $params['id']);
        }

        if(isset($params['employe_nik']))
        {
            $this->db->where('employe.procuration_employe_nik', $params['employe_nik']);
        }

        if(isset($params['procuration_employe_name']))
        {
            $this->db->where('employe.procuration_employe_name', $params['employe_name']);
        }

        if(isset($params['employe_position']))
        {
            $this->db->where('employe.procuration_employe_position', $params['employe_position']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('procuration_date', $params['date_start']);
            $this->db->or_where('procuration_date', $params['date_end']);
        }

        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('procuration_last_update', 'desc');
        }

        $this->db->select('procuration.procuration_id, procuration_number, procuration_desc, procuration_date, procuration_employe_name,            
            procuration.user_user_id,   user_name, user_full_name, procuration_employe_nik, procuration_employe_position, 
            procuration_input_date, procuration_last_update');
        $this->db->join('employe', 'employe.employe_nik = procuration_employe_nik', 'left'); 
        $this->db->join('user', 'user.user_id = procuration.user_user_id', 'left');       
        $res = $this->db->get('procuration');

        if(isset($params['id']) OR (isset($params['limit']) AND $params['limit']==1))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {

       if(isset($data['procuration_id'])) {
        $this->db->set('procuration_id', $data['procuration_id']);
    }

    if(isset($data['procuration_number'])) {
        $this->db->set('procuration_number', $data['procuration_number']);
    }

    if(isset($data['procuration_desc'])) {
        $this->db->set('procuration_desc', $data['procuration_desc']);
    }  

    if(isset($data['procuration_date'])) {
        $this->db->set('procuration_date', $data['procuration_date']);
    } 

    if(isset($data['procuration_employe_nik'])) {
        $this->db->set('procuration_employe_nik', $data['procuration_employe_nik']);
    }

    if(isset($data['procuration_employe_name'])) {
        $this->db->set('procuration_employe_name', $data['procuration_employe_name']);
    }

    if(isset($data['procuration_employe_position'])) {
        $this->db->set('procuration_employe_position', $data['procuration_employe_position']);
    }

    if(isset($data['user_id'])) {
        $this->db->set('user_user_id', $data['user_id']);
    }

    if(isset($data['procuration_input_date'])) {
        $this->db->set('procuration_input_date', $data['procuration_input_date']);
    }

    if(isset($data['procuration_last_update'])) {
        $this->db->set('procuration_last_update', $data['procuration_last_update']);
    }   

    if (isset($data['procuration_id'])) {
        $this->db->where('procuration_id', $data['procuration_id']);
        $this->db->update('procuration');
        $id = $data['procuration_id'];
    } else {
        $this->db->insert('procuration');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('procuration_id', $id);
    $this->db->delete('procuration');
}

}
