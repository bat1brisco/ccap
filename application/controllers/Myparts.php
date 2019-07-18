<?php 
  class Myparts extends CI_Controller {
    public function index() {
      $data['title'] = 'My Parts';

      $this->load->view('templates/header');
      $this->load->view('myparts/index', $data);
			$this->load->view('templates/admindashfooter');
    }
  }