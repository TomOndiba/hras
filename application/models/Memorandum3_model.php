<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Memorandum2 Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Memorandum3_model extends CI_Model { 

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('Memorandum3.memorandum_id', $params['id']);
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
            $this->db->order_by('memorandum_last_update', 'desc');
        }

        $this->db->select('Memorandum3.memorandum_id, memorandum3.memorandum_number, memorandum3.memorandum_date_sent,
            memorandum3.memorandum_call_date, memorandum1_memorandum_id, Memorandum3.user_user_id,
            memorandum2.memorandum_number AS memorandum2_number,
            employe_name, employe_nik,
            user_name, user_full_name,
            memorandum3.memorandum_input_date, memorandum3.memorandum_last_update');
        $this->db->join('memorandum2', 'memorandum2.memorandum_id = memorandum2_memorandum_id', 'left');
        $this->db->join('memorandum1', 'memorandum1.memorandum_id = memorandum2.memorandum1_memorandum_id', 'left');
        $this->db->join('employe', 'employe.employe_id = memorandum1.employe_employe_id', 'left');
        $this->db->join('user', 'user.user_id = Memorandum3.user_user_id', 'left');
        $res = $this->db->get('Memorandum3'); 

        if(isset($params['id']))
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
        
         if(isset($data['memorandum_id'])) {
            $this->db->set('memorandum_id', $data['memorandum_id']);
        }
        
         if(isset($data['memorandum_number'])) {
            $this->db->set('memorandum_number', $data['memorandum_number']);
        }
        
         if(isset($data['memorandum_date_sent'])) {
            $this->db->set('memorandum_date_sent', $data['memorandum_date_sent']);
        }
        
         if(isset($data['memorandum_call_date'])) {
            $this->db->set('memorandum_call_date', $data['memorandum_call_date']);
        }
        
         if(isset($data['memorandum2_id'])) {
            $this->db->set('memorandum2_memorandum_id', $data['memorandum2_id']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
         if(isset($data['memorandum_input_date'])) {
            $this->db->set('memorandum_input_date', $data['memorandum_input_date']);
        }
        
         if(isset($data['memorandum_last_update'])) {
            $this->db->set('memorandum_last_update', $data['memorandum_last_update']);
        }   
        
        if (isset($data['memorandum_id'])) {
            $this->db->where('memorandum_id', $data['memorandum_id']);
            $this->db->update('Memorandum3');
            $id = $data['memorandum_id'];
        } else {
            $this->db->insert('Memorandum3');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('memorandum_id', $id);
        $this->db->delete('Memorandum3');
    }
    
}
