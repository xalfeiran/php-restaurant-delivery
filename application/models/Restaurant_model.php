<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Model for Restaurant
 */
class Restaurant_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

    // get all restaurants available in an array of objects
    public function get_all_restaurants() {
        $this->db->select('*');
        $this->db->from('test_restaurant');
        $this->db->where('status', '1');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // get all restaurants with some keyword in menu
    public function get_restaurants_by_keyword($keyword) {
        $this->db->select('test_restaurant.*');
        $this->db->from('test_restaurant');
        $this->db->join('test_restaurant_menu', 'test_restaurant.restaurant_id = test_restaurant_menu.restaurant_id');
        $this->db->where('status', '1');
        $this->db->like('keyword', $keyword);
        $this->db->order_by('test_restaurant.name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // get one restaurant by id
    public function get_one_restaurant($id) {
        $this->db->select('*');
        $this->db->from('test_restaurant');
        $this->db->where('restaurant_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // get all restaurants in a city
    public function get_restaurants_in_city($city) {
        $this->db->select('*');
        $this->db->from('test_restaurant');
        $this->db->where('city', $city);
        $this->db->where('status', '1');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // get all keywords in restaurants
    public function get_keywords_in_restaurants() {
        $this->db->select('restaurant_id, keyword');
        $this->db->from('test_restaurant_menu');
        $query = $this->db->get();
        return $query->result();
    }

}


