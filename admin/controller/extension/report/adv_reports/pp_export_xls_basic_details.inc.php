<?php
	ini_set("memory_limit","256M");
	
	$results = $export_data['results'];
	if ($results) {
		
		if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
		$this->load->model('extension/report/adv_products');
		$option_names = $this->model_extension_report_adv_products->getOrderOptionsNames();
		}
	
		// we use our own error handler
		global $config;
		global $log;
		$config = $this->config;
		$log = $this->log;
		set_error_handler('error_handler_for_export',E_ALL);
		register_shutdown_function('fatal_error_shutdown_handler_for_export');
		
		if (!isset($_GET['cron'])) {
			// Creating a workbook
			$workbook = new Spreadsheet_Excel_Writer();
			$workbook->setTempDir(DIR_CACHE);
			$workbook->setVersion(8); // Use Excel97/2000 BIFF8 Format
		
			// sending HTTP headers
			$workbook->send('products_report_basic_details_'.date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").'.xls');
			$worksheet =& $workbook->addWorksheet('ADV Products Report');
			$worksheet->setInputEncoding('UTF-8');
			$worksheet->setZoom(90);	
		} else if (isset($_GET['cron'])) {	
			$file_path_parts = explode('/', $file_save_path);
			$file_path = dirname(DIR_APPLICATION);
			foreach ($file_path_parts as $file_path_part) {
				$file_path .= '/' . $file_path_part;
				if (!file_exists($file_path)) {
					mkdir($file_path, 0755);
					if (file_exists(DIR_DOWNLOAD . 'index.html')) {
						copy(DIR_DOWNLOAD  . 'index.html', $file_path . DIRECTORY_SEPARATOR . 'index.html');
					}
				}
			}
		
			if ($this->request->server['HTTPS']) {
				$server = HTTPS_CATALOG;
			} else {
				$server = HTTP_CATALOG;
			}
		
			$filename = $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xls";
			$file_to_download = $server . $file_save_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xls";
			$file = $file_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xls";		
		
			// Creating a workbook
			$workbook = new Spreadsheet_Excel_Writer($file);
			$workbook->setTempDir(DIR_CACHE);
			$workbook->setVersion(8); // Use Excel97/2000 BIFF8 Format
		
			// sending HTTP headers
			$worksheet =& $workbook->addWorksheet('ADV Products Report');
			$worksheet->setInputEncoding('UTF-8');
			$worksheet->setZoom(90);
		}

		// Formating a workbook
		if ($export_logo_criteria) {
		$workbook->setCustomColor(43, 219, 229, 241);
		$criteriaDateFormat =& $workbook->addFormat(array('Align' => 'left', 'FgColor' => '43'));	
		$criteriaTitleFormat =& $workbook->addFormat(array('Align' => 'left', 'FgColor' => '43', 'bold' => 1));
		$criteriaTitleFormat->setSize(24);
		$criteriaTitleFormat->setVAlign('vcenter');
		$criteriaFilterFormat1 =& $workbook->addFormat(array('Align' => 'right', 'FgColor' => '43', 'bold' => 1));
		$criteriaFilterFormat1->setVAlign('top');
		$criteriaFilterFormat2 =& $workbook->addFormat(array('Align' => 'left', 'FgColor' => '43'));
		$criteriaFilterFormat2->setVAlign('top');
		$criteriaFilterFormat2->setTextWrap();
		$criteriaAddressFormat =& $workbook->addFormat(array('Align' => 'left', 'FgColor' => '43'));
		$criteriaAddressFormat->setSize(14);
		$criteriaAddressFormat->setVAlign('vcenter');
		$criteriaAddressFormat->setTextWrap();		
		}
		
		$textFormat =& $workbook->addFormat(array('Align' => 'left', 'NumFormat' => "@"));
		
		$numberFormat =& $workbook->addFormat(array('Align' => 'right'));
		if ($filter_report == 'products_abandoned_orders') {
		$abnumberFormat =& $workbook->addFormat(array('Align' => 'right'));
		$abnumberFormat->setStrikeOut();
		}
		
		$priceFormat =& $workbook->addFormat(array('Align' => 'right'));
		$priceFormat->setNumFormat('0.00');
		if ($filter_report == 'products_abandoned_orders') {
		$priceFormat->setStrikeOut();	
		}

		$workbook->setCustomColor(27, 255, 255, 204);
		$soldColumnFormat =& $workbook->addFormat(array('Align' => 'right', 'FgColor' => '27', 'bordercolor' => 'silver'));
		$soldColumnFormat->setBorder(1);
		if ($filter_report == 'products_abandoned_orders') {
		$soldColumnFormat->setStrikeOut();
		}		
		$percentFormat =& $workbook->addFormat(array('Align' => 'right', 'FgColor' => '27', 'bordercolor' => 'silver'));
		$percentFormat->setBorder(1);	
		$percentFormat->setNumFormat('0.00%');
		if ($filter_report == 'products_abandoned_orders') {
		$percentFormat->setStrikeOut();
		}
		
		$boxFormatText =& $workbook->addFormat(array('bold' => 1));
		$boxFormatNumber =& $workbook->addFormat(array('Align' => 'right', 'bold' => 1));

		// Set the column widths
		$j = 0;
		if ($filter_group == 'year') {			
		$worksheet->setMerge(0, 1, 0, 1);
		$worksheet->setColumn($j,$j++,10);
		} elseif ($filter_group == 'quarter') {
		$worksheet->setColumn($j,$j++,10);
		$worksheet->setColumn($j,$j++,10);	
		} elseif ($filter_group == 'month') {
		$worksheet->setColumn($j,$j++,10);
		$worksheet->setColumn($j,$j++,13);
		} elseif ($filter_group == 'day') {
		$worksheet->setMerge(0, 1, 0, 1);
		$worksheet->setColumn($j,$j++,13);
		} elseif ($filter_group == 'order') {
		$worksheet->setColumn($j,$j++,10);
		$worksheet->setColumn($j,$j++,13);
		} else {
		$worksheet->setColumn($j,$j++,13);
		$worksheet->setColumn($j,$j++,13);
		}		
		if ($filter_report == 'manufacturers' or $filter_report == 'categories') {
		if ($filter_report == 'manufacturers') {
		$worksheet->setColumn($j,$j++,20);
		} elseif ($filter_report == 'categories') {
		$worksheet->setColumn($j,$j++,20);
		}
		in_array('cm_orders', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('cm_customers', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cm_total_tax', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cm_app', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('cm_refunds', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cm_reward_points', $advpp_settings_cm_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		} elseif ($filter_report == 'products_options') {
		$worksheet->setColumn($j,$j++,25);
		in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		$worksheet->setColumn($j,$j++,10);
		$worksheet->setColumn($j,$j++,10);
		} else {
		in_array('mv_id', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,8) : '';
		in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,25) : '';
		if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
		if ($option_names) {
		foreach ($option_names as $option_name) {
		in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		}
		}
		}
		in_array('mv_sku', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_upc', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_ean', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_jan', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_isbn', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_mpn', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_model', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_category', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('mv_attribute', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('mv_status', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_location', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('mv_tax_class', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('mv_viewed', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_price', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_total_tax', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_app', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('mv_refunds', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('mv_reward_points', $advpp_settings_mv_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		}
		if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
		in_array('pl_prod_order_id', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('pl_prod_date_added', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_inv_no', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_id', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('pl_prod_sku', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_model', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_name', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,25) : '';
		in_array('pl_prod_option', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		if ($filter_report == 'manufacturers') {
		in_array('pl_prod_category', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,18) : '';	
		} elseif ($filter_report == 'categories') {
		in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		} elseif ($filter_report == 'products_options') {
		in_array('pl_prod_category', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,18) : '';	
		in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,18) : ''; 
		}
		in_array('pl_prod_attributes', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,20) : '';		
		in_array('pl_prod_currency', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('pl_prod_price', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_quantity', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_tax', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		} else {
		in_array('ol_order_order_id', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('ol_order_date_added', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('ol_order_inv_no', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('ol_order_customer', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('ol_order_email', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('ol_order_customer_group', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('ol_order_shipping_method', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('ol_order_payment_method', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('ol_order_status', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('ol_order_store', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('ol_order_currency', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,10) : '';
		in_array('ol_prod_price', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('ol_prod_quantity', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('ol_prod_tax', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns) ? $worksheet->setColumn($j,$j++,13) : '';
		}	
		in_array('cl_customer_cust_id', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,11) : '';			 
		in_array('cl_billing_name', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('cl_billing_company', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_billing_address_1', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_billing_address_2', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_billing_city', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_billing_zone', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cl_billing_postcode', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,17) : '';
		in_array('cl_billing_country', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_customer_telephone', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cl_shipping_name', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,18) : '';
		in_array('cl_shipping_company', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_shipping_address_1', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_shipping_address_2', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_shipping_city', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';
		in_array('cl_shipping_zone', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,15) : '';
		in_array('cl_shipping_postcode', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,17) : '';
		in_array('cl_shipping_country', $advpp_settings_cl_columns) ? $worksheet->setColumn($j,$j++,20) : '';

		if ($export_logo_criteria) {
		$worksheet->setMerge(0, 0, 0, 1);
		$worksheet->writeString(0, 0, '', $criteriaDateFormat);			
		$worksheet->setMerge(0, 2, 0, $j-1);
		$worksheet->writeString(0, 2, $this->language->get('text_report_date').": ".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d H:i:s" : "Y-m-d h:i:s A"), $criteriaDateFormat);
		$worksheet->setRow(1, 50);	
		$worksheet->setMerge(1, 0, 1, 1);
		$worksheet->writeString(1, 0, '', $criteriaTitleFormat);			
		$worksheet->setMerge(1, 2, 1, $j-1);
		$worksheet->writeString(1, 2, $this->language->get('adv_ext_name'), $criteriaTitleFormat);
		$worksheet->setRow(2, 30);
		$worksheet->setMerge(2, 0, 2, 1);
		$worksheet->writeString(2, 0, '', $criteriaAddressFormat);			
		$worksheet->setMerge(2, 2, 2, $j-1);
		$worksheet->writeString(2, 2, $this->config->get('config_name').", ".$this->config->get('config_address').", ".$this->language->get('text_email')."".$this->config->get('config_email').", ".$this->language->get('text_telephone')."".$this->config->get('config_telephone'), $criteriaAddressFormat);		
		$worksheet->setRow(3, 40);		
		$worksheet->setMerge(3, 0, 3, 1);
		$worksheet->writeString(3, 0, $this->language->get('text_report_criteria'), $criteriaFilterFormat1);		
		$worksheet->setMerge(3, 2, 3, $j-1);
			$filter_criteria = "";
			if ($filter_report) {	
				if ($filter_report == 'all_products_with_without_orders') {
					$filter_report_name = $this->language->get('text_all_products')." ".$this->language->get('text_with_without_orders');
				} elseif ($filter_report == 'products_purchased_without_options') {
					$filter_report_name = $this->language->get('text_products_purchased')." ".$this->language->get('text_without_options');
				} elseif ($filter_report == 'products_purchased_with_options') {
					$filter_report_name = $this->language->get('text_products_purchased')." ".$this->language->get('text_with_options');
				} elseif ($filter_report == 'new_products_purchased') {
					$filter_report_name = $this->language->get('text_new_products_purchased');
				} elseif ($filter_report == 'old_products_purchased') {
					$filter_report_name = $this->language->get('text_old_products_purchased');
				} elseif ($filter_report == 'products_without_orders') {
					$filter_report_name = $this->language->get('text_products')." ".$this->language->get('text_without_orders');
				} elseif ($filter_report == 'products_options') {
					$filter_report_name = $this->language->get('text_product_options')." ".$this->language->get('text_products_options');
				} elseif ($filter_report == 'categories') {
					$filter_report_name = $this->language->get('text_categories');						
				} elseif ($filter_report == 'manufacturers') {
					$filter_report_name = $this->language->get('text_manufacturers');
				} elseif ($filter_report == 'products_abandoned_orders') {
					$filter_report_name = $this->language->get('text_products_abandoned_orders');					
				} elseif ($filter_report == 'products_shopping_carts') {
					$filter_report_name = $this->language->get('text_products_shopping_carts');					
				} elseif ($filter_report == 'products_wishlists') {
					$filter_report_name = $this->language->get('text_products_wishlists');					
				}	
				$filter_criteria .= $this->language->get('entry_report')." ". strip_tags($filter_report_name) ."; ";
			}
			if ($filter_details) {
				if ($filter_details == 'no_details') {
					$filter_details_name = $this->language->get('text_no_details');
				} elseif ($filter_details == 'basic_details') {
					$filter_details_name = $this->language->get('text_basic_details');
				} elseif ($filter_details == 'all_details_products') {
					$filter_details_name = $this->language->get('text_all_details')." ".$this->language->get('text_all_details_products');				
				} elseif ($filter_details == 'all_details_orders') {
					$filter_details_name = $this->language->get('text_all_details')." ".$this->language->get('text_all_details_orders');		
				}					
				$filter_criteria .= $this->language->get('entry_show_details')." ".$filter_details_name."; ";
			}
			if ($filter_group) {	
				if ($filter_group == 'no_group') {
					$filter_group_name = $this->language->get('text_no_group');
				} elseif ($filter_group == 'year') {
					$filter_group_name = $this->language->get('text_year');
				} elseif ($filter_group == 'quarter') {
					$filter_group_name = $this->language->get('text_quarter');	
				} elseif ($filter_group == 'month') {
					$filter_group_name = $this->language->get('text_month');
				} elseif ($filter_group == 'week') {
					$filter_group_name = $this->language->get('text_week');
				} elseif ($filter_group == 'day') {
					$filter_group_name = $this->language->get('text_day');
				} elseif ($filter_group == 'order') {
					$filter_group_name = $this->language->get('text_order');					
				}				
				$filter_criteria .= $this->language->get('entry_group')." ".$filter_group_name."; ";
			}
			if ($filter_sort) {	
				if ($filter_sort == 'date') {
					$filter_sort_name = $this->language->get('column_date');
				} elseif ($filter_sort == 'id') {
					$filter_sort_name = $this->language->get('column_id');
				} elseif ($filter_sort == 'sku') {
					$filter_sort_name = $this->language->get('column_sku');	
				} elseif ($filter_sort == 'upc') {
					$filter_sort_name = $this->language->get('column_upc');	
				} elseif ($filter_sort == 'ean') {
					$filter_sort_name = $this->language->get('column_ean');	
				} elseif ($filter_sort == 'jan') {
					$filter_sort_name = $this->language->get('column_jan');	
				} elseif ($filter_sort == 'isbn') {
					$filter_sort_name = $this->language->get('column_isbn');	
				} elseif ($filter_sort == 'mpn') {
					$filter_sort_name = $this->language->get('column_mpn');	
				} elseif ($filter_sort == 'name') {
					$filter_sort_name = $this->language->get('column_prod_name');
				} elseif ($filter_sort == 'model') {
					$filter_sort_name = $this->language->get('column_model');
				} elseif ($filter_sort == 'category') {
					$filter_sort_name = $this->language->get('column_category');
				} elseif ($filter_sort == 'manufacturer') {
					$filter_sort_name = $this->language->get('column_manufacturer');	
				} elseif ($filter_sort == 'attribute') {
					$filter_sort_name = $this->language->get('column_attribute');
				} elseif ($filter_sort == 'status') {
					$filter_sort_name = $this->language->get('column_status');	
				} elseif ($filter_sort == 'location') {
					$filter_sort_name = $this->language->get('column_location');
				} elseif ($filter_sort == 'tax_class') {
					$filter_sort_name = $this->language->get('column_tax_class');
				} elseif ($filter_sort == 'price') {
					$filter_sort_name = $this->language->get('column_price');
				} elseif ($filter_sort == 'viewed') {
					$filter_sort_name = $this->language->get('column_viewed');
				} elseif ($filter_sort == 'orders') {
					$filter_sort_name = $this->language->get('column_orders');
				} elseif ($filter_sort == 'customers') {
					$filter_sort_name = $this->language->get('column_customers');
				} elseif ($filter_sort == 'stock_quantity') {
					$filter_sort_name = $this->language->get('column_stock_quantity');
				} elseif ($filter_sort == 'cart_quantity') {
					$filter_sort_name = $this->language->get('column_cart_quantity');
				} elseif ($filter_sort == 'wishlist_quantity') {
					$filter_sort_name = $this->language->get('column_wishlist_quantity');						
				} elseif ($filter_sort == 'sold_quantity') {
					$filter_sort_name = $this->language->get('column_sold_quantity');
				} elseif ($filter_sort == 'total_excl_vat') {
					$filter_sort_name = $this->language->get('column_prod_total_excl_vat');	
				} elseif ($filter_sort == 'total_tax') {
					$filter_sort_name = $this->language->get('column_total_tax');
				} elseif ($filter_sort == 'total_incl_vat') {
					$filter_sort_name = $this->language->get('column_prod_total_incl_vat');	
				} elseif ($filter_sort == 'app') {
					$filter_sort_name = $this->language->get('column_app');
				} elseif ($filter_sort == 'refunds') {
					$filter_sort_name = $this->language->get('column_product_refunds');
				} elseif ($filter_sort == 'reward_points') {
					$filter_sort_name = $this->language->get('column_product_reward_points');	
				}			
				if ($filter_order == 'asc') {
					$filter_order_name = $this->language->get('text_asc');
				} elseif ($filter_order == 'desc') {
					$filter_order_name = $this->language->get('text_desc');
				}				
				$filter_criteria .= $this->language->get('entry_sort_by')." ".$filter_sort_name." ".$filter_order_name."; ";
			}
			if ($filter_limit) {	
				$filter_criteria .= $this->language->get('entry_limit')." ".$filter_limit."; ";
			}	
			$filter_criteria .= "\n";
			if ($filter_range) {	
				if ($filter_range == 'custom') {
					$filter_range_name = $this->language->get('stat_custom');
				} elseif ($filter_range == 'today') {
					$filter_range_name = $this->language->get('stat_today');
				} elseif ($filter_range == 'yesterday') {
					$filter_range_name = $this->language->get('stat_yesterday');	
				} elseif ($filter_range == 'week') {
					$filter_range_name = $this->language->get('stat_week');
				} elseif ($filter_range == 'month') {
					$filter_range_name = $this->language->get('stat_month');
				} elseif ($filter_range == 'quarter') {
					$filter_range_name = $this->language->get('stat_quarter');
				} elseif ($filter_range == 'year') {
					$filter_range_name = $this->language->get('stat_year');	
				} elseif ($filter_range == 'current_week') {
					$filter_range_name = $this->language->get('stat_current_week');
				} elseif ($filter_range == 'current_month') {
					$filter_range_name = $this->language->get('stat_current_month');	
				} elseif ($filter_range == 'current_quarter') {
					$filter_range_name = $this->language->get('stat_current_quarter');
				} elseif ($filter_range == 'current_year') {
					$filter_range_name = $this->language->get('stat_current_year');
				} elseif ($filter_range == 'last_week') {
					$filter_range_name = $this->language->get('stat_last_week');
				} elseif ($filter_range == 'last_month') {
					$filter_range_name = $this->language->get('stat_last_month');	
				} elseif ($filter_range == 'last_quarter') {
					$filter_range_name = $this->language->get('stat_last_quarter');
				} elseif ($filter_range == 'last_year') {
					$filter_range_name = $this->language->get('stat_last_year');
				} elseif ($filter_range == 'all_time') {
					$filter_range_name = $this->language->get('stat_all_time');					
				}				
				$filter_criteria .= $this->language->get('entry_range')." ".$filter_range_name;
				if ($filter_date_start) {	
					$filter_criteria .= " [".$this->language->get('entry_date_start')." ".$filter_date_start;
				}
				if ($filter_date_end) {	
					$filter_criteria .= ", ".$this->language->get('entry_date_end')." ".$filter_date_end."]";
				}
				$filter_criteria .= "; ";
			}
			if ($filter_order_status_id) {	
				$filter_criteria .= $this->language->get('entry_status')." ".$filter_order_status_id;
				if ($filter_status_date_start) {	
					$filter_criteria .= " [".$this->language->get('entry_date_start')." ".$filter_status_date_start;
				}
				if ($filter_status_date_end) {	
					$filter_criteria .= ", ".$this->language->get('entry_date_end')." ".$filter_status_date_end."]";
				}
				$filter_criteria .= "; ";				
			}
			if ($filter_order_id_from or $filter_order_id_to) {
				$filter_criteria .= $this->language->get('entry_order_id').": ".$filter_order_id_from."-".$filter_order_id_to."; ";
			}
			if ($filter_prod_price_min or $filter_prod_price_max) {
				$filter_criteria .= $this->language->get('entry_price_value').": ".$filter_prod_price_min."-".$filter_prod_price_max."; ";
			}
			$filter_criteria .= "\n";
			if ($filter_store_id) {	
				$filter_criteria .= $this->language->get('entry_store')." ".$filter_store_id."; ";
			}
			if ($filter_currency) {	
				$filter_criteria .= $this->language->get('entry_currency')." ".$filter_currency."; ";
			}
			if ($filter_taxes) {	
				$filter_criteria .= $this->language->get('entry_tax')." ".$filter_taxes."; ";
			}
			if ($filter_tax_classes) {	
				$filter_criteria .= $this->language->get('entry_tax_classes')." ".$filter_tax_classes."; ";
			}
			if ($filter_geo_zones) {	
				$filter_criteria .= $this->language->get('entry_geo_zone')." ".$filter_geo_zones."; ";
			}
			if ($filter_customer_group_id) {	
				$filter_criteria .= $this->language->get('entry_customer_group')." ".$filter_customer_group_id."; ";
			}		
			if ($filter_customer_name) {	
				$filter_criteria .= $this->language->get('entry_customer_name')." ".$filter_customer_name."; ";
			}
			if ($filter_customer_email) {	
				$filter_criteria .= $this->language->get('entry_customer_email')." ".$filter_customer_email."; ";
			}
			if ($filter_customer_telephone) {	
				$filter_criteria .= $this->language->get('entry_customer_telephone')." ".$filter_customer_telephone."; ";
			}
			if ($filter_ip) {	
				$filter_criteria .= $this->language->get('entry_ip')." ".$filter_ip."; ";
			}
			if ($filter_payment_company) {	
				$filter_criteria .= $this->language->get('entry_payment_company')." ".$filter_payment_company."; ";
			}
			if ($filter_payment_address) {	
				$filter_criteria .= $this->language->get('entry_payment_address')." ".$filter_payment_address."; ";
			}
			if ($filter_payment_city) {	
				$filter_criteria .= $this->language->get('entry_payment_city')." ".$filter_payment_city."; ";
			}
			if ($filter_payment_zone) {	
				$filter_criteria .= $this->language->get('entry_payment_zone')." ".$filter_payment_zone."; ";
			}
			if ($filter_payment_postcode) {	
				$filter_criteria .= $this->language->get('entry_payment_postcode')." ".$filter_payment_postcode."; ";
			}
			if ($filter_payment_country) {	
				$filter_criteria .= $this->language->get('entry_payment_country')." ".$filter_payment_country."; ";
			}
			if ($filter_payment_method) {	
				$filter_criteria .= $this->language->get('entry_payment_method')." ".$filter_payment_method."; ";
			}
			if ($filter_shipping_company) {	
				$filter_criteria .= $this->language->get('entry_shipping_company')." ".$filter_shipping_company."; ";
			}
			if ($filter_shipping_address) {	
				$filter_criteria .= $this->language->get('entry_shipping_address')." ".$filter_shipping_address."; ";
			}
			if ($filter_shipping_city) {	
				$filter_criteria .= $this->language->get('entry_shipping_city')." ".$filter_shipping_city."; ";
			}
			if ($filter_shipping_zone) {	
				$filter_criteria .= $this->language->get('entry_shipping_zone')." ".$filter_shipping_zone."; ";
			}
			if ($filter_shipping_postcode) {	
				$filter_criteria .= $this->language->get('entry_shipping_postcode')." ".$filter_shipping_postcode."; ";
			}
			if ($filter_shipping_country) {	
				$filter_criteria .= $this->language->get('entry_shipping_country')." ".$filter_shipping_country."; ";
			}
			if ($filter_shipping_method) {	
				$filter_criteria .= $this->language->get('entry_shipping_method')." ".$filter_shipping_method."; ";
			}
			if ($filter_category) {	
				$filter_criteria .= $this->language->get('entry_category')." ".$filter_category."; ";
			}
			if ($filter_manufacturer) {	
				$filter_criteria .= $this->language->get('entry_manufacturer')." ".$filter_manufacturer."; ";
			}
			if ($filter_sku) {	
				$filter_criteria .= $this->language->get('entry_sku')." ".$filter_sku."; ";
			}
			if ($filter_upc) {	
				$filter_criteria .= $this->language->get('entry_upc')." ".$filter_upc."; ";
			}
			if ($filter_ean) {	
				$filter_criteria .= $this->language->get('entry_ean')." ".$filter_ean."; ";
			}
			if ($filter_jan) {	
				$filter_criteria .= $this->language->get('entry_jan')." ".$filter_jan."; ";
			}
			if ($filter_isbn) {	
				$filter_criteria .= $this->language->get('entry_isbn')." ".$filter_isbn."; ";
			}
			if ($filter_mpn) {	
				$filter_criteria .= $this->language->get('entry_mpn')." ".$filter_mpn."; ";
			}
			if ($filter_product_name) {	
				$filter_criteria .= $this->language->get('entry_product')." ".$filter_product_name."; ";
			}
			if ($filter_model) {	
				$filter_criteria .= $this->language->get('entry_model')." ".$filter_model."; ";
			}
			if ($filter_option) {	
				$filter_criteria .= $this->language->get('entry_option')." ".$filter_option."; ";
			}	
			if ($filter_attribute) {	
				$filter_criteria .= $this->language->get('entry_attributes')." ".$filter_attribute."; ";
			}		
			if ($filter_product_status) {	
				$filter_criteria .= $this->language->get('entry_product_status')." ".$filter_product_status."; ";
			}				
			if ($filter_location) {	
				$filter_criteria .= $this->language->get('entry_location')." ".$filter_location."; ";
			}	
			if ($filter_coupon_name) {	
				$filter_criteria .= $this->language->get('entry_coupon_name')." ".$filter_coupon_name."; ";
			}		
			if ($filter_coupon_code) {	
				$filter_criteria .= $this->language->get('entry_coupon_code')." ".$filter_coupon_code."; ";
			}	
			if ($filter_voucher_code) {	
				$filter_criteria .= $this->language->get('entry_voucher_code')." ".$filter_voucher_code."; ";
			}	
			if ($filter_campaign_name) {	
				$filter_criteria .= $this->language->get('entry_campaign_name')." ".$filter_campaign_name."; ";
			}		
			if ($filter_campaign_code) {	
				$filter_criteria .= $this->language->get('entry_campaign_code')." ".$filter_campaign_code."; ";
			}
		$worksheet->writeString(3, 2, $filter_criteria, $criteriaFilterFormat2);			
		}
		
		// The order headings row
		$export_logo_criteria ? $i = 4 : $i = 0;
		$j = 0;	
		if ($filter_group == 'year') {	
		$worksheet->writeString($i, $j++, $this->language->get('column_year'), $boxFormatText);
		} elseif ($filter_group == 'quarter') {
		$worksheet->writeString($i, $j++, $this->language->get('column_year'), $boxFormatText);
		$worksheet->writeString($i, $j++, $this->language->get('column_quarter'), $boxFormatText);
		} elseif ($filter_group == 'month') {
		$worksheet->writeString($i, $j++, $this->language->get('column_year'), $boxFormatText);
		$worksheet->writeString($i, $j++, $this->language->get('column_month'), $boxFormatText);
		} elseif ($filter_group == 'day') {
		$worksheet->writeString($i, $j++, $this->language->get('column_date'), $boxFormatText);
		} elseif ($filter_group == 'order') {
		$worksheet->writeString($i, $j++, $this->language->get('column_order_order_id'), $boxFormatText);
		$worksheet->writeString($i, $j++, $this->language->get('column_order_date_added'), $boxFormatText);
		} else {
		$worksheet->writeString($i, $j++, $this->language->get('column_date_start'), $boxFormatText);
		$worksheet->writeString($i, $j++, $this->language->get('column_date_end'), $boxFormatText);
		}
				
		if ($filter_report == 'manufacturers' or $filter_report == 'categories') {
			
		if ($filter_report == 'manufacturers') {
		$worksheet->writeString($i, $j++, $this->language->get('column_manufacturer'), $boxFormatText);	
		} elseif ($filter_report == 'categories') {
		$worksheet->writeString($i, $j++, $this->language->get('column_category'), $boxFormatText);	
		}
		in_array('cm_orders', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_orders'), $boxFormatNumber) : '';
		in_array('cm_customers', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_customers'), $boxFormatNumber) : '';
		in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_sold_quantity'), $boxFormatNumber) : '';
		in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_sold_percent'), $boxFormatNumber) : '';
		in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_excl_vat'), $boxFormatNumber) : '';
		in_array('cm_total_tax', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_total_tax'), $boxFormatNumber) : '';
		in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_incl_vat'), $boxFormatNumber) : '';
		in_array('cm_app', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_app'), $boxFormatNumber) : '';	
		in_array('cm_refunds', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_product_refunds'), $boxFormatNumber) : '';
		in_array('cm_reward_points', $advpp_settings_cm_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_product_reward_points'), $boxFormatNumber) : '';
		
		} elseif ($filter_report == 'products_options') {
		
		$worksheet->writeString($i, $j++, $this->language->get('column_prod_option'), $boxFormatText);
		in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_orders'), $boxFormatNumber) : '';
		in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_customers'), $boxFormatNumber) : '';
		$worksheet->writeString($i, $j++, $this->language->get('column_sold_quantity'), $boxFormatNumber);
		$worksheet->writeString($i, $j++, $this->language->get('column_sold_percent'), $boxFormatNumber);
			
		} else {
			
		in_array('mv_id', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_id'), $boxFormatText) : '';
		in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_pname'), $boxFormatText) : '';
		if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
		$n = 0;
		if ($option_names) {
		foreach ($option_names as $option_name) {
		in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $option_name['name'], $boxFormatText) : '';
		$n++;
		}		 
		}				
		}
		in_array('mv_sku', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_sku'), $boxFormatText) : '';
		in_array('mv_upc', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_upc'), $boxFormatText) : '';
		in_array('mv_ean', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_ean'), $boxFormatText) : '';
		in_array('mv_jan', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_jan'), $boxFormatText) : '';
		in_array('mv_isbn', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_isbn'), $boxFormatText) : '';
		in_array('mv_mpn', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_mpn'), $boxFormatText) : '';
		in_array('mv_model', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_model'), $boxFormatText) : '';
		in_array('mv_category', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_category'), $boxFormatText) : '';
		in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_manufacturer'), $boxFormatText) : '';
		in_array('mv_attribute', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_attribute'), $boxFormatText) : '';
		in_array('mv_status', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_status'), $boxFormatText) : '';
		in_array('mv_location', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_location'), $boxFormatText) : '';
		in_array('mv_tax_class', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_tax_class'), $boxFormatText) : '';
		in_array('mv_viewed', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_viewed'), $boxFormatNumber) : '';
		in_array('mv_price', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_price'), $boxFormatNumber) : '';
		in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_stock_quantity'), $boxFormatNumber) : '';
		in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_orders'), $boxFormatNumber) : '';
		in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_customers'), $boxFormatNumber) : '';
		in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_sold_quantity'), $boxFormatNumber) : '';
		in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_sold_percent'), $boxFormatNumber) : '';
		in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_excl_vat'), $boxFormatNumber) : '';
		in_array('mv_total_tax', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_total_tax'), $boxFormatNumber) : '';
		in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_incl_vat'), $boxFormatNumber) : '';
		in_array('mv_app', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_app'), $boxFormatNumber) : '';	
		in_array('mv_refunds', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_product_refunds'), $boxFormatNumber) : '';
		in_array('mv_reward_points', $advpp_settings_mv_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_product_reward_points'), $boxFormatNumber) : '';
		}
		
		if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
			
		in_array('pl_prod_order_id', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_order_id'), $boxFormatText) : '';
		in_array('pl_prod_date_added', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_date_added'), $boxFormatText) : '';
		in_array('pl_prod_inv_no', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_inv_no'), $boxFormatText) : '';
		in_array('pl_prod_id', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_id'), $boxFormatText) : '';
		in_array('pl_prod_sku', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_sku'), $boxFormatText) : '';
		in_array('pl_prod_model', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_model'), $boxFormatText) : '';	
		in_array('pl_prod_name', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_name'), $boxFormatText) : '';
		in_array('pl_prod_option', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_option'), $boxFormatText) : '';
		if ($filter_report == 'manufacturers') {
		in_array('pl_prod_category', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_category'), $boxFormatText) : '';
		} elseif ($filter_report == 'categories') {
		in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_manu'), $boxFormatText) : '';			 
		} elseif ($filter_report == 'products_options') {
		in_array('pl_prod_category', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_category'), $boxFormatText) : '';
		in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_manu'), $boxFormatText) : '';
		}
		in_array('pl_prod_attributes', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_attributes'), $boxFormatText) : '';
		in_array('pl_prod_currency', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_currency'), $boxFormatText) : '';
		in_array('pl_prod_price', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_price'), $boxFormatNumber) : '';		
		in_array('pl_prod_quantity', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_quantity'), $boxFormatNumber) : '';
		in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_excl_vat'), $boxFormatNumber) : '';
		in_array('pl_prod_tax', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_tax'), $boxFormatNumber) : '';
		in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_incl_vat'), $boxFormatNumber) : '';
		
		} else {
			
		in_array('ol_order_order_id', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_order_id'), $boxFormatText) : '';
		in_array('ol_order_date_added', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_date_added'), $boxFormatText) : '';
		in_array('ol_order_inv_no', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_inv_no'), $boxFormatText) : '';
		in_array('ol_order_customer', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_customer'), $boxFormatText) : '';
		in_array('ol_order_email', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_email'), $boxFormatText) : '';
		in_array('ol_order_customer_group', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_customer_group'), $boxFormatText) : '';
		in_array('ol_order_shipping_method', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_shipping_method'), $boxFormatText) : '';
		in_array('ol_order_payment_method', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_payment_method'), $boxFormatText) : '';
		in_array('ol_order_status', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_status'), $boxFormatText) : '';
		in_array('ol_order_store', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_store'), $boxFormatText) : '';	
		in_array('ol_order_currency', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_order_currency'), $boxFormatText) : '';	
		in_array('ol_prod_price', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_price'), $boxFormatNumber) : '';
		in_array('ol_prod_quantity', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_quantity'), $boxFormatNumber) : '';
		in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_excl_vat'), $boxFormatNumber) : '';
		in_array('ol_prod_tax', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_tax'), $boxFormatNumber) : '';
		in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_prod_total_incl_vat'), $boxFormatNumber) : '';
		
		}
		
		in_array('cl_customer_cust_id', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_customer_cust_id'), $boxFormatText) : '';
		in_array('cl_billing_name', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_name')), $boxFormatText) : '';
		in_array('cl_billing_company', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_company')), $boxFormatText) : '';
		in_array('cl_billing_address_1', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_address_1')), $boxFormatText) : '';
		in_array('cl_billing_address_2', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_address_2')), $boxFormatText) : '';
		in_array('cl_billing_city', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_city')), $boxFormatText) : '';
		in_array('cl_billing_zone', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_zone')), $boxFormatText) : '';
		in_array('cl_billing_postcode', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_postcode')), $boxFormatText) : '';
		in_array('cl_billing_country', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_billing_country')), $boxFormatText) : '';
		in_array('cl_customer_telephone', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, $this->language->get('column_customer_telephone'), $boxFormatText) : '';
		in_array('cl_shipping_name', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_name')), $boxFormatText) : '';
		in_array('cl_shipping_company', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_company')), $boxFormatText) : '';
		in_array('cl_shipping_address_1', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_address_1')), $boxFormatText) : '';
		in_array('cl_shipping_address_2', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_address_2')), $boxFormatText) : '';
		in_array('cl_shipping_city', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_city')), $boxFormatText) : '';
		in_array('cl_shipping_zone', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_zone')), $boxFormatText) : '';
		in_array('cl_shipping_postcode', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_postcode')), $boxFormatText) : '';
		in_array('cl_shipping_country', $advpp_settings_cl_columns) ? $worksheet->writeString($i, $j++, strip_tags($this->language->get('column_shipping_country')), $boxFormatText) : '';
		
		// The actual orders data
		$i += 1;
		$j = 0;
		
			foreach ($results as $result) {
			$excelRow = $i+1;
				if ($filter_group == 'year') {	
				$worksheet->write($i, $j++, $result['year'], $textFormat);
				} elseif ($filter_group == 'quarter') {
				$worksheet->write($i, $j++, $result['year'], $textFormat);
				$worksheet->write($i, $j++, 'Q' . $result['quarter'], $textFormat);		
				} elseif ($filter_group == 'month') {
				$worksheet->write($i, $j++, $result['year'], $textFormat);
				$worksheet->write($i, $j++, $result['month'], $textFormat);
				} elseif ($filter_group == 'day') {
				$worksheet->write($i, $j++, $result['date_start'], $textFormat);
				} elseif ($filter_group == 'order') {
				$worksheet->write($i, $j++, $result['order_id'], $textFormat);
				$worksheet->write($i, $j++, $result['date_start'], $textFormat);
				} else {
				$worksheet->write($i, $j++, $result['date_start'], $textFormat);
				$worksheet->write($i, $j++, $result['date_end'], $textFormat);
				}
								
				if ($filter_report == 'manufacturers' or $filter_report == 'categories') {
					
				if ($filter_report == 'manufacturers') {
				$worksheet->write($i, $j++, html_entity_decode($result['manufacturers']));
				} elseif ($filter_report == 'categories') {
				$worksheet->write($i, $j++, html_entity_decode($result['categories']));
				}
				in_array('cm_orders', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['orders']) : '';
				in_array('cm_customers', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['customers']) : '';
				in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['sold_quantity'], $soldColumnFormat) : '';
				in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2)/100 : 0 / 100, $percentFormat) : '';
				in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['total_excl_vat_raw'] != NULL ? $result['total_excl_vat_raw'] : '0.00', $priceFormat) : '';
				in_array('cm_total_tax', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['total_tax_raw'] != NULL ? $result['total_tax_raw'] : '0.00', $priceFormat) : '';
				in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['total_incl_vat_raw'] != NULL ? $result['total_incl_vat_raw'] : '0.00', $priceFormat) : '';
				in_array('cm_app', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['app_raw'], $priceFormat) : '';
				in_array('cm_refunds', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['refunds_raw'] != NULL ? $result['refunds_raw'] : '0.00', $priceFormat) : '';
				in_array('cm_reward_points', $advpp_settings_cm_columns) ? $worksheet->write($i, $j++, $result['reward_points']) : '';
				
				} elseif ($filter_report == 'products_options') {
					
				$worksheet->write($i, $j++, $result['option_name']);
				in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['orders']) : '';
				in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['customers']) : '';	
				$worksheet->write($i, $j++, $result['sold_quantity'], $soldColumnFormat);
				$worksheet->write($i, $j++, $result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2)/100 : 0 / 100, $percentFormat);
	
				} else {
					
				in_array('mv_id', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['product_id'], $textFormat) : '';
				in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, html_entity_decode($result['name'])) : '';
				if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {	
				$t = $j;	
				if ($result['option']) {
				foreach ($result['option'] as $index => $option) {
				if ($option['name'] == $option_names[$index]['name']) {				
				in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $option['value']) : '';
				//in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $option['name'].': '.$option['value']) : '';				
				} else {
				foreach ($result['option'] as $option) {
				foreach ($option_names as $option_name) {			
				if ($option['name'] == $option_name['name']) {		
				in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $option['value']) : '';
				//in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $option['name'].': '.$option['value']) : '';	
				} else {
				in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, '') : '';	
				}			
				}
				}			
				}
				}	
				} else {
				foreach ($option_names as $option_name) {
				in_array('mv_name', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, '') : '';	
				}
				}
				$j=$t+$n;	
				}
				in_array('mv_sku', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['sku'], $textFormat) : '';
				in_array('mv_upc', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['upc'], $textFormat) : '';
				in_array('mv_ean', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['ean'], $textFormat) : '';
				in_array('mv_jan', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['jan'], $textFormat) : '';
				in_array('mv_isbn', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['isbn'], $textFormat) : '';
				in_array('mv_mpn', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['mpn'], $textFormat) : '';
				in_array('mv_model', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['model']) : '';
				in_array('mv_category', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, html_entity_decode($result['categories'])) : '';
				in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, html_entity_decode($result['manufacturers'])) : '';
				in_array('mv_attribute', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, html_entity_decode(str_replace('<br>','; ',$result['attribute']))) : '';
				in_array('mv_status', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['status']) : '';
				in_array('mv_location', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['location']) : '';
				in_array('mv_tax_class', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['tax_class']) : '';
				in_array('mv_viewed', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['viewed']) : '';
				if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
				if ($result['option']) {	
				$oprice = '';
				foreach ($result['option'] as $option) {
				$oprice .= sprintf('%0.2f', round($option['price'], 2)).'; ';
				}
				in_array('mv_price', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, sprintf('%0.2f', round($result['price_raw'], 2)) . " [" . rtrim($oprice, "; ") . "]", $priceFormat) : '';
				} else {
				in_array('mv_price', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['price_raw'], $priceFormat) : '';
				}
				} else {
				in_array('mv_price', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['price_raw'], $priceFormat) : '';
				}
				if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
				if ($result['option']) {	
				$oquantity = '';
				foreach ($result['option'] as $option) {
				$oquantity .= $option['quantity'].'; ';
				}
				in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['stock_quantity'] . " [" . rtrim($oquantity, "; ") . "]", $numberFormat) : '';
				} else {
				in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['stock_quantity']) : '';
				}
				} else {
				in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['stock_quantity']) : '';
				}
				in_array('mv_orders', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['orders']) : '';
				in_array('mv_customers', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['customers']) : '';	
				in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['sold_quantity'], $soldColumnFormat) : '';
				in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2)/100 : 0 / 100, $percentFormat) : '';
				in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['total_excl_vat_raw'] != NULL ? $result['total_excl_vat_raw'] : '0.00', $priceFormat) : '';
				in_array('mv_total_tax', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['total_tax_raw'] != NULL ? $result['total_tax_raw'] : '0.00', $priceFormat) : '';
				in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['total_incl_vat_raw'] != NULL ? $result['total_incl_vat_raw'] : '0.00', $priceFormat) : '';
				in_array('mv_app', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['app_raw'], $priceFormat) : '';
				in_array('mv_refunds', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['refunds_raw'] != NULL ? $result['refunds_raw'] : '0.00', $priceFormat) : '';
				in_array('mv_reward_points', $advpp_settings_mv_columns) ? $worksheet->write($i, $j++, $result['reward_points'], $filter_report != 'products_abandoned_orders' ? $numberFormat : $abnumberFormat) : '';
				}
				
				if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {

				$d = $i;
				if (in_array('pl_prod_order_id', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_ord_id']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('pl_prod_date_added', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_ord_date']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('pl_prod_inv_no', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_inv_no']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('pl_prod_id', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_prod_id']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('pl_prod_sku', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_sku']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_model', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_model']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_name', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_name']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode($value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_option', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_option']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}				
				if ($filter_report == 'manufacturers') {
				if (in_array('pl_prod_category', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_category']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode(str_replace('&nbsp;','',$value)), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				} elseif ($filter_report == 'categories') {
				if (in_array('pl_prod_manu', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_manu']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode(str_replace('&nbsp;','',$value)), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				} elseif ($filter_report == 'products_options') {
				if (in_array('pl_prod_category', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_category']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode(str_replace('&nbsp;','',$value)), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}					
				if (in_array('pl_prod_manu', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_manu']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode(str_replace('&nbsp;','',$value)), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				}	
				if (in_array('pl_prod_attributes', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_attributes']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode(str_replace('&nbsp;','',$value)), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_currency', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_currency']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}		
				if (in_array('pl_prod_price', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_price']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_quantity', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_quantity']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_total_excl_vat']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('pl_prod_tax', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_tax']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['product_total_incl_vat']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				
				} else {
				
				$d = $i;
				if (in_array('ol_order_order_id', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_ord_id']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('ol_order_date_added', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_ord_date']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('ol_order_inv_no', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_inv_no']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_customer', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_name']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_email', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_email']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_customer_group', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_group']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_shipping_method', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_shipping_method']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_payment_method', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_payment_method']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_status', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_status']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_store', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_store']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, html_entity_decode($value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_order_currency', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_currency']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_prod_price', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_price']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_prod_quantity', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_quantity']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $filter_report != 'products_abandoned_orders' ? '' : $abnumberFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_total_excl_vat']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_prod_tax', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_tax']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['order_prod_total_incl_vat']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $priceFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				
				}

				if (in_array('cl_customer_cust_id', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['customer_cust_id']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, $value, $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_billing_name', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_name']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_billing_company', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_company']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_billing_address_1', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_address_1']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_billing_address_2', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_address_2']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_billing_city', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_city']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_billing_zone', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_zone']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_billing_postcode', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_postcode']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_billing_country', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['billing_country']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}		
				if (in_array('cl_customer_telephone', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['customer_telephone']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_name', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_name']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_company', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_company']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_address_1', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_address_1']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_address_2', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_address_2']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_shipping_city', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_city']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_zone', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_zone']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}
				if (in_array('cl_shipping_postcode', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_postcode']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}	
				if (in_array('cl_shipping_country', $advpp_settings_cl_columns)) {
				$i = $d;		
				$details = explode('<br>', $result['shipping_country']);	
				foreach ($details as $key => $value) {
				$c = $j;					
				$worksheet->write($i, $j++, str_replace('&nbsp;&nbsp;','',$value), $textFormat);
				$j = $c;
				$i += 1;		
				}
				$j++;
				}					
				
				$i += 1;
				$j = 0;
			}

		$freeze = ($export_logo_criteria ? array(5, 0, 5, 0) : array(1, 0, 1, 0));
		$worksheet->freezePanes($freeze);
		
		// Let's send the file		
		$workbook->close();
		
		// Clear the spreadsheet caches
		$this->clearSpreadsheetCache();

		if (isset($_GET['cron'])) {		
			$message  = '<html dir="ltr" lang="en">' . "\n";
			$message .= '  <head>' . "\n";
			$message .= '    <title>' . $this->language->get('text_email_subject') . '</title>' . "\n";
			$message .= '    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' . "\n";
			$message .= '  </head>' . "\n";
			$message .= '  <body>' . "\n";
			if ($export_file == 'save_on_server') {			
				$message .= '<p>' . $this->language->get('text_email_message_save_file') . ' <a href="' . $file_to_download . '">' . $filename . '</a>.</p><br />' . "\n";
			} else if ($export_file == 'send_to_email') {
				$message .= '<p>' . $this->language->get('text_email_message_send_file') . '</p><br />' . "\n";
			}
			$message .= '<p><b>' . $this->config->get('config_name') . '</b><br />' . "\n";
			$message .= $this->config->get('config_address') . '</p>' . "\n";			
			$message .= '</body>' . "\n";
			$message .= '</html>' . "\n";

			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
			$mail->setTo($email);
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
			$mail->setSubject(html_entity_decode($this->language->get('text_email_subject'), ENT_QUOTES, 'UTF-8'));
			if ($export_file == 'save_on_server') {			
				$mail->setHtml($message);
			} else if ($export_file == 'send_to_email') {
				$mail->setHtml($message);
				$mail->addAttachment($file);
			}			
			$mail->send();
		}		
		exit;
	}		
?>