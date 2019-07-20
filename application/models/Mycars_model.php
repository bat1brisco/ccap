<?php 
  class Mycars_model extends CI_Model {
    public function __construct() {
			
			$this->load->database();
			
    }
    
    public function get_sold_cars($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->where('car_status', 'sold');
      $query = $this->db->get('cars');

      return $query->result_array();
    }

    public function get_pending_cars($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->where('status', 'pending');
      $query = $this->db->get('cars');

      return $query->result_array();
    }

    public function get_in_progress_deals($user_id) {
      $this->db->where('car_status', 'ongoing');
      $this->db->where('user_id', $user_id);
      $this->db->or_where('cars_buyer_id', $user_id);
      
      $query = $this->db->get('cars');

      return $query->result_array();
    }

    public function updateCarStatus($car_id) {
      $car_buyer = $this->input->post('cars_buyer_id');

        $data = array(
          'car_status' => 'ongoing',
          'cars_buyer_id' => $car_buyer
        );

      $this->db->set($data);
      $this->db->where('car_id', $car_id);
      $query = $this->db->update('cars');
    }

    public function newTransaction() {
      $car_id = $this->input->post('car_id');
      $car_buyer_id = $this->input->post('car_buyer_id');
      $car_seller_id = $this->input->post('car_seller_id');
      $name_of_buyer = $this->input->post('name_of_buyer');
      $name_of_seller = $this->input->post('name_of_seller');
      $car_make = $this->input->post('car_make');
      $car_model = $this->input->post('car_model');
      $post_image = $this->input->post('post_image');

      $data = array(
        'car_id' => $car_id,
        'car_buyer_id' => $car_buyer_id,
        'car_seller_id' => $car_seller_id,
        'name_of_buyer' => $name_of_buyer,
        'name_of_seller' => $name_of_seller,
        'car_make' => $car_make,
        'car_model' => $car_model,
        'post_image' => $post_image,
        'meetup_sched' => NULL,
        'downpayment' => FALSE,
        'fullpayment' => FALSE,
        'status' => 'ongoing',
        'downpayment_price' => NULL,
        'fullpay_sched' => NULL,
        'meetup_place' => NULL,
        'mode_of_payment' => NULL
      );

      $q = $this->db->insert('car_transactions', $data);
      
      return 1;
    }
  }