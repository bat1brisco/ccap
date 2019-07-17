<?php 
  class Mycars extends CI_Controller {
    public function index() {
      $data['title'] = 'My Cars';
      $user_id = $this->session->userdata('user_id');
      $data['carssold'] = $this->mycars_model->get_sold_cars($user_id);
      $data['carspending'] = $this->mycars_model->get_pending_cars($user_id);
      $data['carsinprogress'] = $this->mycars_model->get_in_progress_deals($user_id);

      $this->load->view('templates/header');
			$this->load->view('mycars/index', $data);
			$this->load->view('templates/admindashfooter');
    }
  }