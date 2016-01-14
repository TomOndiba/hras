<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Memorandum1 Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Memorandum1_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) 
    {
        if(isset($params['id']))
        {
            $this->db->where('memorandum1.memorandum_id', $params['id']);
        }
        
        if(isset($params['present']))
        {
            $this->db->where('memorandum1.memorandum_is_present', $params['present']);
        }

        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('memorandum_email_date', $params['date_start']);
            $this->db->or_where('memorandum_email_date', $params['date_end']);
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

        $this->db->select('memorandum1.memorandum_id, memorandum_number, memorandum_email_date, memorandum_finished_desc,
            memorandum_absent_date, memorandum_date_sent, memorandum_call_date, memorandum_is_present, employe_employe_id, memorandum1.user_user_id,
            employe_name, employe_nik, employe_position, employe_address,
            user_name, user_full_name,
            memorandum_input_date, memorandum_last_update');
        $this->db->join('employe', 'employe.employe_id = employe_employe_id', 'left');
        $this->db->join('user', 'user.user_id = memorandum1.user_user_id', 'left');
        $res = $this->db->get('memorandum1');

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
        
         if(isset($data['memorandum_id'])) {
            $this->db->set('memorandum_id', $data['memorandum_id']);
        }
        
         if(isset($data['memorandum_number'])) {
            $this->db->set('memorandum_number', $data['memorandum_number']);
        }
        
         if(isset($data['memorandum_email_date'])) {
            $this->db->set('memorandum_email_date', $data['memorandum_email_date']);
        }
        
         if(isset($data['memorandum_absent_date'])) {
            $this->db->set('memorandum_absent_date', $data['memorandum_absent_date']);
        }
        
         if(isset($data['memorandum_date_sent'])) {
            $this->db->set('memorandum_date_sent', $data['memorandum_date_sent']);
        }
        
         if(isset($data['memorandum_call_date'])) {
            $this->db->set('memorandum_call_date', $data['memorandum_call_date']);
        }
        
         if(isset($data['employe_id'])) {
            $this->db->set('employe_employe_id', $data['employe_id']);
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

        if(isset($data['memorandum_is_present'])) {
            $this->db->set('memorandum_is_present', $data['memorandum_is_present']);
        }    

        if(isset($data['memorandum_finished_desc'])) {
            $this->db->set('memorandum_finished_desc', $data['memorandum_finished_desc']);
        }    
        
        if (isset($data['memorandum_id'])) {
            $this->db->where('memorandum_id', $data['memorandum_id']);
            $this->db->update('memorandum1');
            $id = $data['memorandum_id'];
        } else {
            $this->db->insert('memorandum1');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('memorandum_id', $id);
        $this->db->delete('memorandum1');
    }
    
}
