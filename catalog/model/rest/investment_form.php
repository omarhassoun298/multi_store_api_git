<?php
class ModelRestInvestmentForm extends Model {

	public function addInvestment($data = array(),$type,$data_exist = array()){
		if($data_exist){
			$this->db->query("DELETE FROM `".DB_PREFIX."investment_form` WHERE `email` = '".$data_exist['exist_email']."' OR `telephone` = '".$data_exist['exist_telephone']."'");
		}
		$this->db->query("INSERT INTO ".DB_PREFIX."investment_form SET name ='".$this->db->escape($data['name'])."', email ='".$this->db->escape($data['email'])."', telephone ='".$this->db->escape($data['telephone'])."', `investment_key1` ='".$this->db->escape($data['investment_key1'])."', `investment_key2` ='".$this->db->escape($data['investment_key2'])."',`investment_key3` ='".$this->db->escape($data['investment_key3'])."', gender ='".$this->db->escape($data['gender'])."', type = '".$this->db->escape($type)."'");
	}

	public function getInvestments(){
		$query = $this->db->query("SELECT email, `name`, telephone, `type` FROM " . DB_PREFIX . "investment_form WHERE 1");

		return $query->rows;
	}

	public function getTotalInvestmentsByEmail($email){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "investment_form WHERE email = '" . $this->db->escape($email) . "'");

		return $query->row['total'];
	}

	public function getTotalInvestmentsByTelephone($telephone){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "investment_form WHERE telephone = '" . $this->db->escape($telephone) . "'");

		return $query->row['total'];
	}
}
