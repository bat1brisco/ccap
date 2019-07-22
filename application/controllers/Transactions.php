<?php
  class Transactions extends CI_Controller {
    public function index() {
      $data['title'] = 'Transactions';

      $this->load->view('templates/header');
      $this->load->view('transactions/index', $data);
      $this->load->view('templates/footer');
    }

    public function fetch_transactions() { 
      $fetch_data = $this->transactions_model->make_datatables();  
      $data = array();  
        foreach($fetch_data as $row) {  
          $sub_array = array();  
          $sub_array[] = '<img src="'.base_url().'assets/images/posts/'.$row->post_image.'" class="img-thumbnail" width="50" height="35" />';  
          $sub_array[] = $row->car_make;  
          $sub_array[] = $row->car_model;  
          $sub_array[] = '<button type="button" name="update" id="'.$row->transaction_id.'" class="btn btn-warning btn-xs update">Update</button>';  
            
          $data[] = $sub_array;  
        }  
           
        $output = array(  
          "draw"            => intval($_POST["draw"]),  
          "recordsTotal"    => $this->transactions_model->get_all_data(),  
          "recordsFiltered" => $this->transactions_model->get_filtered_data(),  
          "data"            => $data  
        );  
      
      echo json_encode($output);
    }

    public function user_action() {
      if($_POST["action"] == "Update") {  
        $user_image = '';  
                
          if($_FILES["userfile"]["name"] != '') {  
            $user_image = $this->upload_image();  
          }else {  
            $user_image = $this->input->post("hidden_user_image");  
          }  
          
          $updated_data = array(  
            'car_make'    =>     $this->input->post('car_model'),  
            'car_model'   =>     $this->input->post('car_make'),  
            'image'       =>     $user_image  
          );  
                
        $this->transactions_model->update_transaction($this->input->post("transaction_id"), $updated_data);  
        echo 'Data Updated';  
      }  
    }

    function upload_image() {  
      if(isset($_FILES["userfile"])) {  
        $extension = explode('.', $_FILES['userfile']['name']);  
        $new_name = rand() . '.' . $extension[1];  
        $destination = './assets/images/posts' . $new_name;  
        move_uploaded_file($_FILES['userfile']['tmp_name'], $destination);  
        return $new_name;  
      }  
    }

    public function fetch_single_transaction() {
      $output = array();
      $data = $this->transactions_model->fetch_single_transaction($_POST["transaction_id"]);  
        foreach($data as $row) {  
          $output['car_make'] = $row->car_make;  
          $output['car_model'] = $row->car_model;  
            if($row->post_image != '') {  
              $output['userfile'] = '<img src="'.base_url().'assets/images/posts/'.$row->post_image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->post_image.'" />';  
            } else {  
              $output['userfile'] = '<input type="hidden" name="hidden_user_image" value="" />';  
            }  
        }  
        
        echo json_encode($output);
    }
  }