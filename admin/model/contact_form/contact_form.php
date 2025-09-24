<?php
class ModelContactFormContactForm extends Model {
	

    public function getContactData($data=array()) {
        $sql = "SELECT * FROM " . DB_PREFIX . "contact_form";

        $sort_data = array(
            'name',
            'contact_form_id'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }
    public function getTotalContactData() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "contact_form");

		return $query->row['total'];
	}
    public function getContactDataByName($data = array()) {
        $sql = "SELECT * FROM " . DB_PREFIX . "contact_form WHERE 1";
         
        if(isset($data['filter_name']) && !empty($data['filter_name'])){
            $sql .= " AND `name` LIKE '" . $this->db->escape($data['filter_name']) . "%'";
        }


        $sort_data = array(
            'name'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    
}
}
