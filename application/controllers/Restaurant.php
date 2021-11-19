<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 *   Controller for Restaurant
 */
class Restaurant extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Restaurant_model','Menu_model'));
        $this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

    public function index() {
        
        $data['title'] = 'Delivery App Home';
        if($this->input->get('k')){
            $data['restaurants'] = $this->Restaurant_model->get_restaurants_by_keyword($this->input->get('k'));
        }
        else{
            $data['restaurants'] = $this->Restaurant_model->get_all_restaurants();
        }
        
        $data['random_meals'] = $this->Menu_model->get_random_menu_items();
        $data['keywords'] = $this->parse_keywords();

        $this->load->view('Home_view', $data);
    }

    public function About() {
        $this->load->view('About_view');
    }

    private function parse_keywords() {
        $keywords =  array();
        $rows = $this->Restaurant_model->get_keywords_in_restaurants();
        
        foreach ($rows as $row) {
            $keywords_array = explode(' ', $row->keyword);
            $keywords_array = array_map('trim', $keywords_array);
            $keywords = array_merge($keywords, $keywords_array);
        }

        // create a new array with no duplicate values
        $keywords = array_unique($keywords);

        
        return $keywords;
    }
}

