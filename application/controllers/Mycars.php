<?php 
  class Mycars extends CI_Controller {
    public function index() {
      $data['title'] = 'My Cars';

      $this->load->view('templates/header');
			$this->load->view('mycars/index', $data);
			$this->load->view('templates/admindashfooter');
    }
  }