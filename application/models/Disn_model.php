<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* disn Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Disn_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('disn.disn_id', $params['id']);
        }
        
        if (isset($params['multiple_id'])) {
            $this->db->where_in('disn.disn_id', $params['multiple_id']);
        }
        
        if(isset($params['disn_nik']))
        {
            $this->db->where('disn.disn_nik', $params['disn_nik']);
        }

        if(isset($params['disn_name']))
        {
            $this->db->where('disn.disn_name', $params['disn_name']);
        }
                               
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('disn_published_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('disn_published_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('disn_id', 'desc');
        }

        $this->db->select('disn.disn_id, disn_number, disn_name, disn_nik, disn_position, disn_entry_date,
            disn_end_date');        
        $res = $this->db->get('disn');

        if (isset($params['id']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['date']) AND isset($params['disn_npp']))) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {
        
         if(isset($data['disn_id'])) {
            $this->db->set('disn_id', $data['disn_id']);
        }
        
        if(isset($data['disn_number'])) {
            $this->db->set('disn_number', $data['disn_number']);
        }

         if(isset($data['disn_name'])) {
            $this->db->set('disn_name', $data['disn_name']);
        }
        
         if(isset($data['disn_nik'])) {
            $this->db->set('disn_nik', $data['disn_nik']);
        }
        
         if(isset($data['disn_position'])) {
            $this->db->set('disn_position', $data['disn_position']);
        }

         if(isset($data['disn_entry_date'])) {
            $this->db->set('disn_entry_date', $data['disn_entry_date']);
        }
        
         if(isset($data['disn_end_date'])) {
            $this->db->set('disn_end_date', $data['disn_end_date']);
        }
        
        if (isset($data['disn_id'])) {
            $this->db->where('disn_id', $data['disn_id']);
            $this->db->update('disn');
            $id = $data['disn_id'];
        } else {
            $this->db->insert('disn');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('disn_id', $id);
        $this->db->delete('disn');
    }     

    // Delete all to database
    function delete_all() {
        $this->db->empty_table('disn');
    }
 
public function is_exist($field, $value, $table, $pk = '', $id = '')
    {
        $this->db->where($field, $value);        

        if ($id != '')
        {
            $this->db->where($pk . ' != ', $id);
        }

        return $this->db->count_all_results($table) > 0 ? TRUE : FALSE;
    }


    public function import_disn($data_excel) {
        $count = 0;

        for ($i = 1; $i < count($data_excel); $i++) {
            if ( ! $this->is_exist('disn_nik', $data_excel[$i]['disn_nik'], 'disn'))
            {
            $data = array(
                'disn_number' => $data_excel[$i]['disn_number'],
                'disn_nik' => $data_excel[$i]['disn_nik'],
                'disn_name' => $data_excel[$i]['disn_name'],
                'disn_position' => $data_excel[$i]['disn_position'],
                'disn_entry_date' => $data_excel[$i]['disn_entry_date'],
                'disn_end_date' => $data_excel[$i]['disn_end_date'],
            );

            $this->db->insert('disn', $data);

            $count++;
        }
    }

        return $count > 0 ? TRUE : FALSE;
    }       
 
}
