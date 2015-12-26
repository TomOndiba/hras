<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Employe Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Employe_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('employe.employe_id', $params['id']);
        }
        
        if(isset($params['nik']))
        {
            $this->db->where('employe.employe_nik', $params['employe_nik']);
        }
        
        if(isset($params['status']))
        {
            $this->db->where('employe_is_active', $params['status']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('employe_published_date', $params['date_start']);
            $this->db->or_where('employe_published_date', $params['date_end']);
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
            $this->db->order_by('employe_last_update', 'desc');
        }

        $this->db->select('employe.employe_id, employe_nik, employe_name, employe_phone, employe_address,
            employe_divisi, employe_position, employe_departement, employe_date_register, employe_is_active,
            user_name,
            employe_input_date, employe_last_update');
        $this->db->join('user', 'user.user_id = employe.user_user_id', 'left');
        $res = $this->db->get('employe');

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
        
         if(isset($data['employe_id'])) {
            $this->db->set('employe_id', $data['employe_id']);
        }
        
         if(isset($data['employe_nik'])) {
            $this->db->set('employe_nik', $data['employe_nik']);
        }
        
         if(isset($data['employe_name'])) {
            $this->db->set('employe_name', $data['employe_name']);
        }
        
         if(isset($data['employe_phone'])) {
            $this->db->set('employe_phone', $data['employe_phone']);
        }
        
         if(isset($data['employe_address'])) {
            $this->db->set('employe_address', $data['employe_address']);
        }
        
         if(isset($data['employe_divisi'])) {
            $this->db->set('employe_divisi', $data['employe_divisi']);
        }
        
         if(isset($data['employe_position'])) {
            $this->db->set('employe_position', $data['employe_position']);
        }
        
         if(isset($data['employe_departement'])) {
            $this->db->set('employe_departement', $data['employe_departement']);
        }
        
         if(isset($data['employe_is_active'])) {
            $this->db->set('employe_is_active', $data['employe_is_active']);
        }
        
         if(isset($data['employe_date_register'])) {
            $this->db->set('employe_date_register', $data['employe_date_register']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
         if(isset($data['employe_input_date'])) {
            $this->db->set('employe_input_date', $data['employe_input_date']);
        }
        
         if(isset($data['employe_last_update'])) {
            $this->db->set('employe_last_update', $data['employe_last_update']);
        }
        
        if (isset($data['employe_id'])) {
            $this->db->where('employe_id', $data['employe_id']);
            $this->db->update('employe');
            $id = $data['employe_id'];
        } else {
            $this->db->insert('employe');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('employe_id', $id);
        $this->db->delete('employe');
    }
    
}
