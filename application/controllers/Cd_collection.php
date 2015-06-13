<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cd_collection extends CI_Controller {

	public function index() {
		$this->load->model('album_model'); // Load Model
		$data['albums_data'] = $this->album_model->get_albums();
		render_layout(['list' => $data]);
	}

}
