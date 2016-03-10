<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Suratk Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Suratk_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('sk.sk_id', $params['id']);
        }

        if (isset($params['multiple_id'])) {
            $this->db->where_in('sk.sk_id', $params['multiple_id']);
        }

        if(isset($params['employe_nik']))
        {
            $this->db->where('employe.sk_employe_nik', $params['employe_nik']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('sk_date', $params['date_start']);
            $this->db->or_where('sk_date', $params['date_end']);
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
            $this->db->order_by('sk_last_update', 'desc');
        }

        $this->db->select('sk.sk_id, sk_number, sk_description, sk_date, sk_employe_name,            
            sk.user_user_id,   user_name, user_full_name, sk_employe_nik, sk_employe_position, sk_employe_date_register,
            sk_input_date, sk_last_update');
        $this->db->join('employe', 'employe.employe_nik = sk_employe_nik', 'left'); 
        $this->db->join('user', 'user.user_id = sk.user_user_id', 'left');       
        $res = $this->db->get('sk');

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
        
         if(isset($data['sk_id'])) {
            $this->db->set('sk_id', $data['sk_id']);
        }
        
         if(isset($data['sk_number'])) {
            $this->db->set('sk_number', $data['sk_number']);
        }
        
         if(isset($data['sk_description'])) {
            $this->db->set('sk_description', $data['sk_description']);
        }
        
         if(isset($data['sk_date'])) {
            $this->db->set('sk_date', $data['sk_date']);
        }        
           
         if(isset($data['sk_employe_nik'])) {
            $this->db->set('sk_employe_nik', $data['sk_employe_nik']);
        }

        if(isset($data['sk_employe_name'])) {
            $this->db->set('sk_employe_name', $data['sk_employe_name']);
        }

        if(isset($data['sk_employe_position'])) {
            $this->db->set('sk_employe_position', $data['sk_employe_position']);
        }

        if(isset($data['sk_employe_date_register'])) {
            $this->db->set('sk_employe_date_register', $data['sk_employe_date_register']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
         if(isset($data['sk_input_date'])) {
            $this->db->set('sk_input_date', $data['sk_input_date']);
        }
        
         if(isset($data['sk_last_update'])) {
            $this->db->set('sk_last_update', $data['sk_last_update']);
        }   
        
        if (isset($data['sk_id'])) {
            $this->db->where('sk_id', $data['sk_id']);
            $this->db->update('sk');
            $id = $data['sk_id'];
        } else {
            $this->db->insert('sk');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('sk_id', $id);
        $this->db->delete('sk');
    }
    
}
