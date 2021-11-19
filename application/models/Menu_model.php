<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Menu model for each restaurant
 */
class Menu_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

    // get the menu for a specific restaurant
    public function get_restaurant_menu($restaurant_id) {
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $query = $this->db->get();
        return $query->result();
    }

    // get a menu item for a specific restaurant
    public function get_restaurant_menu_item($restaurant_id, $menu_id) {
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();
        return $query->result();
    }

    // search in menu for a specific restaurant
    public function search_menu_restaurant($restaurant_id, $search_term) {
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->like('menu_name', $search_term);
        $query = $this->db->get();
        return $query->result();
    }

    // search in menus for all restaurants
    public function search_menu_all($search_term) {
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->like('menu_name', $search_term);
        $query = $this->db->get();
        return $query->result();
    }

    // insert a new menu item
    public function insert_menu_item($data) {
        $this->db->insert('test_restaurant_menu', $data);
    }

    // get three random items of menu for all restaurants
    public function get_random_menu_items() {
        $this->db->select('test_restaurant_menu.*,test_restaurant.restaurant_id,test_restaurant.name as restaurant_name');
        $this->db->from('test_restaurant_menu');
        $this->db->join('test_restaurant', 'test_restaurant_menu.restaurant_id = test_restaurant.restaurant_id');
        $this->db->order_by('menu_id', 'RANDOM');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    // get three random items of menu for a specific restaurant (for each course)
    public function get_random_menu_items_restaurant($restaurant_id) {
        
        // one for appetizers
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('course', 'Appetizer');
        $this->db->order_by('menu_id', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get();
        $random_meal[] = $query->row();

        // get the meal
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('course', 'Meal');
        $this->db->order_by('menu_id', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get();
        $random_meal[] = $query->row();

        // now a desserts
        $this->db->select('*');
        $this->db->from('test_restaurant_menu');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('course', 'Dessert');
        $this->db->order_by('menu_id', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get();
        $random_meal[] = $query->row();

        return $random_meal;
    }
}