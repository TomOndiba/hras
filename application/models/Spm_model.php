<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Suratk Model Class
 *
 * @package     SGCMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Spm_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('spm.spm_id', $params['id']);
        }

        if(isset($params['employe_nik']))
        {
            $this->db->where('employe.spm_employe_nik', $params['employe_nik']);
        }

        if(isset($params['spm_employe_name']))
        {
            $this->db->where('employe.spm_employe_name', $params['employe_name']);
        }

        if(isset($params['employe_position']))
        {
            $this->db->where('employe.spm_employe_position', $params['employe_position']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('spm_date', $params['date_start']);
            $this->db->or_where('spm_date', $params['date_end']);
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
            $this->db->order_by('spm_last_update', 'desc');
        }

        $this->db->select('spm.spm_id, spm_number, spm_date,  spm_employe_name,            
            spm.user_user_id,   user_name, user_full_name, spm_employe_nik, spm_employe_position, 
            spm_branch, spm_input_date, spm_last_update');
        $this->db->join('employe', 'employe.employe_nik = spm_employe_nik', 'left'); 
        $this->db->join('user', 'user.user_id = spm.user_user_id', 'left');       
        $res = $this->db->get('spm');

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

       if(isset($data['spm_id'])) {
        $this->db->set('spm_id', $data['spm_id']);
    }

    if(isset($data['spm_number'])) {
        $this->db->set('spm_number', $data['spm_number']);
    }

    if(isset($data['spm_date'])) {
        $this->db->set('spm_date', $data['spm_date']);
    }  

    if(isset($data['spm_branch'])) {
        $this->db->set('spm_branch', $data['spm_branch']);
    }  

    if(isset($data['spm_employe_nik'])) {
        $this->db->set('spm_employe_nik', $data['spm_employe_nik']);
    }

    if(isset($data['spm_employe_name'])) {
        $this->db->set('spm_employe_name', $data['spm_employe_name']);
    }

    if(isset($data['spm_employe_position'])) {
        $this->db->set('spm_employe_position', $data['spm_employe_position']);
    }

    if(isset($data['user_id'])) {
        $this->db->set('user_user_id', $data['user_id']);
    }

    if(isset($data['spm_input_date'])) {
        $this->db->set('spm_input_date', $data['spm_input_date']);
    }

    if(isset($data['spm_last_update'])) {
        $this->db->set('spm_last_update', $data['spm_last_update']);
    }   

    if (isset($data['spm_id'])) {
        $this->db->where('spm_id', $data['spm_id']);
        $this->db->update('spm');
        $id = $data['spm_id'];
    } else {
        $this->db->insert('spm');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('spm_id', $id);
    $this->db->delete('spm');
}

}
