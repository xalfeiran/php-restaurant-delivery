<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Users Model class
 */
class Users_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

    public function insert_new_user($data) {
        $this->db->insert('test_users', $data);
        return $this->get_user_by_id($this->db->insert_id());
    }

    public function get_user_by_id($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('test_users');
        return $query->row();
    }

    public function get_user_by_phone($phone) {
        $this->db->where('phone', $phone);
        $query = $this->db->get('test_users');
        return $query->row();
    }
}