<?php
class ModelSettingStore extends Model {
	public function addStore($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "store SET name = '" . $this->db->escape($data['name']) . "', `owner` = '" . $this->db->escape($data['owner']) . "', `address` = '" . $this->db->escape($data['address']) . "', `email` = '" . $this->db->escape($data['email']) . "', `telephone` = '" . $this->db->escape($data['telephone']) . "', `description` = '" . $this->db->escape($data['description']) . "', `image` = '" . $this->db->escape($data['image']) . "', `store_logo` = '" . $this->db->escape($data['store_logo']) . "', `open` = '" . $this->db->escape($data['open']) . "', `date_added` = NOW()");

		$store_id = $this->db->getLastId();

		$this->db->query("INSERT INTO `" . DB_PREFIX . "user` SET username = '" . $this->db->escape($data['username']) . "', user_group_id = '" . (int)$this->config->get('config_store_user_group_id') . "', salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['user_email']) . "', image = '" . $this->db->escape($data['user_image']) . "', store_id = '" . (int)$store_id . "', status = 1, date_added = NOW()");

		$user_id = $this->db->getLastId();

		$this->db->query("UPDATE `" . DB_PREFIX . "store` SET user_id = '" . (int)$user_id . "' WHERE store_id = '" . (int)$store_id . "'");

		// Layout Route
		// $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "layout_route WHERE store_id = '0'");

		// foreach ($query->rows as $layout_route) {
		// 	$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_route['layout_id'] . "', route = '" . $this->db->escape($layout_route['route']) . "', store_id = '" . (int)$store_id . "'");
		// }

		$this->cache->delete('store');

		return $store_id;
	}

	public function editStore($store_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "store SET 
			name = '" . $this->db->escape($data['name']) . "', 
			`owner` = '" . $this->db->escape($data['owner']) . "', 
			`address` = '" . $this->db->escape($data['address']) . "', 
			`email` = '" . $this->db->escape($data['email']) . "', 
			`telephone` = '" . $this->db->escape($data['telephone']) . "', 
			`description` = '" . $this->db->escape($data['description']) . "', 
			`image` = '" . $this->db->escape($data['image']) . "', 
			`store_logo` = '" . $this->db->escape($data['store_logo']) . "', 
			`open` = '" . $this->db->escape($data['open']) . "'
			WHERE store_id = '" . (int)$store_id . "'");

		// Optionally update related user info
		if (!empty($data['user_id'])) {
			$this->db->query("UPDATE `" . DB_PREFIX . "user` SET 
				username = '" . $this->db->escape($data['username']) . "', 
				firstname = '" . $this->db->escape($data['firstname']) . "', 
				lastname = '" . $this->db->escape($data['lastname']) . "', 
				email = '" . $this->db->escape($data['user_email']) . "', 
				image = '" . $this->db->escape($data['user_image']) . "' 
				WHERE user_id = '" . (int)$data['user_id'] . "'");
			
			if (!empty($data['password'])) {
				$salt = token(9);
				$this->db->query("UPDATE `" . DB_PREFIX . "user` SET 
					salt = '" . $this->db->escape($salt) . "', 
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "' 
					WHERE user_id = '" . (int)$data['user_id'] . "'");
			}
		}

		$this->cache->delete('store');
	}


	public function deleteStore($store_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "store WHERE store_id = '" . (int)$store_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "layout_route WHERE store_id = '" . (int)$store_id . "'");

		$this->cache->delete('store');
	}

	public function getStore($store_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "store WHERE store_id = '" . (int)$store_id . "'");

		return $query->row;
	}

	public function getStores($data = array()) {
		$store_data = $this->cache->get('store');

		if (!$store_data) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "store ORDER BY date_added");

			$store_data = $query->rows;

			$this->cache->set('store', $store_data);
		}

		return $store_data;
	}

	public function getTotalStores() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "store");

		return $query->row['total'];
	}

	public function getTotalStoresByLayoutId($layout_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_layout_id' AND `value` = '" . (int)$layout_id . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByLanguage($language) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_language' AND `value` = '" . $this->db->escape($language) . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByCurrency($currency) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_currency' AND `value` = '" . $this->db->escape($currency) . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByCountryId($country_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_country_id' AND `value` = '" . (int)$country_id . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByZoneId($zone_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_zone_id' AND `value` = '" . (int)$zone_id . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByCustomerGroupId($customer_group_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_customer_group_id' AND `value` = '" . (int)$customer_group_id . "' AND store_id != '0'");

		return $query->row['total'];
	}

	public function getTotalStoresByInformationId($information_id) {
		$account_query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_account_id' AND `value` = '" . (int)$information_id . "' AND store_id != '0'");

		$checkout_query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_checkout_id' AND `value` = '" . (int)$information_id . "' AND store_id != '0'");

		return ($account_query->row['total'] + $checkout_query->row['total']);
	}

	public function getTotalStoresByOrderStatusId($order_status_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "setting WHERE `key` = 'config_order_status_id' AND `value` = '" . (int)$order_status_id . "' AND store_id != '0'");

		return $query->row['total'];
	}
}