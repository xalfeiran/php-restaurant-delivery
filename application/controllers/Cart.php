<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 *   Controller for Restaurant
 */
class Cart extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Restaurant_model','Menu_model','Cart_model','Users_model'));
        $this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

    public function new_order() {
        $data['titulo'] = 'Delivery Cart';
        $data['restaurant'] = $this->Restaurant_model->get_one_restaurant($this->input->get('rid'));
        $data['menu'] = $this->Menu_model->get_restaurant_menu($this->input->get('rid'));
        $user_id = $this->input->get('uid');
        if( $user_id ) {
            
            $user = $this->Users_model->get_user_by_id($user_id);
            $data['user'] = $user;
        }
        $this->load->view('Cart_view', $data);
    }

}
