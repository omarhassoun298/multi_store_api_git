<?php
	ini_set("memory_limit","256M");
				
	$results = $export_data['results'];
	if ($results) {

	// Custom Fields
	$this->load->model('extension/report/adv_sales_profit');
	$filter_data = array(
		'sort'  => 'cf.sort_order',
		'order' => 'ASC',
	);
	if (in_array('all_custom_fields', $advsop_settings_all_columns)) {	
	$custom_fields_name = $this->model_extension_report_adv_sales_profit->getCustomFieldsNames($filter_data);		
	}

	$csv_delimiter = strtr($export_csv_delimiter, array(
		'comma'			=> ",",
		'semi'			=> ";",
		'tab'			=> "\t"
	));
	$csv_enclosed = '"';
	$csv_row = "\n";
	
	$export_csv_all_details = $csv_enclosed . $this->language->get('column_order_order_id') . $csv_enclosed;
	$export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_date_added') . $csv_enclosed;
	in_array('all_order_inv_no', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_inv_no') . $csv_enclosed : '';	
	in_array('all_order_customer_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer') . $csv_enclosed : '';
	in_array('all_order_email', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_email') . $csv_enclosed : '';	
	in_array('all_order_customer_group', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer_group') . $csv_enclosed : '';	
	if ($filter_details == 'all_details_products') {
	in_array('all_prod_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_id') . $csv_enclosed : '';
	in_array('all_prod_sku', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_sku') . $csv_enclosed : '';
	in_array('all_prod_model', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_model') . $csv_enclosed : '';
	in_array('all_prod_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_name') . $csv_enclosed : '';
	in_array('all_prod_option', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_option') . $csv_enclosed : '';
	in_array('all_prod_attributes', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_attributes') . $csv_enclosed : '';
	in_array('all_prod_category', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_category') . $csv_enclosed : '';	
	in_array('all_prod_manu', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_manu') . $csv_enclosed : '';
	in_array('all_prod_supplier', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_supplier') . $csv_enclosed : '';	
	}
 	if ($filter_details == 'all_details_products' or $filter_details == 'all_details_orders') {
	in_array('all_prod_currency', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_currency') . $csv_enclosed : '';
	}
	if ($filter_details == 'all_details_products') {
	in_array('all_prod_price', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_price') . $csv_enclosed : '';
	in_array('all_prod_quantity', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_quantity') . $csv_enclosed : '';
	in_array('all_prod_total_excl_vat', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';		
	in_array('all_prod_tax', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_tax') . $csv_enclosed : '';
	in_array('all_prod_total_incl_vat', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	in_array('all_prod_discount', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_discount') . $csv_enclosed : '';
	in_array('all_prod_qty_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_qty_refunded') . $csv_enclosed : '';
	in_array('all_prod_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_refunded') . $csv_enclosed : '';
	in_array('all_prod_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_reward_points') . $csv_enclosed : '';
	in_array('all_prod_sales', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_sales') . $csv_enclosed : '';	
	in_array('all_prod_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_cost') . $csv_enclosed : '';
	in_array('all_prod_profit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_profit') . $csv_enclosed : '';
	in_array('all_prod_profit_margin', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_profit_margin') . $csv_enclosed : '';
	in_array('all_prod_profit_markup', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_profit_markup') . $csv_enclosed : '';
	}
	in_array('all_sub_total', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sub_total') . $csv_enclosed : '';
	in_array('all_handling', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_handling') . $csv_enclosed : '';
	in_array('all_loworder', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_loworder') . $csv_enclosed : '';	
	in_array('all_shipping', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_shipping') . $csv_enclosed : '';
	in_array('all_reward', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_reward') . $csv_enclosed : '';
	in_array('all_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_earned_reward_points') . $csv_enclosed : '';
	in_array('all_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_used_reward_points') . $csv_enclosed : '';	
	in_array('all_coupon', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_coupon') . $csv_enclosed : '';	
	in_array('all_coupon_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_coupon_name') . $csv_enclosed : '';	
	in_array('all_coupon_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_coupon_code') . $csv_enclosed : '';	
	in_array('all_order_tax', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_tax') . $csv_enclosed : '';
	in_array('all_credit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_credit') . $csv_enclosed : '';
	in_array('all_voucher', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_voucher') . $csv_enclosed : '';
	in_array('all_voucher_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_voucher_code') . $csv_enclosed : '';	
	in_array('all_discount', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_discount') . $csv_enclosed : '';	
	in_array('all_order_value', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_value') . $csv_enclosed : '';
	in_array('all_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_refund') . $csv_enclosed : '';
	in_array('all_order_sales', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_sales') . $csv_enclosed : '';
	in_array('all_order_prod_costs', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_prod_costs') . $csv_enclosed : '';
	in_array('all_order_commission', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_commission') . $csv_enclosed : '';
	in_array('all_order_payment_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_payment_cost') . $csv_enclosed : '';
	in_array('all_order_shipping_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_shipping_cost') . $csv_enclosed : '';
	in_array('all_order_extra_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_extra_cost') . $csv_enclosed : '';
	in_array('all_order_return_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_return_cost') . $csv_enclosed : '';
	in_array('all_shipping_balance', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_shipping_balance') . $csv_enclosed : '';		
	in_array('all_order_costs', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_costs') . $csv_enclosed : '';
	in_array('all_order_profit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_profit') . $csv_enclosed : '';
	in_array('all_order_profit_prc', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_margin') . $csv_enclosed : '';
	in_array('all_order_shipping_method', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_shipping_method') . $csv_enclosed : '';
	in_array('all_order_payment_method', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_payment_method') . $csv_enclosed : '';
	in_array('all_order_status', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_status') . $csv_enclosed : '';
	in_array('all_order_store', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_store') . $csv_enclosed : '';
	in_array('all_campaign_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_campaign_name') . $csv_enclosed : '';	
	in_array('all_campaign_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_campaign_code') . $csv_enclosed : '';	
	in_array('all_customer_cust_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_cust_id') . $csv_enclosed : '';	
	if (in_array('all_custom_fields', $advsop_settings_all_columns)) {	
	if ($custom_fields_name) {
	foreach ($custom_fields_name as $custom_field_name) {
	$export_csv_all_details .= $csv_delimiter . $csv_enclosed . $custom_field_name['name'] . $csv_enclosed;
	}
	}	
	}	
	in_array('all_billing_first_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_first_name')) . $csv_enclosed : '';
	in_array('all_billing_last_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_last_name')) . $csv_enclosed : '';
	in_array('all_billing_company', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_company')) . $csv_enclosed : '';				
	in_array('all_billing_address_1', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_address_1')) . $csv_enclosed : '';
	in_array('all_billing_address_2', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_address_2')) . $csv_enclosed : '';
	in_array('all_billing_city', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_city')) . $csv_enclosed : '';
	in_array('all_billing_zone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_zone')) . $csv_enclosed : '';
	in_array('all_billing_zone_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_zone_id')) . $csv_enclosed : '';
	in_array('all_billing_zone_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_zone_code')) . $csv_enclosed : '';
	in_array('all_billing_postcode', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_postcode')) . $csv_enclosed : '';
	in_array('all_billing_country', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_country')) . $csv_enclosed : '';
	in_array('all_billing_country_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_country_id')) . $csv_enclosed : '';
	in_array('all_billing_country_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_country_code')) . $csv_enclosed : '';
	in_array('all_customer_telephone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_telephone') . $csv_enclosed : '';
	in_array('all_shipping_first_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_first_name')) . $csv_enclosed : '';
	in_array('all_shipping_last_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_last_name')) . $csv_enclosed : '';
	in_array('all_shipping_company', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_company')) . $csv_enclosed : '';
	in_array('all_shipping_address_1', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_address_1')) . $csv_enclosed : '';
	in_array('all_shipping_address_2', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_address_2')) . $csv_enclosed : '';
	in_array('all_shipping_city', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_city')) . $csv_enclosed : '';
	in_array('all_shipping_zone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_zone')) . $csv_enclosed : '';
	in_array('all_shipping_zone_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_zone_id')) . $csv_enclosed : '';
	in_array('all_shipping_zone_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_zone_code')) . $csv_enclosed : '';
	in_array('all_shipping_postcode', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_postcode')) . $csv_enclosed : '';
	in_array('all_shipping_country', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_country')) . $csv_enclosed : '';
	in_array('all_shipping_country_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_country_id')) . $csv_enclosed : '';
	in_array('all_shipping_country_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_country_code')) . $csv_enclosed : '';
	in_array('all_order_weight', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_weight') . $csv_enclosed : '';
	in_array('all_order_comment', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_comment') . $csv_enclosed : '';
	$export_csv_all_details .= $csv_row;
	
	foreach ($results as $result) {
	$export_csv_all_details .= $csv_enclosed . $result['order_id'] . $csv_enclosed;
	$export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['date_added'] . $csv_enclosed;
	in_array('all_order_inv_no', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['invoice'] . $csv_enclosed : '';
	in_array('all_order_customer_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['name'] . $csv_enclosed : '';	
	in_array('all_order_email', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['email'] . $csv_enclosed : '';	
	in_array('all_order_customer_group', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['cust_group']) . $csv_enclosed : '';	
	if ($filter_details == 'all_details_products') {
	in_array('all_prod_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_id'] . $csv_enclosed : '';
	in_array('all_prod_sku', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_sku'] . $csv_enclosed : '';
	in_array('all_prod_model', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_model'] . $csv_enclosed : '';	
	in_array('all_prod_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_name'], ENT_NOQUOTES, 'UTF-8') . $csv_enclosed : '';
	in_array('all_prod_option', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_options'], ENT_NOQUOTES, 'UTF-8') . $csv_enclosed : '';
	in_array('all_prod_attributes', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_attributes']) . $csv_enclosed : '';
	in_array('all_prod_category', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_category'] !== NULL ? $result['product_category'] : '') . $csv_enclosed : '';		
	in_array('all_prod_manu', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_manu'] !== NULL ? $result['product_manu'] : '') . $csv_enclosed : '';
	in_array('all_prod_supplier', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['product_supplier'] !== NULL ? $result['product_supplier'] : '') . $csv_enclosed : '';
	}
 	if ($filter_details == 'all_details_products' or $filter_details == 'all_details_orders') {	
	in_array('all_prod_currency', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['currency_code'] . $csv_enclosed : '';
	}
	if ($filter_details == 'all_details_products') {	
	in_array('all_prod_price', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_price_raw'], 2)) . $csv_enclosed : '';
	in_array('all_prod_quantity', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_quantity'] . $csv_enclosed : '';
	in_array('all_prod_total_excl_vat', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_total_excl_vat_raw'], 2)) . $csv_enclosed : '';	
	in_array('all_prod_tax', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_tax_raw'], 2)) . $csv_enclosed : '';		
	in_array('all_prod_total_incl_vat', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_total_incl_vat_raw'], 2)) . $csv_enclosed : '';
	in_array('all_prod_discount', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_discount_raw'], 2)) . $csv_enclosed : '';
	in_array('all_prod_qty_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_qty_refund'] . $csv_enclosed : '';
	if ($this->config->get('advsop' . $user_id . '_formula_6')) {	
	in_array('all_prod_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . ($result['product_refund_raw'] != NULL ? sprintf('%0.2f', round(-$result['product_refund_raw'], 2)) : sprintf('%0.2f', round('0', 2))) . $csv_enclosed : '';
	} else {
	in_array('all_prod_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . ($result['product_refund_raw'] != NULL ? sprintf('%0.2f', round($result['product_refund_raw'], 2)) : sprintf('%0.2f', round('0', 2))) . $csv_enclosed : '';
	}	
	in_array('all_prod_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_reward_points'] . $csv_enclosed : '';
	in_array('all_prod_sales', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_sales_raw'], 2)) . $csv_enclosed : '';	
	in_array('all_prod_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['product_cost_raw'], 2)) . $csv_enclosed : '';
	in_array('all_prod_profit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['product_profit_raw'], 2)) . $csv_enclosed : '';
	if ($result['product_sales_raw'] > 0) {		
	in_array('all_prod_profit_margin', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_profit_margin'] . $csv_enclosed : '';
	} else {
	in_array('all_prod_profit_margin', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . round((0), 2) . '%' . $csv_enclosed : '';
	}
	if ($result['product_cost_raw'] > 0) {		
	in_array('all_prod_profit_markup', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['product_profit_markup'] . $csv_enclosed : '';
	} else {
	in_array('all_prod_profit_markup', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . round((0), 2) . '%' . $csv_enclosed : '';
	}	
	}
	in_array('all_sub_total', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_sub_total_raw'], 2)) . $csv_enclosed : '';
	in_array('all_handling', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_handling_raw'] !== NULL ? $result['order_handling_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_loworder', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_low_order_fee_raw'] !== NULL ? $result['order_low_order_fee_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_shipping', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_shipping_raw'] !== NULL ? $result['order_shipping_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_reward', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_reward_raw'] !== NULL ? $result['order_reward_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_earned_points'] . $csv_enclosed : '';
	in_array('all_reward_points', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_used_points'] . $csv_enclosed : '';	
	in_array('all_coupon', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_coupon_raw'] !== NULL ? $result['order_coupon_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_coupon_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_coupon_name'] . $csv_enclosed : '';	
	in_array('all_coupon_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_coupon_code'] . $csv_enclosed : '';	
	in_array('all_order_tax', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_tax_raw'] !== NULL ? $result['order_tax_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_credit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_credit_raw'] !== NULL ? $result['order_credit_raw'] : 0, 2)) . $csv_enclosed : '';	
	in_array('all_voucher', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_voucher_raw'] !== NULL ? $result['order_voucher_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_voucher_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_voucher_code'] . $csv_enclosed : '';
	in_array('all_discount', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_discount_raw'] !== NULL ? $result['order_discount_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('all_order_value', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_value_raw'], 2)) . $csv_enclosed : '';
	if ($this->config->get('advsop' . $user_id . '_formula_6')) {	
	in_array('all_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . ($result['order_refund_raw'] != NULL ? sprintf('%0.2f', round(-$result['order_refund_raw'], 2)) : sprintf('%0.2f', round('0', 2))) . $csv_enclosed : '';
	} else {
	in_array('all_refund', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . ($result['order_refund_raw'] != NULL ? sprintf('%0.2f', round($result['order_refund_raw'], 2)) : sprintf('%0.2f', round('0', 2))) . $csv_enclosed : '';
	}
	in_array('all_order_sales', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_sales_raw'], 2)) . $csv_enclosed : '';
	in_array('all_order_prod_costs', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_product_costs_raw'], 2)) . $csv_enclosed : '';	
	in_array('all_order_commission', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_commission_raw'], 2)) . $csv_enclosed : '';	
	in_array('all_order_payment_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_payment_cost_raw'], 2)) . $csv_enclosed : '';
	in_array('all_order_shipping_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_shipping_cost_raw'], 2)) . $csv_enclosed : '';
	in_array('all_order_extra_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_extra_cost_raw'], 2)) . $csv_enclosed : '';
	in_array('all_order_return_cost', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_return_cost_raw'], 2)) . $csv_enclosed : '';
	in_array('all_shipping_balance', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_ship_balance_raw'], 2)) . $csv_enclosed : '';	
	in_array('all_order_costs', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round(-$result['order_costs_raw'], 2)) . $csv_enclosed : '';
	in_array('all_order_profit', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['order_profit_raw'], 2)) . $csv_enclosed : '';
	if ($result['order_sales_raw'] > 0) {	
	in_array('all_order_profit_prc', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_profit_prc'] . $csv_enclosed : '';
	} else {
	in_array('all_order_profit_prc', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . round((0), 2) . '%' . $csv_enclosed : '';
	}		
	in_array('all_order_shipping_method', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_method'] . $csv_enclosed : '';
	in_array('all_order_payment_method', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_method'] . $csv_enclosed : '';
	in_array('all_order_status', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_status'] . $csv_enclosed : '';
	in_array('all_order_store', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['store_name']) . $csv_enclosed : '';
	in_array('all_campaign_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_campaign_name'] . $csv_enclosed : '';	
	in_array('all_campaign_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_campaign_code'] . $csv_enclosed : '';	
	in_array('all_customer_cust_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['customer_id'] . $csv_enclosed : '';	
	if (in_array('all_custom_fields', $advsop_settings_all_columns)) {	
	if ($result['custom_fields']) {
	foreach ($result['custom_fields'] as $custom_field) {
	$export_csv_all_details .= $csv_delimiter . $csv_enclosed . $custom_field['value'] . $csv_enclosed;
	}
	} else {
	foreach ($custom_fields_name as $custom_field_name) {
	$export_csv_all_details .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;
	}
	}
	}
	in_array('all_billing_first_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_firstname'] . $csv_enclosed : '';
	in_array('all_billing_last_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_lastname'] . $csv_enclosed : '';
	in_array('all_billing_company', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_company'] . $csv_enclosed : '';
	in_array('all_billing_address_1', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_address_1'] . $csv_enclosed : '';
	in_array('all_billing_address_2', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_address_2'] . $csv_enclosed : '';
	in_array('all_billing_city', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_city'] . $csv_enclosed : '';
	in_array('all_billing_zone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_zone'] . $csv_enclosed : '';
	in_array('all_billing_zone_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_zone_id'] . $csv_enclosed : '';
	in_array('all_billing_zone_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_zone_code'] . $csv_enclosed : '';
	in_array('all_billing_postcode', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_postcode'] . $csv_enclosed : '';
	in_array('all_billing_country', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_country'] . $csv_enclosed : '';
	in_array('all_billing_country_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_country_id'] . $csv_enclosed : '';
	in_array('all_billing_country_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['payment_country_code'] . $csv_enclosed : '';
	in_array('all_customer_telephone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['telephone'] . $csv_enclosed : '';
	in_array('all_shipping_first_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_firstname'] . $csv_enclosed : '';
	in_array('all_shipping_last_name', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_lastname'] . $csv_enclosed : '';
	in_array('all_shipping_company', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_company'] . $csv_enclosed : '';
	in_array('all_shipping_address_1', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_address_1'] . $csv_enclosed : '';
	in_array('all_shipping_address_2', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_address_2'] . $csv_enclosed : '';
	in_array('all_shipping_city', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_city'] . $csv_enclosed : '';
	in_array('all_shipping_zone', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_zone'] . $csv_enclosed : '';
	in_array('all_shipping_zone_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_zone_id'] . $csv_enclosed : '';
	in_array('all_shipping_zone_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_zone_code'] . $csv_enclosed : '';
	in_array('all_shipping_postcode', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_postcode'] . $csv_enclosed : '';
	in_array('all_shipping_country', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_country'] . $csv_enclosed : '';
	in_array('all_shipping_country_id', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_country_id'] . $csv_enclosed : '';
	in_array('all_shipping_country_code', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['shipping_country_code'] . $csv_enclosed : '';
	in_array('all_order_weight', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . $result['order_weight'] . $csv_enclosed : '';
	in_array('all_order_comment', $advsop_settings_all_columns) ? $export_csv_all_details .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['order_comment']) . $csv_enclosed : '';
	$export_csv_all_details .= $csv_row;
	}

	if (!isset($_GET['cron'])) {
		$filename = "sales_profit_report_all_details_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A");
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Description: File Transfer');
		header('Content-Type: text/csv; charset=utf-8');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');		
		header('Content-Disposition: attachment; filename='.$filename.".csv");
		print $export_csv_all_details;			
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
		
		$filename = $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file_to_download = $server . $file_save_path . '/' . $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file = $file_path . '/' . $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";		
		
		file_put_contents($file, $export_csv_all_details);
		
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