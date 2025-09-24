<?php
class ModelRestContactForm extends Model {

	public function addContact($data = array()) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "contact_form SET 
			name = '" . $this->db->escape($data['name']) . "',
			email = '" . $this->db->escape($data['email']) . "',
			telephone = '" . $this->db->escape($data['telephone']) . "',
			topic = '" . $this->db->escape($data['topic']) . "',
			help = '" . $this->db->escape($data['help']) . "',
			help_details = '" . $this->db->escape($data['help_details']) . "'");
	}
	
	

	public function getContacts(){
		$query = $this->db->query("SELECT email, `name`, telephone, `topic` FROM " . DB_PREFIX . "contact_form WHERE 1");

		return $query->rows;
	}

	// public function getTotalContactsByEmail($email){
	// 	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "contact_form WHERE email = '" . $this->db->escape($email) . "'");

	// 	return $query->row['total'];
	// }

	// public function getTotalContactsByTelephone($telephone){
	// 	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "contact_form WHERE telephone = '" . $this->db->escape($telephone) . "'");

	// 	return $query->row['total'];
	// }
}
