<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Suratk Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Contract_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('contract.contract_id', $params['id']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('contract_date', $params['date_start']);
            $this->db->or_where('contract_date', $params['date_end']);
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
            $this->db->order_by('contract_last_update', 'desc');
        }

        $this->db->select('contract.contract_id, contract_number, contract_ke, contract_date, employe_employe_id,  employe_name,            
            contract.user_user_id,   user_name, user_full_name, employe_nik, employe_position, employe_date_register,
            contract_input_date, contract_last_update');
        $this->db->join('employe', 'employe.employe_id = employe_employe_id', 'left'); 
        $this->db->join('user', 'user.user_id = contract.user_user_id', 'left');       
        $res = $this->db->get('contract');

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
        
         if(isset($data['contract_id'])) {
            $this->db->set('contract_id', $data['contract_id']);
        }
        
         if(isset($data['contract_number'])) {
            $this->db->set('contract_number', $data['contract_number']);
        }
        
         if(isset($data['contract_ke'])) {
            $this->db->set('contract_ke', $data['contract_ke']);
        }
        
         if(isset($data['contract_date'])) {
            $this->db->set('contract_date', $data['contract_date']);
        }        
           
         if(isset($data['employe_id'])) {
            $this->db->set('employe_employe_id', $data['employe_id']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
         if(isset($data['contract_input_date'])) {
            $this->db->set('contract_input_date', $data['contract_input_date']);
        }
        
         if(isset($data['contract_last_update'])) {
            $this->db->set('contract_last_update', $data['contract_last_update']);
        }   
        
        if (isset($data['contract_id'])) {
            $this->db->where('contract_id', $data['contract_id']);
            $this->db->update('contract');
            $id = $data['contract_id'];
        } else {
            $this->db->insert('contract');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('contract_id', $id);
        $this->db->delete('contract');
    }
    
}
