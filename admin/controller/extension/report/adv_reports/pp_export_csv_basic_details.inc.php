<?php
	ini_set("memory_limit","256M");
	
	$results = $export_data['results'];
	if ($results) {

	$csv_delimiter = strtr($export_csv_delimiter, array(
		'comma'			=> ",",
		'semi'			=> ";",
		'tab'			=> "\t"
	));
	$csv_enclosed = '"';
	$csv_row = "\n";

	if ($filter_group == 'year') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;
	} elseif ($filter_group == 'quarter') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_quarter') . $csv_enclosed;			
	} elseif ($filter_group == 'month') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;			
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_month') . $csv_enclosed;	
	} elseif ($filter_group == 'day') {
	$export_csv = $csv_enclosed . $this->language->get('column_date') . $csv_enclosed;
	} elseif ($filter_group == 'order') {
	$export_csv = $csv_enclosed . $this->language->get('column_order_order_id') . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_date_added') . $csv_enclosed;	
	} else {
	$export_csv = $csv_enclosed . $this->language->get('column_date_start') . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_date_end') . $csv_enclosed;	
	}
	
	if ($filter_report == 'manufacturers' or $filter_report == 'categories') {
		
	if ($filter_report == 'manufacturers') {
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed;
	} elseif ($filter_report == 'categories') {
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed;	
	}
	in_array('cm_orders', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('cm_customers', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed : '';
	in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed : '';
	in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('cm_total_tax', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_total_tax') . $csv_enclosed : '';
	in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	in_array('cm_app', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_app') . $csv_enclosed : '';
	in_array('cm_refunds', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_refunds') . $csv_enclosed : '';
	in_array('cm_reward_points', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_reward_points') . $csv_enclosed : '';
	
	} elseif ($filter_report == 'products_options') {
		
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_option') . $csv_enclosed;
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed;
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed;
	
	} else {
	
	in_array('mv_id', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_id') . $csv_enclosed : '';
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_pname') . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_poption') . $csv_enclosed : '';
	}
	in_array('mv_sku', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sku') . $csv_enclosed : '';
	in_array('mv_upc', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_upc') . $csv_enclosed : '';
	in_array('mv_ean', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_ean') . $csv_enclosed : '';
	in_array('mv_jan', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_jan') . $csv_enclosed : '';
	in_array('mv_isbn', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_isbn') . $csv_enclosed : '';
	in_array('mv_mpn', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_mpn') . $csv_enclosed : '';
	in_array('mv_model', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_model') . $csv_enclosed : '';
	in_array('mv_category', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed : '';	
	in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed : '';	
	in_array('mv_attribute', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_attribute') . $csv_enclosed : '';	
	in_array('mv_status', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_status') . $csv_enclosed : '';	
	in_array('mv_location', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_location') . $csv_enclosed : '';	
	in_array('mv_tax_class', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_tax_class') . $csv_enclosed : '';	
	in_array('mv_viewed', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_viewed') . $csv_enclosed : '';
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_price') . $csv_enclosed : '';	
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_stock_quantity') . $csv_enclosed : '';	
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed : '';
	in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed : '';
	in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('mv_total_tax', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_total_tax') . $csv_enclosed : '';
	in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	in_array('mv_app', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_app') . $csv_enclosed : '';
	in_array('mv_refunds', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_refunds') . $csv_enclosed : '';
	in_array('mv_reward_points', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_reward_points') . $csv_enclosed : '';
	}
	
	if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
		
	in_array('pl_prod_order_id', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_order_id') . $csv_enclosed : '';
	in_array('pl_prod_date_added', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_date_added') . $csv_enclosed : '';
	in_array('pl_prod_inv_no', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_inv_no') . $csv_enclosed : '';
	in_array('pl_prod_id', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_id') . $csv_enclosed : '';
	in_array('pl_prod_sku', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_sku') . $csv_enclosed : '';
	in_array('pl_prod_model', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_model') . $csv_enclosed : '';
	in_array('pl_prod_name', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_name') . $csv_enclosed : '';
	in_array('pl_prod_option', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_option') . $csv_enclosed : '';
	if ($filter_report == 'manufacturers') {
	in_array('pl_prod_category', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_category') . $csv_enclosed : '';
	} elseif ($filter_report == 'categories') {
	in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_manu') . $csv_enclosed : '';
	} elseif ($filter_report == 'products_options') {
	in_array('pl_prod_category', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_category') . $csv_enclosed : '';
	in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_manu') . $csv_enclosed : '';
	}
	in_array('pl_prod_attributes', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_attributes') . $csv_enclosed : '';
	in_array('pl_prod_currency', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_currency') . $csv_enclosed : '';
	in_array('pl_prod_price', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_price') . $csv_enclosed : '';
	in_array('pl_prod_quantity', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_quantity') . $csv_enclosed : '';
	in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('pl_prod_tax', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_tax') . $csv_enclosed : '';
	in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	
	} else {

	in_array('ol_order_order_id', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_order_id') . $csv_enclosed : '';
	in_array('ol_order_date_added', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_date_added') . $csv_enclosed : '';
	in_array('ol_order_inv_no', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_inv_no') . $csv_enclosed : '';
	in_array('ol_order_customer', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer') . $csv_enclosed : '';
	in_array('ol_order_email', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_email') . $csv_enclosed : '';
	in_array('ol_order_customer_group', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer_group') . $csv_enclosed : '';
	in_array('ol_order_shipping_method', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_shipping_method') . $csv_enclosed : '';
	in_array('ol_order_payment_method', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_payment_method') . $csv_enclosed : '';
	in_array('ol_order_status', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_status') . $csv_enclosed : '';
	in_array('ol_order_store', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_store') . $csv_enclosed : '';
	in_array('ol_order_currency', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_currency') . $csv_enclosed : '';
	in_array('ol_prod_price', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_price') . $csv_enclosed : '';
	in_array('ol_prod_quantity', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_quantity') . $csv_enclosed : '';
	in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('ol_prod_tax', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_tax') . $csv_enclosed : '';
	in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	
	}
	
	in_array('cl_customer_cust_id', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_cust_id') . $csv_enclosed : '';
	in_array('cl_billing_name', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_name')) . $csv_enclosed : '';
	in_array('cl_billing_company', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_company')) . $csv_enclosed : '';
	in_array('cl_billing_address_1', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_address_1')) . $csv_enclosed : '';
	in_array('cl_billing_address_2', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_address_2')) . $csv_enclosed : '';
	in_array('cl_billing_city', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_city')) . $csv_enclosed : '';
	in_array('cl_billing_zone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_zone')) . $csv_enclosed : '';
	in_array('cl_billing_postcode', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_postcode')) . $csv_enclosed : '';
	in_array('cl_billing_country', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_billing_country')) . $csv_enclosed : '';
	in_array('cl_customer_telephone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_telephone') . $csv_enclosed : '';
	in_array('cl_shipping_name', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_name')) . $csv_enclosed : '';
	in_array('cl_shipping_company', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_company')) . $csv_enclosed : '';
	in_array('cl_shipping_address_1', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_address_1')) . $csv_enclosed : '';
	in_array('cl_shipping_address_2', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_address_2')) . $csv_enclosed : '';
	in_array('cl_shipping_city', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_city')) . $csv_enclosed : '';
	in_array('cl_shipping_zone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_zone')) . $csv_enclosed : '';
	in_array('cl_shipping_postcode', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_postcode')) . $csv_enclosed : '';
	in_array('cl_shipping_country', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . strip_tags($this->language->get('column_shipping_country')) . $csv_enclosed : '';
	
	$export_csv .= $csv_row;

	foreach ($results as $result) {
	if ($filter_group == 'year') {				
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;
	} elseif ($filter_group == 'quarter') {
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . 'Q' . $result['quarter'] . $csv_enclosed;			
	} elseif ($filter_group == 'month') {
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;			
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['month'] . $csv_enclosed;	
	} elseif ($filter_group == 'day') {
	$export_csv .= $csv_enclosed . $result['date_start'] . $csv_enclosed;
	} elseif ($filter_group == 'order') {
	$export_csv .= $csv_enclosed . $result['order_id'] . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['date_start'] . $csv_enclosed;	
	} else {
	$export_csv .= $csv_enclosed . $result['date_start'] . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['date_end'] . $csv_enclosed;	
	}

	if ($filter_report == 'manufacturers' or $filter_report == 'categories') {

	if ($filter_report == 'manufacturers') {
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed;	
	} elseif ($filter_report == 'categories') {
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed;
	}
	in_array('cm_orders', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('cm_customers', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed : '';
	in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((0), 2)) . '%' . $csv_enclosed : '';
	in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_excl_vat_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_total_tax', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_tax_raw'] !== NULL ? $result['total_tax_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_incl_vat_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_app', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['app_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_refunds', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['refunds_raw'] !== NULL ? $result['refunds_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('cm_reward_points', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['reward_points'] . $csv_enclosed : '';	
	
	} elseif ($filter_report == 'products_options') {
		
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['option_name'] . $csv_enclosed;
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed;
	$export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((100), 2)) . '%' . $csv_enclosed;
	
	} else {
				
	in_array('mv_id', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['product_id'] . $csv_enclosed : '';
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['name'] . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {	
	if ($result['option']) {	
	$options = '';
	foreach ($result['option'] as $option) {
	$options .= $option['name'].': '.$option['value'].'; ';
	}
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . rtrim($options, "; ") . $csv_enclosed : '';
	} else {
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}	
	}	
	in_array('mv_sku', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sku'] . $csv_enclosed : '';
	in_array('mv_upc', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['upc'] . $csv_enclosed : '';
	in_array('mv_ean', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['ean'] . $csv_enclosed : '';
	in_array('mv_jan', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['jan'] . $csv_enclosed : '';
	in_array('mv_isbn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['isbn'] . $csv_enclosed : '';
	in_array('mv_mpn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['mpn'] . $csv_enclosed : '';	
	in_array('mv_model', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['model'] . $csv_enclosed : '';
	in_array('mv_category', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed : '';		
	in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed : '';
	in_array('mv_attribute', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('<br>','; ',$result['attribute'])) . $csv_enclosed : '';	
	in_array('mv_status', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['status'] . $csv_enclosed : '';	
	in_array('mv_location', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['location'] . $csv_enclosed : '';	
	in_array('mv_tax_class', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['tax_class'] . $csv_enclosed : '';	
	in_array('mv_viewed', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['viewed'] . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	if ($result['option']) {	
	$oprice = '';
	foreach ($result['option'] as $option) {
	$oprice .= sprintf('%0.2f', round($option['price'], 2)).'; ';
	}
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . " [" . rtrim($oprice, "; ") . "]" . $csv_enclosed : '';				
	} else {
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	}
	} else {
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	}	
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	if ($result['option']) {	
	$oquantity = '';
	foreach ($result['option'] as $option) {
	$oquantity .= $option['quantity'].'; ';
	}
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . " [" . rtrim($oquantity, "; ") . "]" . $csv_enclosed : '';				
	} else {
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	} else {
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed : '';
	in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((0), 2)) . '%' . $csv_enclosed : '';
	in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_excl_vat_raw'] !== NULL ? $result['total_excl_vat_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_total_tax', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_tax_raw'] !== NULL ? $result['total_tax_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_incl_vat_raw'] !== NULL ? $result['total_incl_vat_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_app', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['app_raw'] !== NULL ? $result['app_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_refunds', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['refunds_raw'] !== NULL ? $result['refunds_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_reward_points', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['reward_points'] . $csv_enclosed : '';	
	}

	if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
	in_array('pl_prod_order_id', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_date_added', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_inv_no', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_id', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_sku', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_model', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_name', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('pl_prod_option', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	if ($filter_report == 'manufacturers') {
	in_array('pl_prod_category', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	} elseif ($filter_report == 'categories') {
	in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	} elseif ($filter_report == 'products_options') {
	in_array('pl_prod_category', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_manu', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	}
	in_array('pl_prod_attributes', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_currency', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_price', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_quantity', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_tax', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	} else {
	in_array('ol_order_order_id', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_date_added', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_inv_no', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_customer', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_email', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_customer_group', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_shipping_method', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_payment_method', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_status', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_store', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_order_currency', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_prod_price', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_prod_quantity', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_prod_tax', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	}
	in_array('cl_customer_cust_id', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_billing_name', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_company', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_address_1', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_address_2', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_city', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_zone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_postcode', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_billing_country', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_customer_telephone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_shipping_name', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_company', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_address_1', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_address_2', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_city', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('cl_shipping_zone', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_postcode', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cl_shipping_country', $advpp_settings_cl_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';

	if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
	$product_ord_id = explode('<br>', $result['product_ord_id']);
	} else {
	$order_prod_ord_id = explode('<br>', $result['order_prod_ord_id']);		
	}
	
	foreach ((($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') ? $product_ord_id : $order_prod_ord_id) as $index => $value) {	
	
	$export_csv .= $csv_row;

	if ($filter_group == 'year') {				
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;
	} elseif ($filter_group == 'quarter') {
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;			
	} elseif ($filter_group == 'month') {
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;			
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;	
	} elseif ($filter_group == 'day') {
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;
	} elseif ($filter_group == 'order') {
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;	
	} else {
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;	
	}
	if ($filter_report == 'manufacturers' or $filter_report == 'categories') {	
	if ($filter_report == 'manufacturers') {
	in_array('cm_manufacturer', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	} elseif ($filter_report == 'categories') {
	in_array('cm_category', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	}
	in_array('cm_orders', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_customers', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_total_tax', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_app', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_refunds', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('cm_reward_points', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	} elseif ($filter_report == 'products_options') {
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;
	} else {
	in_array('mv_id', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	}
	in_array('mv_sku', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_upc', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_ean', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_jan', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_isbn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_mpn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_model', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_category', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_attribute', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_status', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_location', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_tax_class', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_viewed', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_total_tax', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_app', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_refunds', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('mv_reward_points', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	}

	if ($filter_report == 'manufacturers' or $filter_report == 'categories' or $filter_report == 'products_options') {
		
	if (in_array('pl_prod_order_id', $advpp_settings_pl_columns)) {	
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}
	if (in_array('pl_prod_date_added', $advpp_settings_pl_columns)) {	
	$product_ord_date = explode('<br>', $result['product_ord_date']);		
	$value = $product_ord_date[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}
	if (in_array('pl_prod_inv_no', $advpp_settings_pl_columns)) {	
	$product_inv_no = explode('<br>', $result['product_inv_no']);		
	$value = $product_inv_no[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;','',$value) . $csv_enclosed;		
	}
	if (in_array('pl_prod_id', $advpp_settings_pl_columns)) {	
	$product_prod_id = explode('<br>', $result['product_prod_id']);		
	$value = $product_prod_id[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_sku', $advpp_settings_pl_columns)) {	
	$product_sku = explode('<br>', $result['product_sku']);		
	$value = $product_sku[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}		
	if (in_array('pl_prod_model', $advpp_settings_pl_columns)) {	
	$product_model = explode('<br>', $result['product_model']);		
	$value = $product_model[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_name', $advpp_settings_pl_columns)) {	
	$product_name = explode('<br>', $result['product_name']);		
	$value = $product_name[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($value, ENT_NOQUOTES, 'UTF-8') . $csv_enclosed;		
	}	
	if (in_array('pl_prod_option', $advpp_settings_pl_columns)) {	
	$product_option = explode('<br>', $result['product_option']);		
	$value = $product_option[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}	
	if ($filter_report == 'manufacturers') {
	if (in_array('pl_prod_category', $advpp_settings_pl_columns)) {	
	$product_category = explode('<br>', $result['product_category']);		
	$value = $product_category[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}		
	} elseif ($filter_report == 'categories') {
	if (in_array('pl_prod_manu', $advpp_settings_pl_columns)) {	
	$product_manu = explode('<br>', $result['product_manu']);		
	$value = $product_manu[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}	
	} elseif ($filter_report == 'products_options') {
	if (in_array('pl_prod_category', $advpp_settings_pl_columns)) {	
	$product_category = explode('<br>', $result['product_category']);		
	$value = $product_category[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}	
	if (in_array('pl_prod_manu', $advpp_settings_pl_columns)) {	
	$product_manu = explode('<br>', $result['product_manu']);		
	$value = $product_manu[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}
	}	
	if (in_array('pl_prod_attributes', $advpp_settings_pl_columns)) {	
	$product_attributes = explode('<br>', $result['product_attributes']);		
	$value = $product_attributes[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('&nbsp;','',$value)) . $csv_enclosed;		
	}	
	if (in_array('pl_prod_currency', $advpp_settings_pl_columns)) {	
	$product_currency = explode('<br>', $result['product_currency']);		
	$value = $product_currency[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_price', $advpp_settings_pl_columns)) {	
	$product_price = explode('<br>', $result['product_price']);		
	$value = $product_price[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_quantity', $advpp_settings_pl_columns)) {	
	$product_quantity = explode('<br>', $result['product_quantity']);		
	$value = $product_quantity[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_total_excl_vat', $advpp_settings_pl_columns)) {	
	$product_total_excl_vat = explode('<br>', $result['product_total_excl_vat']);		
	$value = $product_total_excl_vat[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_tax', $advpp_settings_pl_columns)) {	
	$product_tax = explode('<br>', $result['product_tax']);		
	$value = $product_tax[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('pl_prod_total_incl_vat', $advpp_settings_pl_columns)) {	
	$product_total_incl_vat = explode('<br>', $result['product_total_incl_vat']);		
	$value = $product_total_incl_vat[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	
	} else {

	if (in_array('ol_order_order_id', $advpp_settings_ol_columns)) {		
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}
	if (in_array('ol_order_date_added', $advpp_settings_ol_columns)) {	
	$order_prod_ord_date = explode('<br>', $result['order_prod_ord_date']);		
	$value = $order_prod_ord_date[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}
	if (in_array('ol_order_inv_no', $advpp_settings_ol_columns)) {	
	$order_prod_inv_no = explode('<br>', $result['order_prod_inv_no']);		
	$value = $order_prod_inv_no[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('ol_order_customer', $advpp_settings_ol_columns)) {	
	$order_prod_name = explode('<br>', $result['order_prod_name']);		
	$value = $order_prod_name[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}		
	if (in_array('ol_order_email', $advpp_settings_ol_columns)) {	
	$order_prod_email = explode('<br>', $result['order_prod_email']);		
	$value = $order_prod_email[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_order_customer_group', $advpp_settings_ol_columns)) {	
	$order_prod_group = explode('<br>', $result['order_prod_group']);		
	$value = $order_prod_group[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_order_shipping_method', $advpp_settings_ol_columns)) {	
	$order_prod_shipping_method = explode('<br>', $result['order_prod_shipping_method']);		
	$value = $order_prod_shipping_method[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('ol_order_payment_method', $advpp_settings_ol_columns)) {	
	$order_prod_payment_method = explode('<br>', $result['order_prod_payment_method']);		
	$value = $order_prod_payment_method[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('ol_order_status', $advpp_settings_ol_columns)) {	
	$order_prod_status = explode('<br>', $result['order_prod_status']);		
	$value = $order_prod_status[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_order_store', $advpp_settings_ol_columns)) {	
	$order_prod_store = explode('<br>', $result['order_prod_store']);		
	$value = $order_prod_store[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($value) . $csv_enclosed;		
	}	
	if (in_array('ol_order_currency', $advpp_settings_ol_columns)) {	
	$order_prod_currency = explode('<br>', $result['order_prod_currency']);		
	$value = $order_prod_currency[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_prod_price', $advpp_settings_ol_columns)) {	
	$order_prod_price = explode('<br>', $result['order_prod_price']);		
	$value = $order_prod_price[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_prod_quantity', $advpp_settings_ol_columns)) {	
	$order_prod_quantity = explode('<br>', $result['order_prod_quantity']);		
	$value = $order_prod_quantity[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_prod_total_excl_vat', $advpp_settings_ol_columns)) {	
	$order_prod_total_excl_vat = explode('<br>', $result['order_prod_total_excl_vat']);		
	$value = $order_prod_total_excl_vat[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_prod_tax', $advpp_settings_ol_columns)) {	
	$order_prod_tax = explode('<br>', $result['order_prod_tax']);		
	$value = $order_prod_tax[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}	
	if (in_array('ol_prod_total_incl_vat', $advpp_settings_ol_columns)) {	
	$order_prod_total_incl_vat = explode('<br>', $result['order_prod_total_incl_vat']);		
	$value = $order_prod_total_incl_vat[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}

	}
	

	if (in_array('cl_customer_cust_id', $advpp_settings_cl_columns)) {	
	$customer_cust_id = explode('<br>', $result['customer_cust_id']);		
	$value = $customer_cust_id[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . $value . $csv_enclosed;		
	}
	if (in_array('cl_billing_name', $advpp_settings_cl_columns)) {	
	$billing_name = explode('<br>', $result['billing_name']);		
	$value = $billing_name[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}
	if (in_array('cl_billing_company', $advpp_settings_cl_columns)) {	
	$billing_company = explode('<br>', $result['billing_company']);		
	$value = $billing_company[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_billing_address_1', $advpp_settings_cl_columns)) {	
	$billing_address_1 = explode('<br>', $result['billing_address_1']);		
	$value = $billing_address_1[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}		
	if (in_array('cl_billing_address_2', $advpp_settings_cl_columns)) {	
	$billing_address_2 = explode('<br>', $result['billing_address_2']);		
	$value = $billing_address_2[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_billing_city', $advpp_settings_cl_columns)) {	
	$billing_city = explode('<br>', $result['billing_city']);		
	$value = $billing_city[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_billing_zone', $advpp_settings_cl_columns)) {	
	$billing_zone = explode('<br>', $result['billing_zone']);		
	$value = $billing_zone[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_billing_postcode', $advpp_settings_cl_columns)) {	
	$billing_postcode = explode('<br>', $result['billing_postcode']);		
	$value = $billing_postcode[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_billing_country', $advpp_settings_cl_columns)) {	
	$billing_country = explode('<br>', $result['billing_country']);		
	$value = $billing_country[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_customer_telephone', $advpp_settings_cl_columns)) {	
	$customer_telephone = explode('<br>', $result['customer_telephone']);		
	$value = $customer_telephone[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_name', $advpp_settings_cl_columns)) {	
	$shipping_name = explode('<br>', $result['shipping_name']);		
	$value = $shipping_name[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_company', $advpp_settings_cl_columns)) {	
	$shipping_company = explode('<br>', $result['shipping_company']);		
	$value = $shipping_company[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_address_1', $advpp_settings_cl_columns)) {	
	$shipping_address_1 = explode('<br>', $result['shipping_address_1']);		
	$value = $shipping_address_1[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_address_2', $advpp_settings_cl_columns)) {	
	$shipping_address_2 = explode('<br>', $result['shipping_address_2']);		
	$value = $shipping_address_2[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_city', $advpp_settings_cl_columns)) {	
	$shipping_city = explode('<br>', $result['shipping_city']);		
	$value = $shipping_city[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}	
	if (in_array('cl_shipping_zone', $advpp_settings_cl_columns)) {	
	$shipping_zone = explode('<br>', $result['shipping_zone']);		
	$value = $shipping_zone[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}
	if (in_array('cl_shipping_postcode', $advpp_settings_cl_columns)) {	
	$shipping_postcode = explode('<br>', $result['shipping_postcode']);		
	$value = $shipping_postcode[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}
	if (in_array('cl_shipping_country', $advpp_settings_cl_columns)) {	
	$shipping_country = explode('<br>', $result['shipping_country']);		
	$value = $shipping_country[$index];			
	$export_csv .= $csv_delimiter . $csv_enclosed . str_replace('&nbsp;&nbsp;','',$value) . $csv_enclosed;		
	}
	
	}
	
	$export_csv .= $csv_row;
	}

	if (!isset($_GET['cron'])) {
		$filename = "products_report_basic_details_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A");
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Description: File Transfer');
		header('Content-Type: text/csv; charset=utf-8');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');		
		header('Content-Disposition: attachment; filename='.$filename.".csv");
		print $export_csv;			
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
		
		$filename = $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file_to_download = $server . $file_save_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file = $file_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";		
		
		file_put_contents($file, $export_csv);
		
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