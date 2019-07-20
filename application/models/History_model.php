<?php

class History_model extends CI_Model{
 
    public function display_cars_history(){
      $id = $this->session->userdata('user_id');
      $result = $this->db->query("SELECT * FROM users INNER JOIN cars ON users.user_id = cars.user_id  WHERE users.user_id = '$id' ORDER BY date_posted DESC ");
      return $result;
    }
    public function view_history(){
      $id = $_POST['id'];
      $result = $this->db->query("SELECT * FROM cars INNER JOIN users ON cars.user_id = users.user_id WHERE car_id = '$id' ");
      return $result;
    }

    public function update_history($id){
       $id = $_POST['id'];
        $data = array(
        'make' => $this->input->post('make'),
        'model' => $this->input->post('model'),
        'year' => $this->input->post('year'),
        'price' => $this->input->post('price'),
        'transmission' => $this->input->post('transmission'),
        'body_style' => $this->input->post('body_style'),
        'mileage' => $this->input->post('mileage'),
        'cylinder_engine' => $this->input->post('cylinder_engine'),
        'drive_type' => $this->input->post('drive_type'),
        'fuel_type' => $this->input->post('fuel_type'),
        'seating_capacity' => $this->input->post('seating_capacity'),
        'door' => $this->input->post('door'),
        'color' => $this->input->post('color'),
        'description' => $this->input->post('description'),
        'rfs' => $this->input->post('rfs')
      );
      $this->db->where('car_id',  $id);
      return $this->db->update('cars', $data);  
    }

    public function delete_history($id){
       $id = $_POST['id'];
        $result = $this->db->query(" DELETE FROM cars WHERE car_id = '$id'  ");
        return $result;
    }

    public function display_parts_history(){
      $id = $this->session->userdata('user_id');
      $result = $this->db->query("SELECT * FROM users INNER JOIN parts ON users.user_id = parts.user_id  WHERE users.user_id = '$id' ORDER BY date_posted DESC ");
      return $result;
    }
    public function parts_view_history(){
       $id = $_POST['id'];
      $result = $this->db->query("SELECT * FROM parts INNER JOIN users ON parts.user_id = users.user_id WHERE parts_id = '$id' ");
      return $result;
    }
    public function parts_update_history($id){
       $id = $_POST['id'];
        $data = array(
        
        'price' => $this->input->post('price'),
        'category' => $this->input->post('category'),  
        'brand' => $this->input->post('brand'),
        'color' => $this->input->post('color'),
        'description' => $this->input->post('description'),
        'parts_quantity' => $this->input->post('quantity'),
        'model_name' => $this->input->post('model_name'),
        'rfs' => $this->input->post('rfs')
      );
        $this->db->where('parts_id', $id);
      return $this->db->update('parts', $data); 
    }

    public function parts_delete_history($id){
       $id = $_POST['id'];
       $result = $this->db->query(" DELETE FROM parts WHERE parts_id = '$id' ");
        return $result;
    }

}//end 