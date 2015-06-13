<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Band extends CI_Controller {

	public function bands_list () {
		$this->load->model('band_model');
		$data['bands'] = $this->band_model->get_band();
		render_layout(['bands/list'=>$data]);
	}
	
	public function bands_add () {
		$this->load->model('band_model');
		if ($post = $this->input->post()) {
			if (isset($post['band_name'])) {
				$this->band_model->add_band($post['band_name']);
			}
		}
		$data['bands'] = $this->band_model->get_band();
		render_layout(['bands/add' => $data, 'bands/list'=>$data]);
	}
	
	public function bands_edit ($id = false) {
		$this->load->model('band_model');
		if ($post = $this->input->post()) {
			if (isset($post['band_name']) && isset($post['id'])) { 
				$this->band_model->edit_band(['name'=>$post['band_name'], 'id'=>$post['id']]);
			}
		}
		$data['bands'] = $this->band_model->get_band();
		$data['bandEdit'] = $this->band_model->get_band(['id'=>$id]);
		render_layout(['bands/add' => $data, 'bands/list'=>$data]);
	}
	
	public function bands_delete ($id) {
		$this->load->model('band_model');
		$this->load->model('album_model');
		if (!$this->album_model->get_album_by_condition(array('band_id'=>$id))) {
			$this->band_model->del_band($id);
		} else {
			$this->session->set_flashdata('message', 'Delete bands in use is not allowed, first delete the bands');
		}
		redirect(base_url().$this->uri->segment(1).'/bands_add');
	}

}
