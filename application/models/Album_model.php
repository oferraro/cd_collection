<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class album_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_album_by_condition ($where) {
		$this->db->select('albums.*, bands.name as band_name');
		$this->db->where ($where);
		$this->db->join('bands', 'bands.id = albums.band_id', 'left');
		$this->db->limit(1);
		$query = $this->db->get('albums');
		return $query->row();
	}

	public function get_albums($limit = false, $offset = false) {
		$this->db->select('albums.*, bands.name as band_name, artists.name as artist_name');
		$this->db->join('bands', 'bands.id = albums.band_id', 'left');
		$this->db->join('artists', 'artists.id = albums.artist_id', 'left');
		if ($limit && $offset) {
			$this->db->limit($limit, $offset);
		} elseif($limit) {
			$this->db->limit($limit);				
		}
		$query = $this->db->get('albums');
		return $query->result();
	}

	public function add_albums($album) {
		return $this->db->insert('albums', $album);
	}

	public function edit_album($album, $id) {
		return $this->db->update('albums', $album, array('id' => $id));
	}

	public function del_album ($id) {
		return $this->db->delete('albums', array('id' => $id));
	}

}

