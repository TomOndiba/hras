<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* set Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Set_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('set.set_id', $params['id']);
        }
                       
        if(isset($params['set_branch']))
        {
            $this->db->where('set.set_branch', $params['set_branch']);
        }

        if(isset($params['set_address']))
        {
            $this->db->where('set.set_address', $params['set_address']);
        }
        
        if (isset($params['set_employe_nik'])) {
            $this->db->where('set.set_employe_nik', $params['set_employe_nik']);
        }

        if (isset($params['employe_nik'])) {
            $this->db->where('employe.set_employe_nik', $params['employe_nik']);
        }

        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('set_published_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('set_published_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('set_id', 'desc');
        }

        $this->db->select('set.set_id, set_branch, set_city, set_address, set_pic, set_employe_nik,
            set_employe_name, set_employe_position, set_initial');   

        $this->db->join('employe', 'employe.employe_nik = set_employe_nik', 'left');     
        $res = $this->db->get('set');



        if (isset($params['id']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['date']) AND isset($params['set_id']))) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {
        
         if(isset($data['set_id'])) {
            $this->db->set('set_id', $data['set_id']);
        }
        
         if(isset($data['set_branch'])) {
            $this->db->set('set_branch', $data['set_branch']);
        }
        
         if(isset($data['set_city'])) {
            $this->db->set('set_city', $data['set_city']);
        }
        
         if(isset($data['set_address'])) {
            $this->db->set('set_address', $data['set_address']);
        }
        
         if(isset($data['set_pic'])) {
            $this->db->set('set_pic', $data['set_pic']);
        }
        
         if(isset($data['set_employe_nik'])) {
            $this->db->set('set_employe_nik', $data['set_employe_nik']);
        }
        
         if(isset($data['set_employe_name'])) {
            $this->db->set('set_employe_name', $data['set_employe_name']);
        }
        
         if(isset($data['set_employe_position'])) {
            $this->db->set('set_employe_position', $data['set_employe_position']);
        }
                         
         if(isset($data['set_initial'])) {
            $this->db->set('set_initial', $data['set_initial']);
        }
          
        
        if (isset($data['set_id'])) {
            $this->db->where('set_id', $data['set_id']);
            $this->db->update('set');
            $id = $data['set_id'];
        } else {
            $this->db->insert('set');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('set_id', $id);
        $this->db->delete('set');
    }            
 
}
