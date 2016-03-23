<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Bank Model Class
 *
 * @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */

class Bank_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('bank.bank_id', $params['id']);
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
            $this->db->order_by($params['order_by'], 'asc');
        }        

        $this->db->select('bank.bank_id, bank_name,');               
        $res = $this->db->get('bank');

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
        
         if(isset($data['bank_id'])) {
            $this->db->set('bank_id', $data['bank_id']);
        }
        
         if(isset($data['bank_name'])) {
            $this->db->set('bank_name', $data['bank_name']);
        }    
                   
         if (isset($data['bank_id'])) {
            $this->db->where('bank_id', $data['bank_id']);
            $this->db->update('bank');
            $id = $data['bank_id'];
        } else {
            $this->db->insert('bank');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('bank_id', $id);
        $this->db->delete('bank');
    }
    
}
