<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* BPJS Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Bpjs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('bpjs.bpjs_id', $params['id']);
        }
        
        if (isset($params['multiple_id'])) {
            $this->db->where_in('bpjs.bpjs_id', $params['multiple_id']);
        }
        
        if(isset($params['bpjs_cetak']))
        {
            $this->db->where('bpjs.bpjs_cetak', $params['bpjs_cetak']);
        }

        if(isset($params['bpjs_noka']))
        {
            $this->db->where('bpjs.bpjs_noka', $params['bpjs_noka']);
        }

        if(isset($params['bpjs_npp']))
        {
            $this->db->where('bpjs.bpjs_npp', $params['bpjs_npp']);
        }

        if(isset($params['bpjs_ktp']))
        {
            $this->db->where('bpjs.bpjs_ktp', $params['bpjs_ktp']);
        }
                        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('bpjs_published_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('bpjs_published_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('bpjs_cetak', 'desc');
        }

        $this->db->select('bpjs.bpjs_id, bpjs_noka, bpjs_ktp, bpjs_npp, bpjs_name, bpjs_cetak,
            bpjs_hub, bpjs_date, bpjs_tmt, bpjs_faskes, bpjs_kelas');        
        $res = $this->db->get('bpjs');

        if (isset($params['id']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['date']) AND isset($params['bpjs_npp']))) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {
        
         if(isset($data['bpjs_id'])) {
            $this->db->set('bpjs_id', $data['bpjs_id']);
        }
        
         if(isset($data['bpjs_noka'])) {
            $this->db->set('bpjs_noka', $data['bpjs_noka']);
        }
        
         if(isset($data['bpjs_ktp'])) {
            $this->db->set('bpjs_ktp', $data['bpjs_ktp']);
        }
        
         if(isset($data['bpjs_npp'])) {
            $this->db->set('bpjs_npp', $data['bpjs_npp']);
        }
        
         if(isset($data['bpjs_name'])) {
            $this->db->set('bpjs_name', $data['bpjs_name']);
        }
        
         if(isset($data['bpjs_hub'])) {
            $this->db->set('bpjs_hub', $data['bpjs_hub']);
        }
        
         if(isset($data['bpjs_date'])) {
            $this->db->set('bpjs_date', $data['bpjs_date']);
        }
        
         if(isset($data['bpjs_tmt'])) {
            $this->db->set('bpjs_tmt', $data['bpjs_tmt']);
        }
                         
         if(isset($data['bpjs_faskes'])) {
            $this->db->set('bpjs_faskes', $data['bpjs_faskes']);
        }
          
        if(isset($data['bpjs_kelas'])) {
            $this->db->set('bpjs_kelas', $data['bpjs_kelas']);
        }

        if(isset($data['bpjs_cetak'])) {
            $this->db->set('bpjs_cetak', $data['bpjs_cetak']);
        }

        if (isset($data['bpjs_id'])) {
            $this->db->where('bpjs_id', $data['bpjs_id']);
            $this->db->update('bpjs');
            $id = $data['bpjs_id'];
        } else {
            $this->db->insert('bpjs');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('bpjs_id', $id);
        $this->db->delete('bpjs');
    }     

    // Delete all to database
    function delete_all() {
        $this->db->truncate('bpjs');
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


    public function import_bpjs($data_excel) {
        $count = 0;

        for ($i = 1; $i < count($data_excel); $i++) {
            if ( ! $this->is_exist('bpjs_noka', $data_excel[$i]['bpjs_noka'], 'bpjs'))
            {
            $data = array(
                'bpjs_noka' => $data_excel[$i]['bpjs_noka'],
                'bpjs_ktp' => $data_excel[$i]['bpjs_ktp'],
                'bpjs_npp' => $data_excel[$i]['bpjs_npp'],
                'bpjs_name' => $data_excel[$i]['bpjs_name'],
                'bpjs_hub' => $data_excel[$i]['bpjs_hub'],
                'bpjs_date' => $data_excel[$i]['bpjs_date'],
                'bpjs_tmt' => $data_excel[$i]['bpjs_tmt'],
                'bpjs_faskes' => $data_excel[$i]['bpjs_faskes'],
                'bpjs_kelas' => $data_excel[$i]['bpjs_kelas'],
            );

            $this->db->insert('bpjs', $data);

            $count++;
        }
    }

        return $count > 0 ? TRUE : FALSE;
    }       
 
}
