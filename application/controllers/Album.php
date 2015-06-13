<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {

	public function albums_list () {
		$this->load->model('album_model');
		$data['albums'] = $this->album_model->get_albums();
		render_layout (['albums/list' => $data]);
	}
	
	public function albums_add () {
		$this->load->model('band_model');
		$this->load->model('artist_model');
		$this->load->model('album_model');
		if ($post = $this->input->post()) {
			if (!isset($post['band']) || !is_numeric($post['band'])) {
				$this->session->set_flashdata('message', 'Assign a Bands is required');
			} elseif (!$this->band_model->get_band(['id'=>$post['band']])) {
				$this->session->set_flashdata('message', 'This Band doesn\'t exist');
			} elseif (!isset($post['artist']) || !is_numeric($post['artist'])){
				$this->session->set_flashdata('message', 'Assign Artists is required');
			} elseif (!$this->artist_model->get_artists(['id'=>$post['artist']])) {
				$this->session->set_flashdata('message', 'This Artist doesn\'t exist');
			} else {
				$cover_photo = uploadPicture ('cover_photo');
				$album = array ('band_id'=>isset($post['band'])?$post['band']:"", 
								'album_title'=>isset($post['album_title'])?$post['album_title']:"",
								'cover_photo'=>($cover_photo)?$cover_photo:"",
								'artist_id'=>$post['artist'],
								'year'=>$post['year']);
				$this->album_model->add_albums ($album);
			}
			redirect(base_url().$this->uri->segment(1).'/albums_list');
		}
		$data['bands'] = $this->band_model->get_band();
		$data['albums'] = $this->album_model->get_albums();
		$data['artists'] = $this->artist_model->get_artists();
		render_layout(['albums/add' => $data, 'albums/list'=>$data]);
	}
	
	public function albums_edit ($id = false) {
		$this->load->model('album_model');
		$this->load->model('band_model');
		$this->load->model('artist_model');
		if ($post = $this->input->post()) {
			if (isset($post['id'])) { 
				if ($cover_photo = uploadPicture ('cover_photo')) {
					$album['cover_photo'] = $cover_photo;
				}
				$album['band_id'] = $post['band'];
				$album['album_title'] = $post['album_title'];
				$album['artist_id'] = $post['artist'];
				$album['year'] = $post['year'];
				$this->album_model->edit_album($album, $post['id']);
			}
		}
		$data['albums'] = $this->album_model->get_albums();
		$data['bands'] = $this->band_model->get_band();
		$data['albumEdit'] = $this->album_model->get_album_by_condition(['albums.id'=>$id]);
		$data['artists'] = $this->artist_model->get_artists();
		render_layout(['albums/add' => $data, 'albums/list'=>$data]);
	}
	
	public function albums_delete ($id) {
		$this->load->model('album_model');
		$this->album_model->del_album ($id);
		redirect(base_url().$this->uri->segment(1).'/albums_list');
	}
	
}
