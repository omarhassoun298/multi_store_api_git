<?php
class ModelRestOnBoardingForm extends Model {

	public function addOnBoarding($data = array(),$type,$data_exist = array()){
		if($data_exist){
			$this->db->query("DELETE FROM `".DB_PREFIX."onboarding_form` WHERE `email` = '".$data_exist['exist_email']."' OR `telephone` = '".$data_exist['exist_telephone']."'");
		}
		$this->db->query("INSERT INTO ".DB_PREFIX."onboarding_form SET name ='".$this->db->escape($data['name'])."', email ='".$this->db->escape($data['email'])."', telephone ='".$this->db->escape($data['telephone'])."', `topic` ='".$this->db->escape($data['topic'])."', `help` ='".$this->db->escape($data['help'])."',`help_details` ='".$this->db->escape($data['help_details'])."'");
	}

	public function getOnBoardings(){
		$query = $this->db->query("SELECT email, `name`, telephone, `topic` FROM " . DB_PREFIX . "onboarding_form WHERE 1");

		return $query->rows;
	}

	public function getTotalOnBoardinggsByEmail($email){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "onboarding_form WHERE email = '" . $this->db->escape($email) . "'");

		return $query->row['total'];
	}

	public function getTotalOnBoardingsByTelephone($telephone){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "onboarding_form WHERE telephone = '" . $this->db->escape($telephone) . "'");

		return $query->row['total'];
	}
}
