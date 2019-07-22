<?php 
  class Transactions_model extends CI_Model {

    var $table = 'car_transactions';
    var $select_column = array('transaction_id', 'car_make', 'car_model', 'post_image');
    var $order_column = array(null, 'car_make', 'car_model', null);
    
    public function make_query() {
      $this->db->select($this->select_column);  
      $this->db->from($this->table);  
           
        if(isset($_POST["search"]["value"])) {  
          $this->db->like("car_make", $_POST["search"]["value"]);  
          $this->db->or_like("car_model", $_POST["search"]["value"]);  
        }  
           
          if(isset($_POST["order"])) {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
          } else {  
            $this->db->order_by('transaction_id', 'DESC');  
          }  
    }

    public function make_datatables() {  
      $this->make_query();  
      
        if($_POST["length"] != -1) {  
          $this->db->limit($_POST['length'], $_POST['start']);  
        }  
      $query = $this->db->get();  
      return $query->result();  
    }

    public function get_filtered_data() {  
      $this->make_query();  
      $query = $this->db->get();  
      return $query->num_rows();  
    }

    public function get_all_data() {  
      $this->db->select("*");  
      $this->db->from($this->table);  
      return $this->db->count_all_results();  
    }

    public function fetch_single_transaction($transaction_id) {  
      $this->db->where("transaction_id", $transaction_id);  
      $query=$this->db->get('car_transactions');  
      return $query->result();  
    }

    public function update_transaction($transaction_id, $data) {  
      $this->db->where("transaction_id", $transaction_id);  
      $this->db->update("car_transactions", $data);  
    }
      
  }