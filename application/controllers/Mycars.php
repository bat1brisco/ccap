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

    public function view($slug = NULL) {
			$data['car'] = $this->carslisting_model->get_cars($slug);
			$car_id = $data['car']['car_id'];
			

				if (empty($data['car'])) {
					show_404();
				}

			$data['make'] = $data['car']['make'];

			$this->load->view('templates/header');
			$this->load->view('mycars/view', $data);
			$this->load->view('templates/footer');

		}

		public function updateCarStatus($car_id) {
			$slug = $this->input->post('slug');
			$data['car'] = $this->carslisting_model->get_cars($slug);
			$data['comments'] = $this->car_comment_model->get_comments($car_id);

			$this->form_validation->set_rules('body', 'Body', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					$this->car_comment_model->create_comment($car_id);
					redirect('carslisting/' . $slug);
				}
		}
  }