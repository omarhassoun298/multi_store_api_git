<?php
class ControllerSettingStore extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('setting/store');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/store');

		$this->getList();
	}

	public function add() {
		if($this->user->getStoreId() != 0){
			$this->response->redirect($this->url->link('error/permission', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->load->language('setting/store');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/store');
		$this->load->model('user/user');


		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$store_id = $this->model_setting_store->addStore($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('setting/store', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->getForm();
	}

	public function edit() {
		if($this->user->getStoreId() != 0 && $this->user->getStoreId() != $this->request->get['store_id']){
			$this->response->redirect($this->url->link('error/permission', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->load->language('setting/store');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/store');
		$this->load->model('user/user');


		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_setting_store->editStore($this->request->get['store_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			if($this->user->getStoreId() != 0){
				$this->response->redirect($this->url->link('setting/store/edit', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'], true));
			} else {
				$this->response->redirect($this->url->link('setting/store', 'user_token=' . $this->session->data['user_token'], true));	
			}
		}

		$this->getForm();
	}

	public function delete() {
		if($this->user->getStoreId() != 0){
			$this->response->redirect($this->url->link('error/permission', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->load->language('setting/store');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/store');
		$this->load->model('user/user');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {

			foreach ($this->request->post['selected'] as $store_id) {
				$this->model_setting_store->deleteStore($store_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('setting/store', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->getList();
	}

	protected function getList() {

		if($this->user->getStoreId() != 0){
			$this->response->redirect($this->url->link('error/permission', 'user_token=' . $this->session->data['user_token'], true));
		}

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('setting/setting', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['add'] = $this->url->link('setting/store/add', 'user_token=' . $this->session->data['user_token'], true);
		$data['delete'] = $this->url->link('setting/store/delete', 'user_token=' . $this->session->data['user_token'], true);

		$data['stores'] = array();

		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->config->get('config_name') . $this->language->get('text_default'),
			'url'      => $this->config->get('config_secure') ? HTTPS_CATALOG : HTTP_CATALOG,
			'edit'     => $this->url->link('setting/setting', 'user_token=' . $this->session->data['user_token'], true)
		);

		$store_total = $this->model_setting_store->getTotalStores();

		$results = $this->model_setting_store->getStores();

		foreach ($results as $result) {
			$data['stores'][] = array(
				'store_id' => $result['store_id'],
				'name'     => $result['name'],
				'url'      => $result['url'],
				'edit'     => $this->url->link('setting/store/edit', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $result['store_id'], true)
			);
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('setting/store_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['store_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->error['owner'])) {
			$data['error_owner'] = $this->error['owner'];
		} else {
			$data['error_owner'] = '';
		}

		if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}

		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}

		if (isset($this->error['telephone'])) {
			$data['error_telephone'] = $this->error['telephone'];
		} else {
			$data['error_telephone'] = '';
		}

		//user error

		if (isset($this->error['username'])) {
			$data['error_username'] = $this->error['username'];
		} else {
			$data['error_username'] = '';
		}

		if (isset($this->error['firstname'])) {
			$data['error_firstname'] = $this->error['firstname'];
		} else {
			$data['error_firstname'] = '';
		}

		if (isset($this->error['lastname'])) {
			$data['error_lastname'] = $this->error['lastname'];
		} else {
			$data['error_lastname'] = '';
		}

		if (isset($this->error['user_email'])) {
			$data['error_user_email'] = $this->error['user_email'];
		} else {
			$data['error_user_email'] = '';
		}

		if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}

		if (isset($this->error['confirm'])) {
			$data['error_confirm'] = $this->error['confirm'];
		} else {
			$data['error_confirm'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('setting/setting', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['store_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_settings'),
				'href' => $this->url->link('setting/store/add', 'user_token=' . $this->session->data['user_token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_settings'),
				'href' => $this->url->link('setting/store/edit', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'], true)
			);
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (!isset($this->request->get['store_id'])) {
			$data['action'] = $this->url->link('setting/store/add', 'user_token=' . $this->session->data['user_token'], true);
		} else {
			$data['action'] = $this->url->link('setting/store/edit', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'], true);
		}

		$data['is_stored'] = $this->user->getStoreId() == 0 ? true : false ; 

		var_dump($data['is_stored']);
		$data['cancel'] = $this->url->link('setting/store', 'user_token=' . $this->session->data['user_token'], true);

		if (isset($this->request->get['store_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$this->load->model('setting/store');

			$store_info = $this->model_setting_store->getStore($this->request->get['store_id']);

			$user_info = $this->model_user_user->getUser($store_info['user_id']);
		}

		$data['user_id'] = $store_info['user_id'] ? $store_info['user_id'] : '';

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($store_info['name'])) {
			$data['name'] = $store_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['owner'])) {
			$data['owner'] = $this->request->post['owner'];
		} elseif (isset($store_info['owner'])) {
			$data['owner'] = $store_info['owner'];
		} else {
			$data['owner'] = '';
		}

		if (isset($this->request->post['address'])) {
			$data['address'] = $this->request->post['address'];
		} elseif (isset($store_info['address'])) {
			$data['address'] = $store_info['address'];
		} else {
			$data['address'] = '';
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} elseif (isset($store_info['email'])) {
			$data['email'] = $store_info['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['telephone'])) {
			$data['telephone'] = $this->request->post['telephone'];
		} elseif (isset($store_info['telephone'])) {
			$data['telephone'] = $store_info['telephone'];
		} else {
			$data['telephone'] = '';
		}

		if (isset($this->request->post['desciption'])) {
			$data['desciption'] = $this->request->post['desciption'];
		} elseif (isset($store_info['desciption'])) {
			$data['desciption'] = $store_info['desciption'];
		} else {
			$data['desciption'] = '';
		}
		if (isset($this->request->post['open'])) {
			$data['open'] = $this->request->post['open'];
		} elseif (isset($store_info['open'])) {
			$data['open'] = $store_info['open'];
		} else {
			$data['open'] = '';
		}

		$this->load->model('tool/image');

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['config_icon'])) {
			$data['config_icon'] = $this->request->post['config_icon'];
		} elseif (isset($store_info['config_icon'])) {
			$data['config_icon'] = $store_info['config_icon'];
		} else {
			$data['config_icon'] = '';
		}

		if (isset($this->request->post['config_icon']) && is_file(DIR_IMAGE . $this->request->post['config_icon'])) {
			$data['icon'] = $this->model_tool_image->resize($this->request->post['config_icon'], 100, 100);
		} elseif (isset($store_info['config_icon']) && is_file(DIR_IMAGE . $store_info['config_icon'])) {
			$data['icon'] = $this->model_tool_image->resize($store_info['config_icon'], 100, 100);
		} else {
			$data['icon'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		//user info

		if (isset($this->request->post['password'])) {
			$data['password'] = $this->request->post['password'];
		} else {
			$data['password'] = '';
		}

		if (isset($this->request->post['confirm'])) {
			$data['confirm'] = $this->request->post['confirm'];
		} else {
			$data['confirm'] = '';
		}

		if (isset($this->request->post['username'])) {
			$data['username'] = $this->request->post['username'];
		} elseif (!empty($user_info)) {
			$data['username'] = $user_info['username'];
		} else {
			$data['username'] = '';
		}

		if (isset($this->request->post['firstname'])) {
			$data['firstname'] = $this->request->post['firstname'];
		} elseif (!empty($user_info)) {
			$data['firstname'] = $user_info['firstname'];
		} else {
			$data['firstname'] = '';
		}

		if (isset($this->request->post['lastname'])) {
			$data['lastname'] = $this->request->post['lastname'];
		} elseif (!empty($user_info)) {
			$data['lastname'] = $user_info['lastname'];
		} else {
			$data['lastname'] = '';
		}

		if (isset($this->request->post['user_email'])) {
			$data['user_email'] = $this->request->post['user_email'];
		} elseif (!empty($user_info)) {
			$data['user_email'] = $user_info['email'];
		} else {
			$data['user_email'] = '';
		}

		if (isset($this->request->post['user_image'])) {
			$data['user_image'] = $this->request->post['user_image'];
		} elseif (!empty($user_info)) {
			$data['user_image'] = $user_info['image'];
		} else {
			$data['user_image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['user_image']) && is_file(DIR_IMAGE . $this->request->post['user_image'])) {
			$data['user_thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($user_info) && $user_info['image'] && is_file(DIR_IMAGE . $user_info['image'])) {
			$data['user_thumb'] = $this->model_tool_image->resize($user_info['image'], 100, 100);
		} else {
			$data['user_thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('setting/store_form', $data));
	}

	protected function validateForm() {

		if (
			!$this->user->hasPermission('modify', 'setting/store')
		) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		// --- Store Validation ---
		if (isset($this->request->post['name']) && !$this->request->post['name']) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (isset($this->request->post['owner']) &&
			((utf8_strlen($this->request->post['owner']) < 3) || (utf8_strlen($this->request->post['owner']) > 64))) {
			$this->error['owner'] = $this->language->get('error_owner');
		}

		if (isset($this->request->post['email']) &&
			((utf8_strlen($this->request->post['email']) > 96) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL))) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if (isset($this->request->post['telephone']) &&
			((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32))) {
			$this->error['telephone'] = $this->language->get('error_telephone');
		}

		// --- User Validation ---

		if ((utf8_strlen($this->request->post['username']) < 3) || (utf8_strlen($this->request->post['username']) > 20)) {
			$this->error['username'] = $this->language->get('error_username');
		}

		$user_info = $this->model_user_user->getUserByUsername($this->request->post['username']);

		if (!isset($this->request->get['store_id'])) {
			if ($user_info) {
				$this->error['warning'] = $this->language->get('error_exists_username');
			}
		} else {
			if ($user_info && ($this->request->post['user_id'] != $user_info['user_id'])) {
				$this->error['warning'] = $this->language->get('error_exists_username');
			}
		}

		if ((utf8_strlen(trim($this->request->post['firstname'])) < 1) || (utf8_strlen(trim($this->request->post['firstname'])) > 32)) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		}

		if ((utf8_strlen(trim($this->request->post['lastname'])) < 1) || (utf8_strlen(trim($this->request->post['lastname'])) > 32)) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		}

		if ((utf8_strlen($this->request->post['email']) > 96) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error['email'] = $this->language->get('error_email');
		}

		$user_info = $this->model_user_user->getUserByEmail($this->request->post['email']);

		if (!isset($this->request->get['store_id'])) {
			if ($user_info) {
				$this->error['warning'] = $this->language->get('error_exists_email');
			}
		} else {
			if ($user_info && ($this->request->get['user_id'] != $user_info['user_id'])) {
				$this->error['warning'] = $this->language->get('error_exists_email');
			}
		}

		if ($this->request->post['password'] || (!isset($this->request->get['store_id']))) {
			if ((utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
				$this->error['password'] = $this->language->get('error_password');
			}

			if ($this->request->post['password'] != $this->request->post['confirm']) {
				$this->error['confirm'] = $this->language->get('error_confirm');
			}
		}

		// General warning if other errors exist
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'setting/store')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('sale/order');

		foreach ($this->request->post['selected'] as $store_id) {
			if (!$store_id) {
				$this->error['warning'] = $this->language->get('error_default');
			}

			$store_total = $this->model_sale_order->getTotalOrdersByStoreId($store_id);

			if ($store_total) {
				$this->error['warning'] = sprintf($this->language->get('error_store'), $store_total);
			}
		}

		return !$this->error;
	}
}
