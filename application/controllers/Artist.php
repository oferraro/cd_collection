<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Controller {

	public function artists_list () {
		$this->load->model('artist_model');
		$data['artists'] = $this->artist_model->get_artists();
		render_layout(['artists/list'=>$data]);
	}
	
	public function artists_add() {
		$this->load->model('artist_model');
		if ($post = $this->input->post()) {
			$artist['name'] = isset($post['name'])?$post['name']:"";
			$artist['last_name'] = isset($post['last_name'])?$post['last_name']:"";
			$this->artist_model->add_artist($artist);
		}
		$data['artists'] = $this->artist_model->get_artists();
		render_layout(['artists/add' => $data, 'artists/list'=>$data]);
	}
	
	public function artists_edit ($id) {
		$this->load->model('artist_model');
		if ($post = $this->input->post()) {
			if (isset($post['name']) && isset($post['id'])) { 
				$artist = [ 'name'=>$post['name'],
							'last_name'=>$post['last_name']];
				$this->artist_model->edit_artist($artist, $post['id']);
			}
		}
		$data['artists'] = $this->artist_model->get_artists();
		$data['artistEdit'] = $this->artist_model->get_artists(['id'=>$id]);
		render_layout(['artists/add' => $data, 'artists/list'=>$data]);
	}
	
	public function artists_delete ($id) {
		$this->load->model('artist_model');
		$this->load->model('album_model');
		if ($album = $this->album_model->get_album_by_condition(['artist_id'=>$id])) {
			$this->session->set_flashdata('message', 'Can\'t delete an artist which is in use');
		} else {
			$this->artist_model->del_artist($id);
		} 
		redirect(base_url().$this->uri->segment(1).'/artists_add');
	}
	
}
