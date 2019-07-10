<?php

	class Car_ratings extends CI_Controller {
		public function createRating($car_id) {
			$slug = $this->input->post('slug');
			$data['car'] = $this->carslisting_model->get_cars($slug);
			

			$this->form_validation->set_rules('rating', 'Rating', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					$this->car_rating_model->createRating($car_id);
					redirect('carslisting/' . $slug);
				}

		}
	}
