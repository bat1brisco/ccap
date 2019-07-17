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
      $this->db->where('car_status', 'pending');
      $query = $this->db->get('cars');

      return $query->result_array();
    }

    public function get_in_progress_deals($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->where('car_status', 'ongoing');
      $query = $this->db->get('cars');

      return $query->result_array();
    }
  }