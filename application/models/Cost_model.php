<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* cost Model Class
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */

class Cost_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('cost.cost_id', $params['id']);
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

        $this->db->select('cost.cost_id, cost_code, cost_name');               
        $res = $this->db->get('cost');

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
        
         if(isset($data['cost_id'])) {
            $this->db->set('cost_id', $data['cost_id']);
        }
        
        if(isset($data['cost_code'])) {
            $this->db->set('cost_code', $data['cost_code']);
        }   

         if(isset($data['cost_name'])) {
            $this->db->set('cost_name', $data['cost_name']);
        }    
                   
         if (isset($data['cost_id'])) {
            $this->db->where('cost_id', $data['cost_id']);
            $this->db->update('cost');
            $id = $data['cost_id'];
        } else {
            $this->db->insert('cost');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('cost_id', $id);
        $this->db->delete('cost');
    }
    
}
