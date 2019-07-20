<?php
  class Transactions extends CI_Controller {
    public function index() {
      $data['title'] = 'Transactions';

      $this->load->view('templates/header');
      $this->load->view('transactions/index', $data);
      $this->load->view('templates/footer');
    }
  }