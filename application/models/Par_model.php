<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Suratk Model Class
 *
 * @package     HRA CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Par_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('par.par_id', $params['id']);
        }

        if (isset($params['multiple_id'])) {
            $this->db->where_in('par.par_id', $params['multiple_id']);
        }

        if(isset($params['employe_nik']))
        {
            $this->db->where('employe.par_employe_nik', $params['employe_nik']);
        }

        if(isset($params['par_employe_name']))
        {
            $this->db->where('employe.par_employe_name', $params['employe_name']);
        }

        if(isset($params['employe_position']))
        {
            $this->db->where('employe.par_employe_position', $params['employe_position']);
        }
        if(isset($params['employe_unit']))
        {
            $this->db->where('employe.par_employe_unit', $params['employe_unit']);
        }
        if(isset($params['employe_bussiness']))
        {
            $this->db->where('employe.par_employe_bussiness', $params['employe_bussiness']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('par_published_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('par_published_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('par_id', 'desc');
        }

        $this->db->select('par.par_id, par_number, cost_cost_id, cost_code, cost_name, par_employe_unit,  par_employe_name,            
            par.user_user_id, user_name, user_full_name, par_employe_nik, par_employe_position,
            par_employe_bussiness, par_employe_account, par_paid, par_employe_departement,
            par_input_date, par_last_update');
        $this->db->join('employe', 'employe.employe_nik = par_employe_nik', 'left'); 
        $this->db->join('cost', 'cost.cost_id = par.cost_cost_id', 'left');
        $this->db->join('user', 'user.user_id = par.user_user_id', 'left');       
        $res = $this->db->get('par');

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

       if(isset($data['par_id'])) {
        $this->db->set('par_id', $data['par_id']);
    }

    if(isset($data['par_number'])) {
        $this->db->set('par_number', $data['par_number']);
    }

    if(isset($data['cost_id'])) {
        $this->db->set('cost_cost_id', $data['cost_id']);
    }

    if(isset($data['par_employe_nik'])) {
        $this->db->set('par_employe_nik', $data['par_employe_nik']);
    }

    if(isset($data['par_employe_name'])) {
        $this->db->set('par_employe_name', $data['par_employe_name']);
    }

    if(isset($data['par_employe_position'])) {
        $this->db->set('par_employe_position', $data['par_employe_position']);
    }

    if(isset($data['par_employe_unit'])) {
        $this->db->set('par_employe_unit', $data['par_employe_unit']);
    }

    if(isset($data['par_employe_bussiness'])) {
        $this->db->set('par_employe_bussiness', $data['par_employe_bussiness']);
    }

    if(isset($data['par_employe_departement'])) {
        $this->db->set('par_employe_departement', $data['par_employe_departement']);
    }

    if(isset($data['par_employe_account'])) {
        $this->db->set('par_employe_account', $data['par_employe_account']);
    }

    if(isset($data['par_paid'])) {
        $this->db->set('par_paid', $data['par_paid']);
    }

    if(isset($data['user_id'])) {
        $this->db->set('user_user_id', $data['user_id']);
    }

    if(isset($data['par_input_date'])) {
        $this->db->set('par_input_date', $data['par_input_date']);
    }

    if(isset($data['par_last_update'])) {
        $this->db->set('par_last_update', $data['par_last_update']);
    }   

    if (isset($data['par_id'])) {
        $this->db->where('par_id', $data['par_id']);
        $this->db->update('par');
        $id = $data['par_id'];
    } else {
        $this->db->insert('par');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('par_id', $id);
    $this->db->delete('par');
}

}
