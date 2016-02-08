<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* STL Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models 
 */

class Stl_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('stl.stl_id', $params['id']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('stl_date', $params['date_start']);
            $this->db->or_where('stl_date', $params['date_end']);
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
            $this->db->order_by('stl_last_update', 'desc');
        }

        $this->db->select('stl.stl_id, stl_number, stl_date, stl_batch, stl_ipk, stl_desc, employe_employe_id,  employe_name,            
            stl.user_user_id,   user_name, user_full_name, employe_nik, employe_position, 
            stl_input_date, stl_last_update');
        $this->db->join('employe', 'employe.employe_id = employe_employe_id', 'left'); 
        $this->db->join('user', 'user.user_id = stl.user_user_id', 'left');       
        $res = $this->db->get('stl');

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
        
         if(isset($data['stl_id'])) {
            $this->db->set('stl_id', $data['stl_id']);
        }
        
         if(isset($data['stl_number'])) {
            $this->db->set('stl_number', $data['stl_number']);
        }
        
         if(isset($data['stl_date'])) {
            $this->db->set('stl_date', $data['stl_date']);
        }
        
         if(isset($data['stl_batch'])) {
            $this->db->set('stl_batch', $data['stl_batch']);
        }  

        if(isset($data['stl_ipk'])) {
            $this->db->set('stl_ipk', $data['stl_ipk']);
        }         

        if(isset($data['stl_desc'])) {
            $this->db->set('stl_desc', $data['stl_desc']);
        }   
           
         if(isset($data['employe_id'])) {
            $this->db->set('employe_employe_id', $data['employe_id']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
         if(isset($data['stl_input_date'])) {
            $this->db->set('stl_input_date', $data['stl_input_date']);
        }
        
         if(isset($data['stl_last_update'])) {
            $this->db->set('stl_last_update', $data['stl_last_update']);
        }   
        
        if (isset($data['stl_id'])) {
            $this->db->where('stl_id', $data['stl_id']);
            $this->db->update('stl');
            $id = $data['stl_id'];
        } else {
            $this->db->insert('stl');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('stl_id', $id);
        $this->db->delete('stl');
    }
    
}
