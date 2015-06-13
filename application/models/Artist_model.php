<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class artist_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_artists ($artist = false) {
		if (is_array($artist)) {
			$this->db->where ($artist);
		}
		$query = $this->db->get('artists');
		return $query->result();
	}
	
	public function add_artist ($artist) {
		return $this->db->insert('artists', $artist);
	}

	public function del_artist ($id) {
		return $this->db->delete('artists', array('id' => $id));
	}
	
	public function edit_artist ($artist, $id) {
		return $this->db->update('artists', $artist, array('id' => $id));
	}

}

