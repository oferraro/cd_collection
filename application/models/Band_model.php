<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class band_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_band ($band = false) {
		if (is_array($band)) {
			$this->db->where ($band);
		}
		$query = $this->db->get('bands');
		return $query->result();
	}

	public function add_band ($band) {
		$query = false;
		if (!$this->get_band(['name'=>$band])) {
			$query = $this->db->insert ('bands', ['name'=>trim($band)]);
		} 
		return $query;
	}

	public function edit_band ($band) {
		$this->db->update('bands', array('name'=>$band['name']), array('id' => $band['id']));
	}

	public function del_band ($id) {
		return $this->db->delete('bands', array('id' => $id)); 
	}

}

