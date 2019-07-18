<?php
	class Adminprofile extends CI_Controller {
		public function index() {
      $data['title'] = 'My Profile';
      $user_id = $this->session->userdata('user_id');
      $data['profile'] = $this->user_model->get_admininfo($user_id);

			if($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "admin") {
				$this->load->view('templates/header');
				$this->load->view('adminprofile/index', $data);
				$this->load->view('templates/admindashfooter');
			} elseif ($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "user") {

      }
		}
	}