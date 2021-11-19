<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 *   Controller for Restaurant
 */
class Users extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Restaurant_model','Users_model'));
        $this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

    public function new_user() {
    
        $phone = $this->input->post('phone');
        $name = $this->input->post('name');
        $address = $this->input->post('address');

        $user = $this->Users_model->get_user_by_phone($phone);
        if ($user) {
            $this->session->set_userdata(array('user_id' => $user->user_id));
            // set header to json and return user
            header('Content-Type: application/json');
            echo json_encode($user);
            return;
        }
        $data = array( 'phone' => $phone, 'name' => $name, 'address' => $address );
        $user = $this->Users_model->insert_new_user($data);
        $this->session->set_userdata(array('user_id' => $user->user_id));

        // set header to json and return user
        header('Content-Type: application/json');
        echo json_encode($user);
    }

}