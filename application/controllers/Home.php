<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Restaurant_model'));
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

	public function index() {
		$this->load->view('Home_view');
	}
}

