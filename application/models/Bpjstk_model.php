<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* bpjstk Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Bpjstk_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('bpjstk.bpjstk_id', $params['id']);
        }
        
        if (isset($params['multiple_id'])) {
            $this->db->where_in('bpjstk.bpjstk_id', $params['multiple_id']);
        }
        
        if(isset($params['bpjstk_cetak']))
        {
            $this->db->where('bpjstk.bpjstk_cetak', $params['bpjstk_cetak']);
        }

        if(isset($params['bpjstk_name']))
        {
            $this->db->where('bpjstk.bpjstk_name', $params['bpjstk_name']);
        }
                               
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('bpjstk_published_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('bpjstk_published_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('bpjstk_id', 'desc');
        }

        $this->db->select('bpjstk.bpjstk_id, bpjstk_name, bpjstk_card, bpjstk_npp, bpjstk_entry_date,
            bpjstk_desc, bpjstk_date');        
        $res = $this->db->get('bpjstk');

        if (isset($params['id']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['date']) AND isset($params['bpjstk_npp']))) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {
        
         if(isset($data['bpjstk_id'])) {
            $this->db->set('bpjstk_id', $data['bpjstk_id']);
        }
        
         if(isset($data['bpjstk_name'])) {
            $this->db->set('bpjstk_name', $data['bpjstk_name']);
        }
        
         if(isset($data['bpjstk_card'])) {
            $this->db->set('bpjstk_card', $data['bpjstk_card']);
        }
        
         if(isset($data['bpjstk_npp'])) {
            $this->db->set('bpjstk_npp', $data['bpjstk_npp']);
        }
        
         if(isset($data['bpjstk_entry_date'])) {
            $this->db->set('bpjstk_entry_date', $data['bpjstk_entry_date']);
        }
        
         if(isset($data['bpjstk_desc'])) {
            $this->db->set('bpjstk_desc', $data['bpjstk_desc']);
        }
        
         if(isset($data['bpjstk_date'])) {
            $this->db->set('bpjstk_date', $data['bpjstk_date']);
        }        

        if (isset($data['bpjstk_id'])) {
            $this->db->where('bpjstk_id', $data['bpjstk_id']);
            $this->db->update('bpjstk');
            $id = $data['bpjstk_id'];
        } else {
            $this->db->insert('bpjstk');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('bpjstk_id', $id);
        $this->db->delete('bpjstk');
    }     

    // Delete all to database
    function delete_all() {
        $this->db->empty_table('bpjstk');
    }
 
}
