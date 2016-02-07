<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Spb Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Spb_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('spb.spb_id', $params['id']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('spb_date', $params['date_start']);
            $this->db->or_where('spb_date', $params['date_end']);
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
            $this->db->order_by('spb_last_update', 'desc');
        }

        $this->db->select('spb.spb_id, spb_number, spb_date, bank_bank_id, bank_name,  spb_name1, spb_name2, 
            spb_name3, spb_name4, spb_name5, spb_name6, spb_name7, spb_name8, spb_name9, spb_name10, 
            spb_nik1, spb_nik2, spb_nik3, spb_nik4, spb_nik5, spb_nik6, spb_nik7, spb_nik8, spb_nik9, spb_nik10,            
            spb.user_user_id, user_full_name, spb_input_date, spb_last_update');
        $this->db->join('bank', 'bank.bank_id = spb.bank_bank_id', 'left');
        $this->db->join('user', 'user.user_id = spb.user_user_id', 'left');       
        $res = $this->db->get('spb');

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
        
       if(isset($data['spb_id'])) {
        $this->db->set('spb_id', $data['spb_id']);
    }
    
    if(isset($data['spb_number'])) {
        $this->db->set('spb_number', $data['spb_number']);
    }

    if(isset($data['spb_date'])) {
        $this->db->set('spb_date', $data['spb_date']);
    }
    
    if(isset($data['spb_name1'])) {
        $this->db->set('spb_name1', $data['spb_name1']);
    }
    
    if(isset($data['spb_name2'])) {
        $this->db->set('spb_name2', $data['spb_name2']);
    }        
    
    if(isset($data['spb_name3'])) {
        $this->db->set('spb_name3', $data['spb_name3']);
    }
    
    if(isset($data['spb_name4'])) {
        $this->db->set('spb_name4', $data['spb_name4']);
    }
    
    if(isset($data['spb_name5'])) {
        $this->db->set('spb_name5', $data['spb_name5']);
    }
    
    if(isset($data['spb_name6'])) {
        $this->db->set('spb_name6', $data['spb_name6']);
    }   

    if(isset($data['spb_name7'])) {
        $this->db->set('spb_name7', $data['spb_name7']);
    }   

    if(isset($data['spb_name8'])) {
        $this->db->set('spb_name8', $data['spb_name8']);
    }   

    if(isset($data['spb_name9'])) {
        $this->db->set('spb_name9', $data['spb_name9']);
    }   

    if(isset($data['spb_name10'])) {
        $this->db->set('spb_name10', $data['spb_name10']);
    }   

    if(isset($data['spb_nik1'])) {
        $this->db->set('spb_nik1', $data['spb_nik1']);
    }   
    
    if(isset($data['spb_nik2'])) {
        $this->db->set('spb_nik2', $data['spb_nik2']);
    }   

    if(isset($data['spb_nik3'])) {
        $this->db->set('spb_nik3', $data['spb_nik3']);
    }   

    if(isset($data['spb_nik4'])) {
        $this->db->set('spb_nik4', $data['spb_nik4']);
    }   

    if(isset($data['spb_nik5'])) {
        $this->db->set('spb_nik5', $data['spb_nik5']);
    }   

    if(isset($data['spb_nik6'])) {
        $this->db->set('spb_nik6', $data['spb_nik6']);
    }   

    if(isset($data['spb_nik7'])) {
        $this->db->set('spb_nik7', $data['spb_nik7']);
    }   

    if(isset($data['spb_nik8'])) {
        $this->db->set('spb_nik8', $data['spb_nik8']);
    }   

    if(isset($data['spb_nik9'])) {
        $this->db->set('spb_nik9', $data['spb_nik9']);
    }   

    if(isset($data['spb_nik10'])) {
        $this->db->set('spb_nik10', $data['spb_nik10']);
    }   

    if(isset($data['bank_id'])) {
        $this->db->set('bank_bank_id', $data['bank_id']);
    }   

    if(isset($data['user_id'])) {
        $this->db->set('user_user_id', $data['user_id']);
    }   

    if(isset($data['spb_input_date'])) {
        $this->db->set('spb_input_date', $data['spb_input_date']);
    }   

    if(isset($data['spb_last_update'])) {
        $this->db->set('spb_last_update', $data['spb_last_update']);
    }   

    if (isset($data['spb_id'])) {
        $this->db->where('spb_id', $data['spb_id']);
        $this->db->update('spb');
        $id = $data['spb_id'];
    } else {
        $this->db->insert('spb');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('spb_id', $id);
    $this->db->delete('spb');
}

}
