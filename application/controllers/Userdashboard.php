<?php
	class Userdashboard extends CI_Controller {
		public function index() {
			$data['title'] = 'My Dashboard';

			if($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "user" ) {
				$this->load->view('templates/header');
				$this->load->view('userdashboard/index', $data);
				$this->load->view('templates/footer');
			}
		}
	}