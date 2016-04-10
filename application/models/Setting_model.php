<?php

if (!defined('BASEPATH'))
    exit('No direct script are allowed');

class Setting_model extends CI_Model {

    public function get($param = array()) {

        if (isset($param['id'])) {
            $this->db->where('setting_id', $param['id']);
        }
        
        if (isset($param['name'])) {
            $this->db->where('setting_name', $param['name']);
        }

        if (isset($param['id']) OR isset($param['name'])) {
            return $this->db->get('setting')->row_array();
        } else {
            return $this->db->get('setting')->result_array();
        }
    }

    public function get_value($params = array()) {
        $setting = $this->get($params);

        if (!empty($setting['setting_value']))
            return $setting['setting_value'];
        else
            return '';
    }

    public function save($param = array()) {
        if (isset($param['setting_branch'])) {
            $this->db->set('setting_value', $param['setting_branch']);
            $this->db->where('setting_id', 1);
            $this->db->update('setting');
        }
        if (isset($param['setting_address'])) {
            $this->db->set('setting_value', $param['setting_address']);
            $this->db->where('setting_id', 2);
            $this->db->update('setting');
        }
        if (isset($param['setting_city'])) {
            $this->db->set('setting_value', $param['setting_city']);
            $this->db->where('setting_id', 3);
            $this->db->update('setting');
        }

        if (isset($param['setting_pic'])) {
            $this->db->set('setting_value', $param['setting_pic']);
            $this->db->where('setting_id', 4);
            $this->db->update('setting');
        }

        if (isset($param['setting_employe_nik'])) {
            $this->db->set('setting_value', $param['setting_employe_nik']);
            $this->db->where('setting_id', 5);
            $this->db->update('setting');
        }

        if (isset($param['setting_employe_name'])) {
            $this->db->set('setting_value', $param['setting_employe_name']);
            $this->db->where('setting_id', 6);
            $this->db->update('setting');
        }

        if (isset($param['setting_employe_position'])) {
            $this->db->set('setting_value', $param['setting_employe_position']);
            $this->db->where('setting_id', 7);
            $this->db->update('setting');
        }

        if (isset($param['setting_initial'])) {
            $this->db->set('setting_value', $param['setting_initial']);
            $this->db->where('setting_id', 8);
            $this->db->update('setting');
        }

    }

}
