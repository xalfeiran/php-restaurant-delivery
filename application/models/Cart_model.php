<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Cart model for each order
 */
class Cart_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

    // get the contents of a cart by id and a user id
    public function get_cart_contents($user_id, $cart_id) {
        $this->db->select('*');
        $this->db->from('test_cart');
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get();
        return $query->result();
    }

    // create a new order cart for user in specific restaurant
    public function create_cart($user_id, $restaurant_id) {
        $data = array(
            'user_id'       => $user_id,
            'restaurant_id' => $restaurant_id,
            'updated'       => date('Y-m-d H:i:s')
        );
        $this->db->insert('test_cart', $data);
    }

    // add a new item to a cart
    public function add_item($user_id, $cart_id, $item_id, $price, $quantity, $comment) {
        $data = array(
            'user_id'       => $user_id,
            'cart_id'       => $cart_id,
            'item_id'       => $item_id,
            'quantity'      => $quantity,
            'comment'       => $comment,
            'updated'       => date('Y-m-d H:i:s')
        );
        $this->db->insert('test_cart_items', $data);
    }

    // update the quantity of an item in a cart
    public function update_item($user_id, $cart_id, $item_id, $quantity) {
        $data = array(
            'quantity'      => $quantity,
            'comment'       => $comment,
            'updated'       => date('Y-m-d H:i:s')
        );
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $this->db->where('item_id', $item_id);
        $this->db->update('test_cart_items', $data);
    }

    // delete an item from a cart
    public function delete_item($user_id, $cart_id, $item_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $this->db->where('item_id', $item_id);
        $this->db->delete('test_cart_items');
    }

    // delete a cart
    public function delete_cart($user_id, $cart_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $this->db->delete('test_cart');
    }

    // get the total price of a cart
    public function get_cart_total($user_id, $cart_id) {
        $this->db->select('SUM(price * quantity) AS total');
        $this->db->from('test_cart_items');
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get();
        return $query->row()->total;
    }

    // mark the cart as ordered
    public function mark_cart_as_ordered($user_id, $cart_id) {
        $data = array(
            'ordered'       => 1,
            'ordered_time'  => date('Y-m-d H:i:s'),
            'updated'       => date('Y-m-d H:i:s')
        );
        $this->db->where('user_id', $user_id);
        $this->db->where('cart_id', $cart_id);
        $this->db->update('test_cart', $data);
    }

}
